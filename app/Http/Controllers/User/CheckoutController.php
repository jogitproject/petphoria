<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Checkout\Store;
use App\Models\Product;
use App\Mail\Checkout\AfterCheckout;
use App\Models\Discount;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Midtrans;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Product::all();

        return view('welcome', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $products)
    {
        return view ('checkout.create', [
            'product' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Product $product)
    {
        // return $request->all();

        // mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['product_id'] = $product->id;
        // update user data
        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->phone_number = $data['phone'];
        $user->address = $data['address'];
        $user->save();

        // create discount
        if ($request->discount) {
            $discount = Discount::whereCode($request->discount)->first();
            $data['discount_id'] = $discount->id;
            $data['discount_percentage'] = $discount->percentage;
        }

         // create checkout
        $checkout = Checkout::create($data);

        $this->getSnapRedirect($checkout);

    // Sending email
       Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

      return view('checkout.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data =  Product::where('slug', 'like', "%".$slug."%")->firstOrfail();

        // payment summary
        $price = DB::table('products')
            ->select('price')
            ->where('slug', 'like', "%".$slug."%")
            ->first('price');



        // dd($total);
        return view('checkout.create', ['product' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success()
    {
        return view('checkout.success');
    }

    // Midtrans Handler
    public function getSnapRedirect(Checkout $checkout)
    {
        $orderId = $checkout->id. '-'.Str::random(5);
        $price = $checkout->Product->price;

        $checkout->midtrans_booking_code = $orderId;


        $item_details[]  =[
          'id' => $orderId,
          'price' => $price,
          'quantity' => 1,
          'name' => "Payment for {$checkout->Product->title} watch"
        ];

         $discountPrice = 0;
        if ($checkout->Discount) {
            $discountPrice = $price * $checkout->discount_percentage / 100;
            $item_details[] = [
                'id' => $checkout->Discount->code,
                'price' => -$discountPrice,
                'quantity' => 1,
                'name' => "Discount {$checkout->Discount->name} ({$checkout->discount_percentage}%)"
            ];
        }


        $total = $price - $discountPrice;

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $total
        ];

         $userData = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "address" => $checkout->User->address,
            "city" => "",
            "postal_code" => "",
            "phone" => $checkout->User->phone,
            "country_code" => "IDN",
        ];

         $customer_details = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "email" => $checkout->User->email,
            "phone" => $checkout->User->phone,
            "billing_address" => $userData,
            "shipping_address" => $userData,
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

         try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $checkout->midtrans_url = $paymentUrl;
            $checkout->total = $total;
            $checkout->save();

            return $paymentUrl;
        } catch (Exception $e) {
            return false;
        }
    }

     public function midtransCallback(Request $request)
      {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status(
        $request->order_id
        );

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = explode('-', $notif->order_id)[0];
        $checkout = Checkout::find($checkout_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $checkout->payment_status = 'pending';
            }
            else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $checkout->payment_status = 'paid';
            }
        }
        else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
            else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
        }
        else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'failed';
        }
        else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status = 'paid';
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'pending';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'failed';
        }

        $checkout->save();
        return view('checkout/success');
      }
}

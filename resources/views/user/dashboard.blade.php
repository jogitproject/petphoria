@extends('layouts.app')

@section('content')

    <section class="dashboard my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-12 header-wrap mt-4 text-start">
            <h4 class="story">DASHBOARD</h4>
            <h1 class="primary-header">Order Summray</h1>
          </div>
        </div>
        <div class="row my-5">

          <table class="table">
            <tbody>
         @forelse ($checkouts as $checkout)
            <tr class="align-middle text-start background-color">
                <td class="product-picture">
                  <img src="{{ asset('img/featured1.png') }}" height="120" alt="" />
                </td>
                <td>
                  <p class="mb-2">
                    <strong>{{ $checkout->Product->title }}</strong>
                  </p>
                  <p>{{ $checkout->created_at->format('M d, Y') }}</p>
                </td>
                <td>
                  <strong>Rp.
                     @php
                        echo  number_format($checkout->total)
                    @endphp
                                @if ($checkout->discount_id)
                                    <span class="badge bg-success">Disc {{$checkout->discount_percentage}}%</span>
                                @endif
                    </strong>
                </td>
                <td>
                  <strong class="text-primary">{{$checkout->payment_status}}</strong>
                </td>
                 <td>
                    @if ($checkout->payment_status == 'waiting')
                        <a href="{{$checkout->midtrans_url}}" class="btn btn-primary">Pay Here</a>
                    @endif
                </td>
                <td>
                <a href="https://wa.me/+62 812-8399-2728?text=Hi, saya ingin bertanya tentang kelas {{$checkout->Product->title}}" class="btn btn-secondary">
                                Contact Support
                </a>
                </td>
              </tr>
         @empty
              <tr colspan="3">
                <h3>No Product Register</h3>
              </tr>
         @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </section>
@endsection

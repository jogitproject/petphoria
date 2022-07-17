@extends('layouts.app')

@section('content')
  <section class="checkout">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-12">
            <img src="{{ asset('img/success_payment.png') }}" class="picture" alt=" Success Payment " />
          </div>
          <div class="col-lg-9 col-12 header-wrap mt-4 text-center">
            <h2 class="story">Payment Succesful</h2>
            <p class="primary-header">
              Continue to dashboard. To Continue your payment <br />

            </p>
            <a href="{{ route('dashboard') }}" class="btn-primary signup"> Go to Dashboard </a>
          </div>
        </div>
      </div>
    </section>
@endsection

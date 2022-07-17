<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

     <!-- BOXICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/ic_logo.png') }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <title>Petphoria</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/ic_logo.png') }}" alt="LOGO" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.discount.index') }}">Discount</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Product</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li> --}}
          </ul>
          @auth
                 <div class="d-flex user-logged nav-item dropdown no-arrow">
                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- cara memanggil data dari auth --}}
                    Halo, {{Auth::user()->name}}!
                    @if (Auth::user()->avatar)
                    <img src="{{Auth::user()->avatar}}" class="user-photo" alt="" style="border-radius: 100%">
                    @else
                    <img src="http://ui-avatars.com/api/?name=admin" class="user-photo" alt="" style="border-radius: 100%">
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto">
                        @if (Auth::user()->is_admin)
                        {{-- <li>
                            <a href="{{route('admin.discount.index')}}" class="dropdown-item">Discount</a>
                        </li> --}}
                        @endif
                        <li>
                            <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        </li>
                    </ul>
                </a>
            </div>
            @else
           <div class="d-flex">
            <a href="{{route('login')}}" class="btn btn-master btn-secondary login me-3"> Log In </a>
            <a href="{{route('signup')}}" class="btn btn-master btn-primary signup"> Sign Up </a>
          </div>
            @endauth
        </div>
      </div>
    </nav>

    <section class="dashboard my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-12 header-wrap mt-4 text-start">
            <h4 class="story">DASHBOARD</h4>
          </div>
        </div>
        <div class="row my-5">
            <div class="card-header">
                    My Orders
                </div>
          <table class="table">
             <thead>
                <tr style="width: 100%:">
                    <th style="width:416px;">Image</th>
                    <th style="width:80px;">User</th>
                    <th style="width:300px;">Address</th>
                    <th style="width:150px;">Product</th>
                    <th style="width:140px;">Price</th>

                    <th>Register Data</th>
                    <th>Paid Status</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($checkouts as $checkout)
                <tr>
                    <td><img src="{{ asset($checkout->Product->product_image) }}" alt="" ></td>
                    <td style="width:120px;">{{ $checkout->User->name }} {{ $checkout->User->phone_number }}</td>
                    <td style="width:300px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio saepe sapiente nulla at nisi quisquam aut libero fugit. Amet vitae tenetur autem porro voluptatem.</td>
                    <td style="width:120px;">{{ $checkout->Product->title }}</td>
                    <td style="width:180px;">
                        <strong>Rp.
                     @php
                        echo  number_format($checkout->total)
                    @endphp
                                @if ($checkout->discount_id)
                                    <span class="badge bg-success">Disc {{$checkout->discount_percentage}}%</span>
                                @endif
                    </strong>
                    </td>
                    <td>{{$checkout->created_at->format('M d Y')}}</td>
                    <td></td>
                    <td><strong>{{$checkout->payment_status}}</strong></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No products registered</td>
                </tr>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer section">
      <div class="footer_container container grid">
        <div class="footer_content">
          <h3 class="footer_title">Our information</h3>
          <ul class="footer_list">
            <li>DKI Jakarta 41230</li>
            <li>+62 1230-4561-7892</li>
          </ul>
        </div>

        <div class="footer_content">
          <h3 class="footer_title">About Us</h3>

          <ul class="footer_links">
            <li><a href="#" class="footer_link">Support Center</a></li>
            <li><a href="#" class="footer_link">Customer Support</a></li>
            <li><a href="#" class="footer_link">Contact Us</a></li>
            <li><a href="#" class="footer_link">Copy Right</a></li>
          </ul>
        </div>

        <div class="footer_content">
          <h3 class="footer_title">product</h3>

          <ul class="footer_links">
            <li><a href="#" class="footer_link">Royal Canin</a></li>
            <li><a href="#" class="footer_link">Whiskas</a></li>
            <li><a href="#" class="footer_link">Pedigree</a></li>
            <li><a href="#" class="footer_link">Takari</a></li>
          </ul>
        </div>

        <div class="footer_content">
          <h3 class="footer_title">Social Media</h3>

          <ul class="footer_social">
            <a href="#" target="_blank" class="footer_social-link">
              <i class="bx bxl-facebook"></i>
            </a>

            <a href="#" target="_blank" class="footer_social-link">
              <i class="bx bxl-twitter"></i>
            </a>

            <a href="#" target="_blank" class="footer_social-link">
              <i class="bx bxl-instagram"></i>
            </a>

            <a href="#" target="_blank" class="footer_social-link">
              <i class="bx bxl-github"></i>
            </a>
          </ul>
        </div>
      </div>

      <span class="footer_copy">&#169; Petphoria. All rights reserved</span>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>
  </body>
</html>

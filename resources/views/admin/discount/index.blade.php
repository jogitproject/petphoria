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
              <a class="nav-link " aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('admin.discount.index') }}">Discount</a>
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

<div class="container">
    <div class="row">
        <div class="col-8 ">
            <div class="card mt-3">
                <div class="card-header ">
                    Discount
                </div>
                <div class="card_body m-2">

                    </div>
                    @include('components.alert')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th style="width:350px;">Description</th>
                                <th style="width:200px;">Percentage</th>
                                <th colspan="3" style="width:200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discounts as $discount)
                                <tr>
                                    <td>{{$discount->name}}</td>
                                    <td>
                                        <span class="badge bg-primary">{{$discount->code}}</span>
                                    </td>
                                    <td style="width:400px;">{{$discount->description}}</td>
                                    <td style="width:200px;">{{$discount->percentage}} %</td>
                                    <td>
                                        <a href="{{route('admin.discount.edit', $discount->id)}}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.discount.destroy', $discount->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No discount created</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 d-flex flex-row-reverse">
                            <a href="{{route('admin.discount.create')}}" class="btn btn-primary btn-sm">Add Discount</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
   @include('components.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>
  </body>
</html>

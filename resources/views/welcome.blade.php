@extends('layouts.app')

@section('content')


    <!-- Main -->
    <main class="main">
      <!-- Dashboard Section -->
      <section class="home" id="home">
        <div class="home_container contain grid">
          <div class="home_img-bg">
            <img src="{{asset('img/home.png')}}" alt="picture" class="home_img" />
          </div>

      

          <div class="home_data">
            <h1 class="home_title">
              Make Ur Pet <br />
              Feel Euphoria
            </h1>
            
            <div class="home_btns">
              

              <a href="#products"><button class="button home_button">Order Now</button></a>
            </div>
          </div>
        </div>
      </section>

      <!-- Services Section -->
      <section class="service">
        <div class="container d-flex service mt-4">
          <div class="card-horizontal col-lg-3 col-12 justify-content-center">
            <div class="image">
              <img src="{{asset('img/delicious_pet.png')}}" />
            </div>

            <div class="text">
              <span class="title">Delicious Product</span>
              <span class="title-description">Product Have A Good Quality Control</span>
            </div>
          </div>

          <div class="card-horizontal col-lg-3 col-12 justify-content-center">
            <div class="image">
              <img src="{{asset('img/best_price.png')}}" />
            </div>

            <div class="text">
              <span class="title">Offer The Best Price</span>
              <span class="title-description">Always Give You The Best Price Then Other</span>
            </div>
          </div>
          <div class="card-horizontal col-lg-3 col-12 justify-content-center">
            <div class="image">
              <img src="{{asset('img/ic_original.png')}}" />
            </div>

            <div class="text">
              <span class="title">Product 100% Original</span>
              <span class="title-description">Our Product Is 100% Original</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Featured Section -->
      <section class="featured section contain justify-content-center" id="featured">
        <h2 class="section_title">Best Seller Product</h2>

        <div class="featured_container grid">
            @foreach ($data as $item )
            @if ($item->is_sale == true)
                    <article class="featured_card">
                    <span class="featured_tag">Best Seller</span>

                    <img src="{{ asset($item->product_image) }}" alt="Product" class="featured_img" />

                    <div class="featured_data">
                    <h3 class="featured_title">{{ $item->title }}</h3>
                    <span class="featured_price">Rp. @php
                        echo  number_format($item->price)
                    @endphp</span>
                    </div>

                    <a href="{{ route('welcome.show', $item->slug) }}" class="btn btn-master btn-primary mt-3 button featured_button">Order Now</a>
                </article>
            @endif

            @endforeach


          {{-- <article class="featured_card">
            <span class="featured_tag">Best Seller</span>

            <img src="{{asset('img/featured2.png')}}" alt="Product" class="featured_img" />

            <div class="featured_data">
              <h3 class="featured_title">Whiskas</h3>
              <span class="featured_price">$250</span>
            </div>

            <a href="#" class="btn btn-master btn-primary mt-3 button featured_button">Order Now</a>
          </article>

          <article class="featured_card">
            <span class="featured_tag">Best Seller</span>

            <img src="{{asset('img/featured3.png')}}" alt="Product" class="featured_img" />

            <div class="featured_data">
              <h3 class="featured_title">Pedigree</h3>
              <span class="featured_price">$890</span>
            </div>

            <a href="#" class="btn btn-master btn-primary mt-3 button featured_button">Order Now</a>
          </article> --}}
        </div>
      </section>

      <!-- Story Section-->
      <section class="story section contain">
        <div class="story_container grid">
          <div class="story_data">
            <h2 class="section_title story_section-title">Our Most Inspirational Product</h2>

            <h1 class="story_title">
              Inspirational Product of <br />
              this year
            </h1>

            <p class="story_description">The Most Inpirational and Healthy Product For Ur Lovely Pet ,Your Pet Will Feel Euphoria.</p>

            <a href="#" class="button button--small">Discover</a>
          </div>

          <div class="story_images">
            <img src="{{asset('img/story.png')}}" alt="Story Image" class="story_img" />
            <div class="story_square"></div>
          </div>
        </div>
      </section>

      <!-- Products Section-->
      <section class="products section contain" id="products">
        <h2 class="section_title">Products</h2>

        <div class="products_container grid">

        @foreach ($data as $item)
            @if ($item->is_sale != true)
            <article class="products_card">
            <img src="{{ asset($item->product_image) }}"" alt="product" class="products_image" />

            <h3 class="products_title">{{ $item->title }}</h3>
            <span class="products_price"> Rp. @php
                        echo  number_format($item->price)
                    @endphp</span>

            <a href="{{ route('welcome.show', $item->slug)  }}" class="btn btn-master btn-primary mt-3">Order Now</a>
          </article>
            @endif
        @endforeach


        </div>
      </section>

      <!-- Testimonial Section -->
      <section class="testimonial section contain">
        <div class="testimonial_container grid">
          <div class="swiper testimonial-swiper p-3">
            <div class="swiper-wrapper">
              <div class="testimonial_card swiper-slide">
                <div class="testimonial_quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>

                <p class="testimonial_description">
                  The Best Platform To Buy Ur Pet Needs,i really helped with this website,thanks.
                </p>
                <h3 class="testimonial_date">July 1. 2022</h3>

                <div class="testimonial_profil">
                  <img src="{{asset('img/testimonial1.jpg')}}" alt="" class="testimonial_profil-img" />

                  <div class="testimonial_profil-data">
                    <span class="testimonial_profil-name">Angel Nichole</span>
                    <span class="testimonial_profil-occupation">Pet Owner</span>
                  </div>
                </div>
              </div>

              <div class="testimonial_card swiper-slide">
                <div class="testimonial_quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>

                <p class="testimonial_description">
                The Best Platform To Buy Ur Pet Needs,i really helped with this website,thanks.
                </p>
                <h3 class="testimonial_date">July 1. 2022</h3>

                <div class="testimonial_profil">
                  <img src="{{asset('img/testimonial2.jpg')}}" alt="" class="testimonial_profil-img" />

                  <div class="testimonial_profil-data">
                    <span class="testimonial_profil-name">Michele Han</span>
                    <span class="testimonial_profil-occupation">Pet Owner</span>
                  </div>
                </div>
              </div>

              <div class="testimonial_card swiper-slide">
                <div class="testimonial_quote">
                  <i class="bx bxs-quote-alt-left"></i>
                </div>

                <p class="testimonial_description">
                The Best Platform To Buy Ur Pet Needs,i really helped with this website,thanks.
                </p>
                <h3 class="testimonial_date">July 1. 2022</h3>

                <div class="testimonial_profil">
                  <img src="{{asset('img/testimonial3.jpg')}}" alt="" class="testimonial_profil-img" />

                  <div class="testimonial_profil-data">
                    <span class="testimonial_profil-name">Nicholas Bryan</span>
                    <span class="testimonial_profil-occupation">Pet Owner</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-button-next">
              <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div class="swiper-button-prev">
              <i class="bx bx-left-arrow-alt"></i>
            </div>
          </div>
          <div class="testimonial_images">
            <div class="testimonial_square">
              <img src="{{asset('img/testimonial.png')}}" alt="" class="testimonial_img" />
            </div>
          </div>
        </div>
      </section>

     
    </main>

@endsection

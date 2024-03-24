<?php use App\Models\Cart;
?>
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="images/logo.png"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages</span> <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('all_products') }}">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('my_orders') }}">My Orders</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="{{ url('show_cart') }}"
                            style="position: relative; padding-top: 0;
                        padding-right: 20px;">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                            <div
                                style="position: absolute;
                                top: -5px;
                                right: 3px;
                                background-color: #ff424d;
                                color: white;
                                border-radius: 50%;
                                padding: 1px 5px;
                                font-size: 12px;">
                                <?php
                                $getCartItemCount = function () {
                                    $cart = Cart::count();
                                    echo $cart;
                                };
                                
                                // Call the anonymous function
                                $getCartItemCount();
                                ?>

                            </div>
                        </a>
                    </li>


                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" style="margin-right: 10px;" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

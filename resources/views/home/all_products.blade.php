<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .div_center {
            text-align: center;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px
        }

        .input_color {
            color: black
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->



        <!-- product section -->
        <!-- end product section -->


        <section class="product_section layout_padding">
            <div class="container">
                <div class="div_center">
                    {{-- <h2 class="font_size">All Product</h2> --}}
                    <form action="{{ url('home_search') }}" method="GET"
                        class="d-flex align-center justify-content-center">
                        @csrf
                        <input type="search" placeholder="search"
                            style="
                            border-radius:5px;
                            border-top-right-radius: 0;
                        border-bottom-right-radius: 0;
                        color:black;
                        width:250px;
                        margin-bottom:0px;"
                            name="search">
                        <input type="submit" value="search" class="btn btn-outline-primary"
                            style="margin:0; 
                            border-top-left-radius: 0;
                            border-bottom-left-radius: 0;">
                        <br>
                    </form>
                    <a href="{{ url('all_products') }}" class="btn btn-primary mt-2">All </a>
                    @foreach ($catagory as $c)
                        <a href="{{ url('home_search', $c->catagory_name) }} " class="btn btn-primary mt-2"
                            name="catbtn">{{ $c->catagory_name }} </a>
                    @endforeach
                </div>
                <div class="row">
                    @foreach ($products as $pro)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box" style="margin-top:0 ">
                                <div class="option_container">
                                    <div class="options">

                                        <a href="{{ url('product_details', $pro->id) }}" class="option2">
                                            Buy Now
                                        </a>
                                    </div>
                                </div>
                                <div class="img-box">
                                    <img src="product/{{ $pro->image }}" alt="" style="transform:scale(1.5)">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $pro->title }}
                                    </h5>
                                    @if ($pro->discount_price != null)
                                        <h6 style="color: red">
                                            After discount <br>
                                            ${{ $pro->discount_price }}
                                        </h6>

                                        <h6 style="text-decoration:line-through; color:blue">
                                            Price <br>
                                            ${{ $pro->price }}
                                        </h6>
                                    @else
                                        <h6>
                                            Price <br>
                                            ${{ $pro->price }}
                                        </h6>
                                    @endif


                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- {!!$products->withQueryString()->links('pagination::bootstrab-5')!!} --}}
                </div>
                <div class="d-flex justify-content-center pt-10"> {!! $products->links() !!}
                </div>

        </section>

        @include('home.footer')

        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        @include('home.script')

</body>

</html>

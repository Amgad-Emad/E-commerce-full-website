<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
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
        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
            outline: none;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        .number-input {
            border: 2px solid #ddd;
            display: inline-flex;
        }

        .number-input,
        .number-input * {
            box-sizing: border-box;
        }

        .number-input input[type=number] {
            font-family: sans-serif;
            max-width: 100%;
            padding: .5rem;
            border: 0;
            text-align: center;
            outline: none;
            margin-bottom: 0;
        }

        .number-input span {
            width: 60px;
            font-size: 1.6rem;
            text-align: center;
            cursor: pointer;
        }

        .detail-box {
            background: lightblue;
            width: 250px;
            padding: 15px;
            align-items: normal;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <div class="d-flex justify-content-center  " style="background: gainsboro;align-items: center;">
            <div class="img-box">
                <img src="product/{{ $product->image }}" alt="" style="width:400px;height:450px !important;">
            </div>
            <div class="detail-box ml-5 d-flex justify-content-center flex-column">
                <h3 class="font-weight-bold text-center" style="font-size: 1.75rem;">
                    {{ $product->title }}
                </h3>
                <h6>
                    {{ $product->description }}
                </h6>
                @if ($product->discount_price != null)
                    <h6 style="text-decoration:line-through;  color:blue ">
                        Price :
                        ${{ $product->price }}
                    </h6>
                    <h6 style=" color:red">
                        After discount :
                        ${{ $product->discount_price }}
                    </h6>
                @else
                    <h6 style=" color:blue">
                        Price :
                        ${{ $product->price }}
                    </h6>
                @endif
                <h6>
                    Product Catagory:{{ $product->catagory }}
                </h6>
                <h6>
                    In stock :{{ $product->quantity }}
                </h6>

                <Form method="POST" action="{{ url('/add_cart', $product->id) }}">
                    @csrf
                    <div class="row">

                        <div class="number-input">
                            <span class="bg-danger"
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">&minus;</span>
                            <input class="quantity bg-light" min="1" placeholder="1" name="quantity"
                                value="1" type="number">
                            <span onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                class="plus bg-success">&plus;</span>
                        </div>
                    </div>
                    <input type="submit" value="Add To Cart" class="" style="margin-top: 10px; width:100%;" onclick="addToCart()">
                </Form>
            </div>


        </div>

        <!-- footer start -->
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

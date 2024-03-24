<!DOCTYPE html>
<html>

<head>
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
        .center {

            margin: auto;
            margin-top: 30px;
            border: 2px solid white;
            text-align: center
        }

        th,
        td {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <div class="center">
            @if (session()->has('massage'))
            <div class="alert alert-success">
                <button type="button" class=" close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('massage') }}
            </div>
        @endif
            <table>
                
                <tr>
                    <th>Product Title</th>
                    <th>Product price</th>
                    <th>Product quantity</th>
                    <th>Product image</th>

                </tr>
                

                <?php $total = 0; ?>
                @foreach ($cart as $c)
                    <tr>
                        <td><a href="{{ url('product_details', $c->product_id) }}">{{ $c->product_title }}</a> </td>
                        <td>{{ $c->price }} </td>
                        <td>{{ $c->quantity }} </td>
                        <td style="padding:0;"> <img src="product/{{ $c->image }}" alt="product image"
                                width="150px"style="margin: auto"></td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('remove_from_cart', $c->id) }}"
                                onclick="return confirm('Are you sure you want to delete {{ $c->product_title }} product')">Delete</a>
                        </td>

                    </tr>
                    <?php $total = +$total + $c->price; ?>
                @endforeach

            </table>
            @if ($total == 0)
                <h1 style=" font-size:2rem">There is no products to show keep shopping</h1>
            @else
            
                <h1 style=" font-size:2rem">The total price is {{ $total }}</h1>
                <h1 style=" font-size:2rem">Order Now </h1>

                <a style="color:white" class="btn btn-success" href="{{url('cash_order')}}">Cash On Delivery</a>
                <h1 style=" font-size:2rem">Thanks for visiting us {{ $c->name }}</h1>

            @endif


        </div >
        

        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        @include('home.script')

</body>

</html>

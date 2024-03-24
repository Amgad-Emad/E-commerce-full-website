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
        .div_center {
            text-align: center;
            padding-top: 40px
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px
        }


        .center {
            margin: auto;
            width: 80%;
            margin-top: 30px;
        }


        th,
        td {
            border: 2px solid black;

        }

        th {
            text-transform: capitalize;

        }
    </style>
</head>

<body>
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    <div class="div_center ">
        <table class="center">
            <tr>

                <th>address</th>
                <th>product title</th>
                <th>price</th>
                <th>quantity</th>
                <th>payment status</th>
                <th>product image</th>
                <th>delivery status</th>

            </tr>

            @forelse ($order as $o)
                <tr>
                    <td>{{ $o->address }}</td>
                    <td>{{ $o->product_title }}</td>
                    <td>EGP {{ $o->price }}</td>
                    <td>{{ $o->quantity }}</td>
                    <td>{{ $o->payment_status }}</td>
                    <td><img src="product/{{ $o->image }}" alt="order image" width="150px"style="margin: auto">
                    </td>

                    @if ($o->delivery_status == 'processing')
                        <td>
                            <p>The order is being prepared</p>
                        </td>
                    @else
                        <td style="background: green; color:white;">deliverd</td>
                    @endif

                    <td style="border: none">
                        @if ($o->delivery_status == 'processing')
                            <a href="{{ url('cancel_order', $o->id) }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this order')">Cancel</a>
                            {{-- <a href="" class="btn btn-primary"> See details</a> --}}
                        @else
                            {{-- <a href="" class="btn btn-primary"> See details</a> --}}
                    </td>
            @endif



            </tr>
        @empty
            <tr>
                <td colspan="16">No Order found</td>
            </tr>
            @endforelse

        </table>
    </div>


    @include('home.script')

</body>

</html>

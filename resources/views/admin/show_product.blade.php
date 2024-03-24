<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px
        }

        .input_color {
            color: black
        }

        .center {
            width: 90%;
            margin: auto;
            margin-top: 30px;
            border: 2px solid white;
        }

        th,
        td {
            padding: 30px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('massage'))
                    <div class="alert alert-success">
                        <button type="button" class=" close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('massage') }}
                    </div>
                @endif
                <div class="div_center">
                    <h2 class="font_size">All Products</h2>

                    <table class="center">
                        <tbody>
                            <tr style="background-color: green; border-color:green;">
                                <th>Product Title</th>
                                <th>Product Description</th>
                                <th>Product catagory</th>
                                <th>Product price</th>
                                <th>Product discount_price</th>
                                <th>Product quantity</th>
                                <th>Product image</th>
                                <th>Action</th>

                            </tr>

                            @foreach ($products as $product)
                                <tr>

                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->catagory }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td style="padding:0;"> <img src="product/{{ $product->image }}" alt=""
                                            width="150px"style="margin: auto"></td>
                                    <td>
                                        <a href="{{ url('/update_product', $product->id) }}" class="btn btn-primary"
                                            style="margin: 5px">Edit</a>
                                        <a onclick="return confirm('Are you sure you want to delete {{ $product->title }} product')"
                                            href="{{ url('/delete_product', $product->id) }}" class="btn btn-danger"
                                            style="margin: 5px">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

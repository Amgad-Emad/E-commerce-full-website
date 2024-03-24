<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
            margin: auto;
            width: 100%;
            margin-top: 30px;
            border: 2px solid white;
        }

        table {
            width: 100%;
            border-radius: 50px;
        }


        th,
        td {
            border: 1px solid white;
            background: #191c24

        }
        th {
            text-transform: capitalize;

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
                    <h2 class="font_size">All Orders</h2>
                    <form action="{{ url('search') }}" method="GET" style="margin-bottom:10px">
                        @csrf
                        <input type="search" placeholder="search" style="border-radius:10px;color:black"
                            name="search">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                        <br>
                    </form>
                    @foreach ($catagory as $c)
                        <a href="{{ url('search', $c->catagory_name) }} " class="btn btn-primary"
                            name="catbtn">{{ $c->catagory_name }}</a>
                    @endforeach
                    <table class="center">
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>user_id</th>
                            <th>product_title</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>product_id</th>
                            <th>payment_status</th>
                            <th>delivery_status</th>
                            <th>product image</th>
                            <th>deliverd</th>

                        </tr>

                        @forelse ($order as $o)
                            <tr>
                                <td>{{ $o->name }}</td>
                                <td>{{ $o->email }}</td>
                                <td>{{ $o->phone }}</td>
                                <td>{{ $o->address }}</td>
                                <td>{{ $o->user_id }}</td>
                                <td>{{ $o->product_title }}</td>
                                <td>EGP {{ $o->price }}</td>
                                <td>{{ $o->quantity }}</td>
                                <td>{{ $o->product_id }}</td>
                                <td>{{ $o->payment_status }}</td>
                                <td>{{ $o->delivery_status }}</td>
                                <td><img src="product/{{ $o->image }}" alt="order image"
                                        width="150px"style="margin: auto"></td>

                                @if ($o->delivery_status == 'processing')
                                    <td>
                                        <a href="{{ url('deliverd', $o->id) }} " class="btn btn-primary"
                                            onclick="return confirm('Are you sure is deliverd')">Deliverd</a>
                                    </td>
                                @else
                                    <td style="background: green; color:white;">deliverd</td>
                                @endif



                            </tr>
                            @empty
                            <tr>
                                <td colspan="16">No Data found</td>
                            </tr>

                        @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>

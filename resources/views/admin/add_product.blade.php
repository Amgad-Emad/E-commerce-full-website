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

        .text_color {
            color: black;
        }

        label {
            width: 200px;
            display: inline-block;
        }

        .div_design {
            padding-bottom: 15px;
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
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('massage'))
                        <div class="alert alert-success">
                            <button type="button" class=" close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('massage') }}
                        </div>
                    @endif
                    <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Product Title :</label>
                            <input type="text" class="text_color" name="title" placeholder="Write Product Title"
                                value="{{ old('title') }}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Description :</label>
                            <input type="text" class="text_color" name="description"
                                placeholder="Write Product Description" value="{{ old('description') }}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Price :</label>
                            <input type="number" class="text_color" name="price" placeholder="Write Product price"
                                value="{{ old('price') }}">
                        </div>
                        <div class="div_design">
                            <label for="">Discount Price :</label>
                            <input type="number" class="text_color" name="discount_price"
                                placeholder="Write Product Discount" value="{{ old('discount_price') }}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Quantity :</label>
                            <input type="number" class="text_color" name="quantity" min="0"
                                placeholder="Write Product Quantity" value="{{ old('quantity') }}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Catagory:</label>
                            <select name="catagory" id="" class="text_color">
                                <option value="" selected>Add a catagory</option>
                                @foreach ($catagory as $catagory)
                                    <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="">Product Image :</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="Add Product" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

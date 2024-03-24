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
            margin: auto;
            width: 50%;
            margin-top: 30px;
            border: 3px solid white;
        }

        table {
            width: 100%;
            border-radius: 50px;
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
                    <h2 class="font_size">Add Catagory</h2>
                    <form action="{{ url('add_catagory') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory"
                            placeholder="catagory name">

                        <input type="submit" class="btn btn-primary "name="submit" value="Add Catagory">
                        @error('catagory')
                        <br>
                            <small class=" text-danger">{{ $message }}</small>
                        @enderror
                    </form>

                    <table class="center">
                        <th>
                            <tr>
                                <td>Catagory</td>
                                <td>Action</td>
                            </tr>
                        </th>
                        @foreach ($data as $catagory)
                            <tr>
                                <td>{{ $catagory->catagory_name }}</td>
                                <td><a href="{{ url('delete_catagory', $catagory->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete {{ $catagory->catagory_name }} Catagory')">Delete</a>
                                </td>
                            </tr>
                        @endforeach

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

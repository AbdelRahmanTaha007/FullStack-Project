<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            top: 40px;
            font-size: 40px
        }
        .header-add{

        }
        .input_color{
            color: black
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }

    </style>
    </head>
    <body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{ session()->get('message') }}
                </div>

                @endif
                <div class="div_center">

                    <h2 class="header-add">Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="name" placeholder="Write Category name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
                <table class="center">
                    <tr>
                        <td>Category Name</td>
                        <td>Actions</td>
                    </tr>
                    @foreach ($data as $data )

                    <tr>
                        <td> {{ $data->category_name }}</td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to Delete this!')" class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>

        </div>


    @include('admin.js')
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce Admin</title>
    @include('admin.css')
    <style type="text/css">
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .h2font {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .input_color {
        color: black;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 1px solid #fff;
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
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2font">Add Category</h2>


                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" name="category" class="input_color" placeholder="Write Category Name">
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                </form>


                </div>

                <table class="center">

                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{ $data->Category_Name }}</td>

                        @if(Auth::user()->usertype == '1')

                        <td>
                        <form action="{{ url('delete_category', $data->id) }}" method="POST">
                        @csrf
                                <input type="submit" onclick="return confirm('Are you sure you want to delete this?')"  class="btn btn-danger" value="Delete">
                        </form>
                            </td>

                        @else

                            <td><h1>Can not remove</h1></td>

                        @endif
                    </tr>
                    @endforeach

                </table>
            </div>
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>

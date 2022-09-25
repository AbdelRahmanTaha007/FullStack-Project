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
        .center{
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
        }
        .img_size{
            width: 300px;
            height: 150px;
        }
        .thead_color{
            background-color: green;
        }
        .th_design{
            padding: 30px;

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
                <h2 class="font_size">Update Products</h2>
                <table class="center">
                    <tr class="thead_color">
                        <th class="th_design">Product Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Image</th>
                        <th class="th_design">Category</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Discount Price</th>
                        <th class="th_design">Edit</th>
                    </tr>
                    @foreach ($products as $product)

                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}" alt="">
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td><a class="btn btn-danger" href="{{ url('delete_product',$product->id) }}" onclick="return confirm('Are you Sure you want to delete This!')">Delete</a>
                        </td>
                        <td><a class="btn btn-success" href="{{ url('update_product',$product->id) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>

    @include('admin.js')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce Admin</title>
    @include('admin.css')
    <style type="text/css">
    .center {
        margin:auto;
        width: 50%;
        border: 1px solid #fff;
        text-align: center;
        margin-top: 40px;

    }

    .font_size {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    }

    .img_size {
        width: 150px;
        height: 150px;
        margin: auto;
    }

    .th_color {
        background-color: skyblue;

    }

    .th_design {
        padding: 30px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->

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

                <h2 class="font_size">All Products</h2>

                <table class="center">

                    <tr class="th_color">
                        <th class="th_design">Product Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Category</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Discount Price</th>
                        <th class="th_design">Product Image</th>
                        @if(Auth::user()->usertype == '1')
                        <th class="th_design">Delete</th>
                        @else
                        @endif
                        <th class="th_design">Edit</th>
                    </tr>
                    @foreach ($product as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}" alt="">
                        </td>
                        @if(Auth::user()->usertype == '1')
                        <form action="{{ url('delete_product', $product->id) }}" method="POST">
                        @csrf
                        <td>
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')" value="Delete">
                        </td>
                        @else
                        @endif
                        <td>
                            <a class="btn btn-success" href="{{ url('update_product', $product->id) }}">Edit</a>
                        </td>
                        </form>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- main-panel ends -->

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>

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
            padding-top: 40px;

        }
        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            padding-right:30px;
            text-align: center;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="Title">Product Title</label>
                            <input type="text" class="text_color" name="title" placeholder="Write a Title" id="" required="">
                    </div>
                    <div class="div_design">
                        <label for="Add-Product">Product Description</label>
                        <input type="text" class="text_color" name="description" placeholder="Write a Description" id="" required="">
                    </div>
                    <div class="div_design">
                        <label for="Add-Product">Product Price</label>
                        <input type="number" class="text_color" name="price" placeholder="Write a Price" id="" required="">
                    </div>
                    <div class="div_design">
                        <label for="Add-Product">Discount Price</label>
                        <input type="number" class="text_color" name="discount_Price" placeholder="Write Discount Price" id="" >
                    </div>
                    <div class="div_design">
                        <label for="Add-Product">Product Quantity</label>
                        <input type="number" class="text_color" name="quantity" placeholder="Write Product Quantity" id="" required="">
                    </div>
                    <div class="div_design">
                        <label for="Add-Product">Product Category</label>
                        <select name="category" id="" required="" class="text_color">
                            <option value="" selected="">Add a Category</option>
                            @foreach ($category as $category )
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="div_design_image">
                        <label for="Add-Product">Product Image</label>
                        <input type="file" class="text_color" name="image" required="" >
                    </div>
                    <div class="div_design">
                        <input type="submit" value="Add a Product" class="btn btn-primary" >
                    </div>
                </form>
                </div>

            </div>
        </div>
    @include('admin.js')
  </body>
</html>

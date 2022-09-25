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

    .font_size {
        font-size: 40px;
        padding-bottom: 40px;

    }

    .text_color {
        color: black;
        padding-bottom: 20px;
    }

    label {
        display: inline-block;
        width: 200px;
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
                    <h1 class="font_size">Add Product</h1>

                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="div_design">
                    <label for="">Product Title:</label>
                    <input type="text" required="" name="title" class="text_color" placeholder="Write product title">
                </div>
                <div class="div_design">
                    <label for="">Product Description:</label>
                    <input type="text" required="" name="description" class="text_color" placeholder="Write product description">
                </div>
                <div class="div_design">
                    <label for="">Product Price:</label>
                    <input type="number" required="" name="price" class="text_color" placeholder="Write product price">
                </div>
                <div class="div_design">
                    <label for="">Discount Price:</label>
                    <input type="number" name="discount_price" class="text_color" placeholder="Write product discount price">
                </div>
                <div class="div_design">
                    <label for="">Product Quantity:</label>
                    <input type="number" required="" min="0" name="quantity" class="text_color" placeholder="Write product quantity">
                </div>
                <div class="div_design">
                    <label for="">Product Category:</label>
                        <select class="text_color" name="category" required="" id="">
                            <option value="" selected="">Add a category here</option>
                            @foreach($category as $category)
                            <option value="{{ $category->Category_Name }}">{{ $category->Category_Name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="div_design">
                    <label for="">Product Image:</label>
                    <input type="file" required="" name="image" class="text_color" placeholder="Choose image">
                </div>

                <div class="div_design">
                    <input type="submit" value="Add Product" class="btn btn-primary">
                </div>
            </form>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce Admin</title>
    @include('admin.css')
    <style type="text/css">
    label{
        display: inline-block;
        width: 200px;
        font-size: 15px;
        font-weight: bold;
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
            <h1 style="font-size: 25px; text-align: center;">Send Email to {{ $order->email }}</h1>
            <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                @csrf
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <label>Email Greeting:</label>
                <input style="color: black;" type="text" name="greeting">
            </div>
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <label>Email First Line:</label>
                <input style="color: black;" type="text" name="firstline">
        </div>
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <label>Email Body:</label>
                <input style="color: black;" type="text"  name="body">
        </div>
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <label>Email Button name:</label>
                <input style="color: black;" type="text" name="button">
        </div>
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <label>Email URL:</label>
                <input style="color: black;" type="text" name="url">
        </div>
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <label>Email Last Line:</label>
                <input style="color: black;" type="text" name="lastline">
        </div>
            <div class="" style="padding-left: 35%; padding-top: 30px;">
                <input  type="submit" value="Send Email" class="btn btn-primary">
        </div>
    </form>


        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>

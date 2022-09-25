<!DOCTYPE html>
<html>
    <head>
       <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Ecommerce</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <style type="text/css">
    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        padding: 30px;

    }

    table,th,td {
        border: 1px solid black;
        padding: 5px;
        margin: auto;

    }

    .th_deg {
        font-size: 30px;
        padding: 5px;
        background-color: skyblue;
        
    }

    .img_deg {
        height: 150px;
        width: 200px;
    }

    .total_deg {
        font-size: 20px;
        padding: 40px;
    }
    </style>
   </head>
   <body>

      <div class="hero_area">
         <!-- start header section -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @if(session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{ session()->get('message') }}
         </div>
         @endif

        <div class="center">
            <h1 style="font-size: 40px; ">User Order</h1>
            @csrf
            <table>
                <tr>
                    <th class="th_deg">Product title</th>
                    <th class="th_deg">Product quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment Status</th>
                    <th class="th_deg">Delivery Status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>

                </tr>

                <?php $totalprice=0 ?>
                @foreach($order as $order)
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status}}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td><img class="img_deg" src="product/{{ $order->image }}" alt=""></td>
                    <form action="{{ url('cancel_order', $order->id) }}" method="POST">
                        @csrf
                        <td>
                        @if($order->delivery_status=="Processing")
                        <button type="submit" value="Remove Product" style="color:black;" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                </td>
                @else

                <p style="color: red;">Not Allowed</p>

                @endif
            </form>

                </tr>
                <?php $totalprice=$totalprice + $order->price; ?>
                @endforeach


            </table>
            <div>
                <h1 class="total_deg">Total Price: {{ $totalprice }}</h1>
            </div>

        </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>

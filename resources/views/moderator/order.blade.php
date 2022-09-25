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
        .title_deg{
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            padding-bottom: 50px;
        }
        .table_deg{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        tr,th,td{
            border:2px solid whitesmoke;
            padding: 10px;
        }
        .th_color{
            background-color: green;
        }
        .img_size{
            width: 400px;
            height: 100px;
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
                <h1 class="title_deg">All orders</h1>
                <table class="table_deg">
                    <tr class="th_color">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity </th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Download Pdf</th>
                    </tr>
                    @foreach ($order as $order )

                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $order->image }}" alt="">
                        </td>
                        <td>
                            @if($order->delivery_status=='processing')

                            <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Are you Sure This Product is delivered!')" class="btn btn-primary">Delivered</a>
                            @else
                            <p>Delivered</p>

                            @endif
                        </td>
                        <td>

                            <a class="btn btn-secondary" href="{{ url('print_pdf',$order->id) }}">Print PDF</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>

    @include('admin.js')
  </body>
</html>

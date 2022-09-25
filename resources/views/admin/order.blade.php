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
            margin: auto;
            border: 1px solid #fff;
            text-align: center;
            margin-top: 40px;
            width: 50%;
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
            padding: 20px;

        }

        table,
        th,
        td {
            border: 1px solid #fff;
            padding: 5px;

        }


    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" >
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel" >
                <div class="content-wrapper" >

                    {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif --}}

                    <h2 class="font_size">All Orders</h2>


                    <div style="padding-left: 44%; padding-bottom: 30px;">
                        <form action="{{ url('search') }}" method="get">
                            @csrf
                            <input type="text" style="color: black;" name="search"
                                placeholder="Search for something...">
                            <input type="submit" value="Search" class="btn btn-outline-primary" placeholder="">
                        </form>
                    </div>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_design">Customer Name</th>
                            <th class="th_design">Email</th>
                            <th class="th_design">Phone</th>
                            <th class="th_design">Address</th>
                            <th class="th_design">Customer ID</th>
                            <th class="th_design">Product Name</th>
                            <th class="th_design">Product Quantity</th>
                            <th class="th_design">Price</th>
                            <th class="th_design">Product ID</th>
                            <th class="th_design">Payment Status</th>
                            <th class="th_design">Delivery Status</th>
                            <th class="th_design">Product Image</th>
                            <th class="th_design">Delivered</th>
                            <th class="th_design">Print PDF</th>
                            <th class="th_design">Send Email</th>
                        </tr>
                        @forelse ($order as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>
                                <td>
                                    <img class="img_size" src="/product/{{ $order->image }}" alt="">
                                </td>
                                <td>
                                    @if ($order->delivery_status == 'Processing')
                                        <a onclick="return confirm('Are you sure this order was delivered?')"
                                            href="{{ url('delivered', $order->id) }}"
                                            class="btn btn-primary">Delivered</a>
                                    @else
                                        <p style="color: green;">Delivered</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print</a>
                                </td>
                                <td>
                                    <a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send Email</a>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="16">
                                    No Data Found
                                </td>
                            </tr>
                        @endforelse
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

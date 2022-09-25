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
            width: 100%;
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
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    {{-- @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif --}}

                    <h2 class="font_size">All Users</h2>


                    <div style="padding-left: 44%; padding-bottom: 30px;">
                        <form action="{{ url('searchusers') }}" method="get">
                            @csrf
                            <input type="text" style="color: black;" name="search"
                                placeholder="Search for something...">
                            <input type="submit" value="Search" class="btn btn-outline-primary" placeholder="">
                        </form>
                    </div>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_design">User Name</th>
                            <th class="th_design">Email</th>
                            <th class="th_design">Phone</th>
                            <th class="th_design">Address</th>
                            <th class="th_design">Customer ID</th>
                            <th class="th_design">Send Email</th>
                            <th class="th_design">User Role</th>
                            @if (Auth::user()->usertype == '1')
                            <th class="th_design">Delete user</th>
                            <th class="th_design">Set Role</th>
                            @else
                            @endif
                        </tr>
                        @forelse ($users as $users)
                            <tr>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->phone }}</td>
                                <td>{{ $users->address }}</td>
                                <td>{{ $users->id }}</td>
                                <td>
                                    <a href="{{ url('send_email_', $users->id) }}" class="btn btn-info">Send Email</a>
                                </td>
                                <td>
                                    @if ($users->usertype == '1')
                                        Admin
                                    @elseif($users->usertype == '2')
                                        Moderator
                                    @else
                                        User
                                    @endif
                                </td>
                                @if (Auth::user()->usertype == '1')
                                <td>
                                    <form action="{{ url('delete_user', $users->id) }}" method="post">
                                        @csrf
                                        <input type="submit"
                                        onclick="return confirm('Are you sure you want to delete ')"
                                        class="btn btn-primary" value="Delete">
                                    </form>
                                </td>
                                @if ($users->usertype =='0')


                                <td>
                                    <form action="{{ url('make_moderator', $users->id) }}" method="post">
                                        @csrf
                                        <input type="submit"
                                        onclick="return confirm('Are you sure you want to make this person a Moderator?')"
                                        class="btn btn-primary" value="Make Moderator">
                                    </form>
                                </td>
                                @else
                                <td>
                                    <p>Cannot assigned</p>
                                </td>
                                @endif
                            </tr>
                            @else
                            @endif

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

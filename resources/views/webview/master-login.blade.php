<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="all">
    <title> @yield('title') </title>
    {{-- css link includes --}}
    @include('webview.partials.links.header')
    <style>
        .account {
            background: #fff;
            border-radius: 8px;
            background-color: #fff;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
            text-align: center;
        }

        .account:hover {
            -webkit-box-shadow: 0 12px 60px 4px rgb(0 0 0 / 15%);
            box-shadow: 0 12px 60px 4px rgb(0 0 0 / 15%);
        }
    </style>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    

    <!-- ============================================== Maincontent : Start ============================================== -->
    @yield('maincontent')
    <!-- ============================================== Maincontent : END ============================================== -->

    <!-- ============================================================= FOOTER ============================================================= -->


    {{-- js includes --}}
    @include('webview.partials.links.footer')

</body>

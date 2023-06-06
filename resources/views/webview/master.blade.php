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
        #mySidepanelAccount span.category-name {
            padding-left: 10px;
        }

        .sidebar-widget-title {
            position: relative;
        }

        .sidebar-widget-title:before {
            content: "";
            width: 100%;
            height: 1px;
            background: #eee;
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
        }

        .py-3 {
            padding-bottom: 1rem !important;
        }

        .sidebar-widget-title span {
            background: #fff;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.2em;
            position: relative;
            padding: 8px;
            color: #dadada;
        }

        #dashside {
            text-align: right;
            padding-right: 15px;
        }

        .account {
            background: #fff;
            border-radius: 8px;
            background-color: #fff;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
            text-align: center;
        }


        #imagenew {
            height: 185px;
            max-height: 189px;
        }

        .account:hover {
            -webkit-box-shadow: 0 12px 60px 4px rgb(0 0 0 / 15%);
            box-shadow: 0 12px 60px 4px rgb(0 0 0 / 15%);
        }
    </style>

    @yield('subcss')
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('webview.partials.header')

    <!-- ============================================== Maincontent : Start ============================================== -->
    @yield('maincontent')
    <!-- ============================================== Maincontent : END ============================================== -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('webview.partials.footer')

    {{-- js includes --}}
    @include('webview.partials.links.footer')


    <script>
        $(document).ready(function() {

            $(document).on('click', '#copyreflink', function(e) {
                var copyText = document.getElementById("referrallink");

                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard
                    .writeText(copyText.value)
                    .then(() => {
                        alert("Successfully copied referral link");
                    })
                    .catch(() => {
                        alert("something went wrong");
                    });
            });

            $(document).on('click', '#copyrefcode', function(e) {
                var copyTextCode = document.getElementById("referralcode");

                copyTextCode.select();
                copyTextCode.setSelectionRange(0, 99999);
                navigator.clipboard
                    .writeText(copyTextCode.value)
                    .then(() => {
                        alert("Successfully copied referral code");
                    })
                    .catch(() => {
                        alert("something went wrong");
                    });
            });

        });
    </script>

    @yield('subscript')

</body>

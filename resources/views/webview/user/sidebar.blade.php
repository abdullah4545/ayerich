<style>
    @media only screen and (max-width: 768px) {
        .d-lg-block {
            display: none;
        }

    }
</style>
<div class="card p-2 d-lg-block">
    @if (isset(Auth::guard('web')->user()->profile))
        <img src="{{ asset(Auth::guard('web')->user()->profile) }}" alt="" id="profileImage">
    @else
        <img src="{{ asset('public/backend/img/user.jpg') }}" alt="" id="profileImage">
    @endif
    <h4 class="text-center m-0">{{ Auth::guard('web')->user()->name }}</h4>
    <div class="card">

        <div class="col-lg-12 col-12" style="text-align: center;padding-right: 25px;padding-bottom: 20px;">
            <input type="text" value="{{ url('/register') }}/{{ Auth::guard('web')->user()->my_referral_id }}"
                id="referralcode" hidden style="color: black;width: 100%; border: none; font-weight: bold;">
            <button id="copyrefcode" style="background: skyblue;border: #081a33; color:#fff;"
                class="btn btn-primary">Copy Referral
                Code</button>
        </div>
    </div>
    <div class="sidebar-widget-title py-3">
        <span>Menu</span>
    </div>

    <div class="widget-profile-menu py-3">
        <ul class="categories categories--style-3">
            <li class="p-2">
                <a href="{{ url('user/dashboard') }}" class="active">
                    <i class="icon fa fa-dashboard category-icon"></i>
                    <span class="category-name">
                        Dashboard
                    </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('user/wallets') }}" class="">
                    <i class="icon fa fa-ticket category-icon"></i>
                    <span class="category-name">
                        Wallet </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('user/purchase_history') }}" class="">
                    <i class="icon fa fa-file-text category-icon"></i>
                    <span class="category-name">
                        Orders </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('track-order') }}" class="">
                    <i class="icon fa fa-file-text category-icon"></i>
                    <span class="category-name">
                        Track Order
                    </span>
                </a>
            </li>
            <li class="p-2">
                <a href="{{ url('user/profile') }}" class="">
                    <i class="icon fa fa-user category-icon"></i>
                    <span class="category-name">
                        Manage Profile
                    </span>
                </a>
            </li>
            <li class="p-2">
                <a href="{{ url('user/referral-user') }}" class="">
                    <i class="icon fa fa-user category-icon"></i>
                    <span class="category-name">
                        Referral User
                    </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('user/generation') }}" class="">
                    <i class="icon fa fa-user category-icon"></i>
                    <span class="category-name">
                        Generation User
                    </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('user/income/report') }}" class="">
                    <i class="icon fa fa-user category-icon"></i>
                    <span class="category-name">
                        Income Report
                    </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('user/fundtransfer/report') }}" class="">
                    <i class="icon fa fa-user category-icon"></i>
                    <span class="category-name">
                        Fount Transfer Report
                    </span>
                </a>
            </li>

            <li class="p-2">
                <a href="{{ url('user/supporttikits') }}" class="">
                    <i class="icon fa fa-ticket category-icon"></i>
                    <span class="category-name">
                        Support Ticket </span>
                </a>
            </li>
            <li class="p-2">
                <a href="{{ url('logout') }}" class="">
                    <i class="icon fa fa-comment category-icon"></i>
                    <span class="category-name">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>

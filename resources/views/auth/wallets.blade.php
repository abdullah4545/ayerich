@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-User Dashboard
@endsection

<style>
    #profileImage {
        border-radius: 50%;
        padding: 65px;
        padding-bottom: 8px;
        padding-top: 10px;
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

    ul.categories {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.categories--style-3>li {
        border: 0;
    }

    ul.categories>li {
        border-bottom: 1px solid #f1f1f1;
    }

    .widget-profile-menu a i {
        opacity: 0.6;
        font-size: 13px !important;
        top: 0 !important;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        display: inline-block;
        margin-right: 0.5rem !important;
    }

    .category-name {
        color: black;
        font-size: 18px;
    }

    .category-icon {
        font-size: 18px;
        color: black;
    }


    .text-white {
        color: white;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .bg-success {
        --bs-bg-opacity: 1;
        background-color: green !important;
    }

    .text-center {
        text-align: center !important;
    }

    .p-2 {
        padding: 0.5rem !important;
    }

    #exchangeIncome:hover {
        color: #00b1ff;
    }

    #exchangeIncome {
        color: black;
    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-direction: column;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0.25rem;
    }

    .mb-2 {
        margin-bottom: 1.5rem !important;
    }

    #icoimgs {
        width: 30px;
    }
</style>

<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="p-2 pt-0">
                    <div class="row">
                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="{{ url('user/transfer-found/main') }}" class="pr-2"
                                                style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 19px;">
                                                    <img src="{{ asset('public/accounts.png') }}" style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="margin: 5px;margin-left: 0;text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Main Balance</h4>
                                                <div class="bellow"
                                                    style="    display: flex;justify-content: space-between;">
                                                    <small class="m-0 text-dark">Blance</small>
                                                    <a href="{{ route('withdrews.index') }}"><img
                                                            src="{{ asset('public/withdrewoo.png') }}" alt=""
                                                            id="icoimgs"></a>
                                                    <a href="{{ route('recharges.index') }}"><img
                                                            src="{{ asset('public/rechargeoo.png') }}" alt=""
                                                            id="icoimgs"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->main_balance, 2, '.', '') }}
                                                <small style="font-size: 10px;">(points)</small>
                                            </h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->main_balance, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="#" class="pr-2" style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 19px;">
                                                    <img src="{{ asset('public/shoppingwal.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    My Balance</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->my_balance, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->my_balance, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="#" class="pr-2" style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 12px;">
                                                    <img src="{{ asset('public/incomenew.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Income</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->my_income, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->my_income, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="#" class="pr-2" style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 12px;">
                                                    <img src="{{ asset('public/withdrewnew.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Withdraw</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->withdrew_balance, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->withdrew_balance, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="#" class="pr-2" style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 12px;">
                                                    <img src="{{ asset('public/referralnew.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    My Referral</h4>
                                                <small class="m-0 text-dark">Account</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ Auth::guard('web')->user()->my_referral }}<small
                                                    style="font-size: 10px;">(preson)</small></h6>
                                            <small
                                                class="text-dark">{{ Auth::guard('web')->user()->my_referral * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 8px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="{{ url('user/transfer-found/referral') }}" class="pr-2"
                                                style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/bonus.png') }}" style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Referral Income</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->referal_bonus, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->referal_bonus, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="{{ url('user/transfer-found/teammate') }}" class="pr-2"
                                                style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/teammate.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Teammate Bonus</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->generation_bonus, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->generation_bonus, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="{{ url('user/transfer-found/global') }}" class="pr-2"
                                                style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/international.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Global Bonus</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->global_salse_commission, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->global_salse_commission, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="#" class="pr-2" style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/meeting.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Cashback Amount</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->group_bonus, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->group_bonus, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="{{ url('user/transfer-found/leadership') }}" class="pr-2"
                                                style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/leadership.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Leadership Bonus</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->leadership_bonus, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->leadership_bonus, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="{{ url('user/transfer-found/purchase') }}" class="pr-2"
                                                style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/bonuspur.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Purchase Bonus</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->purchase_bonus, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->purchase_bonus, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2 mb-2">
                            <div class="card">
                                <div class="card-body" style="padding: 10px;">
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="d-flex" style="justify-content:space-between">
                                            <a href="#" class="pr-2" style="margin-top: 0px;">
                                                <p class="mb-0"
                                                    style="font-size: 30px;border: none;border-radius: 50%;padding: 6px;width: 70px;margin: 0;margin-right: 10px;padding-left: 8px;">
                                                    <img src="{{ asset('public/royaltiesn.png') }}"
                                                        style="width: 100%;">
                                                </p>
                                            </a>
                                            <div>
                                                <h4 class="m-0 text-dark"
                                                    style="text-transform: uppercase;font-weight: bold;font-size: 16px;">
                                                    Royalty Income</h4>
                                                <small class="m-0 text-dark">Blance</small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <h6 class="m-0 text-dark" style="font-size: 16px;">
                                                {{ number_format((float) Auth::guard('web')->user()->purchase_bonus, 2, '.', '') }}<small
                                                    style="font-size: 10px;">(points)</small></h6>
                                            <small
                                                class="text-dark">{{ number_format((float) Auth::guard('web')->user()->purchase_bonus, 2, '.', '') * 0.1 }}%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

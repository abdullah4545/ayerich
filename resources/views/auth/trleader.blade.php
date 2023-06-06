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

    .card {
        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius);
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

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }
</style>

<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-lg-9">

                <div class="card p-2">
                    <h1 class="text-center">Transfer Your Leadership Bonus</h1>
                    <div class="row p-4">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6" style="margin: 20px">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Transfer From</label>
                                    <input type="text" disabled class="form-control" id="from_wallet"
                                        value="Leadership Bonus" name="from_wallet">
                                </div>
                                <div class="form-group">
                                    <label for="Amount">Available Amount</label>
                                    <input type="text" class="form-control"
                                        value="{{ number_format((float) Auth::guard('web')->user()->leadership_bonus, 2, '.', '') }}"
                                        id="available_amount" name="available_amount" placeholder="Available Amount">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Transfer To</label>
                                    <select class="form-control form-control-lg" required name="to_wallet"
                                        id="to_wallet">
                                        <option value="">Choose Wallet</option>
                                        <option value="mainbalance">Main Balance
                                        </option>
                                        <option value="mybalance">My Balance</option>
                                        <option value="income">Income</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Amount">Amount</label>
                                    <input type="number" class="form-control" min="20"
                                        max="{{ number_format((float) Auth::guard('web')->user()->leadership_bonus, 2, '.', '') }}"
                                        id="amount" name="amount" placeholder="Amount">
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>

                                <button type="submit" class="btn btn-primary">Transfer Now</button>
                            </form>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    });
</script>
@endsection

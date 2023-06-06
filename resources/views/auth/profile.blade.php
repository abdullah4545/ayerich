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
                <div class="p-2 pt-0"> 
                    <div class="row">
                        <div class="col-lg-12">
                            @if (Auth::guard('web')->user()->profile_update_request == '0')
                                <div class="card text-center p-4">
                                @else
                                    <div class="card text-center p-4"
                                        style="height:100vh;background-image: url('../public/profileupdatenew.gif')">
                            @endif
                            <div class="row"
                                style="padding: 20px;padding-top:22px;justify-content: space-around;">
                                <div class="col-xs-12 col-md-6 img">
                                    @if (isset(Auth::guard('web')->user()->profile))
                                        <img src="{{ asset(Auth::guard('web')->user()->profile) }}" alt=""
                                            style="height:120px;border-radius: 50%;width: 120px;">
                                    @else
                                        <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                            style="height:120px;border-radius: 50%;width: 120px;">
                                    @endif
                                    <form action="{{ url('update/profile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="profileinfo" style="display: flex;justify-content: space-around;"> 
                                            <div class="form" style="display: flex;justify-content: space-between;">
                                                <div class="form-group pt-4 mt-4">
                                                    <input type="file" name="profile" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-dark text-white"
                                                    style="background: skyblue;height: 34px;margin-top: 14px;margin-left: -6px;" >Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-md-6 infop">
                                    <h4 class="text-center m-0">{{ Auth::guard('web')->user()->name }}</h4>
                                    <h4 class="text-center m-0">{{ Auth::guard('web')->user()->email }}</h4>
                                    <p>Rank:{{ Auth::guard('web')->user()->rank }}</p>
                                    <p>Status:{{ Auth::guard('web')->user()->status }}</p>
                                    <a href="{{ url('user/update/rank/request') }}" class="btn btn-primary">Update
                                        Rank</a>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    @if (Auth::guard('web')->user()->profile_update_request == '0')
                                        
                                    @else
                                        <h1 style="padding-top:50px;color:darkblue">Working On Update Rank</h1>
                                    @endif
                                </div>
                            </div>
                            

                        </div>
                        
                        

                    </div>
                    <div class="col-lg-12" style="margin-top:20px">
                        <div class="card p-4" style="padding:20px">
                            <form action="{{ url('update/profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group mb-2">
                                            <lable>Name</lable>
                                            <input type="text" class="form-control" name="name" id="name" value="{{Auth::guard('web')->user()->name}}" disabled>
                                        </div> 
                                        <div class="form-group mb-2">
                                            <lable>Email</lable>
                                            <input type="text" class="form-control" name="email" id="email" value="{{Auth::guard('web')->user()->email}}" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <lable>Phone</lable>
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{Auth::guard('web')->user()->phone}}" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <lable>Country</lable>
                                            <input type="text" class="form-control" name="country" id="country" value="{{Auth::guard('web')->user()->country}}" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <lable>Status</lable>
                                            <input type="text" class="form-control" name="status" id="status" value="{{Auth::guard('web')->user()->status}}" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <lable>Rank</lable>
                                            <input type="text" class="form-control" name="rank" id="rank" value="{{Auth::guard('web')->user()->rank}}" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <lable>Referral ID</lable>
                                            <input type="text" class="form-control" name="rank" id="rank" value="{{Auth::guard('web')->user()->my_referral_id}}" disabled>
                                        </div>
                                        <div class="form-group mb-2">
                                            <lable>Referral BY</lable>
                                            <input type="text" class="form-control" name="rank" id="rank" value="{{Auth::guard('web')->user()->referral_by}}" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group mb-2">
                                            <lable>Username</lable>
                                            <input type="text" class="form-control" name="username" id="username" value="{{Auth::guard('web')->user()->username}}" disabled>
                                        </div>
                                        <div class="imageinfo">
                                            @if (isset(Auth::guard('web')->user()->profile))
                                                <img src="{{ asset(Auth::guard('web')->user()->profile) }}" alt=""
                                                    style="height:120px;border-radius: 50%;width: 120px;">
                                            @else
                                                <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                                    style="height:120px;border-radius: 50%;width: 120px;">
                                            @endif
                                            <form action="{{ url('update/profile') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="profileinfo" style="display: flex;justify-content: space-around;"> 
                                                    <div class="form" style="display: flex;justify-content: space-between;">
                                                        <div class="form-group pt-4 mt-4">
                                                            <lable>Profile Image</lable>
                                                            <input type="file" name="profile" class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            style="background: skyblue;height: 34px;margin-top: 33px;margin-left: -6px;" >Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="imageinfo">
                                            @if (isset(Auth::guard('web')->user()->nid_font))
                                                <img src="{{ asset(Auth::guard('web')->user()->nid_font) }}" alt=""
                                                    style="height:120px;border-radius: 50%;width: 120px;">
                                            @else
                                                <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                                    style="height:120px;border-radius: 50%;width: 120px;">
                                            @endif
                                            <form action="{{ url('update/profile') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="profileinfo" style="display: flex;justify-content: space-around;"> 
                                                    <div class="form" style="display: flex;justify-content: space-between;">
                                                        <div class="form-group pt-4 mt-4">
                                                            <lable>Nid Image</lable>
                                                            <input type="file" name="nid_font" class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            style="background: skyblue;height: 34px;margin-top: 33px;margin-left: -6px;" >Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </form>
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

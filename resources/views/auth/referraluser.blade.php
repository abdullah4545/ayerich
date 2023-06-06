@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Referral User
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
             
            <div class="col-lg-9">
                <div class="pb-4 pt-0">
                    <div class="info ps-2 p-4">
                        <h2 class="m-0 text-center pb-4" style="color:#0f6cb2"> Referral User List </h2>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            @forelse ($myreferusers as $myuser)
                                <div class="card" style="padding: 10px;border: 1px solid skyblue;margin-bottom:10px">
                                    <div class="card-header">
                                      <a class="collapsed card-link" data-toggle="collapse" href="#collapse{{$myuser->id}}">
                                        <div class="info ps-2 d-flex" style="justify-content:space-between">
                                            <p class="m-0 pt-2" style="color:black ;margin-bottom:0px !important;font-size: 18px;padding-top: 10px;">
                                                <b>ID: <span>{{ $myuser->id }}
                                                        ({{ $myuser->my_referral_id }})
                                                    </span></b>
                                            </p>
                                            @if (isset($myuser->profile))
                                                <img src="{{ asset($myuser->profile) }}" alt=""
                                                    style="margin-bottom: 4px;height: 40px;width: 40px; border-radius: 50%;">
                                            @else
                                                <img src="{{ asset('public/backend/img/user.jpg') }}"
                                                    alt=""
                                                    style="margin-bottom: 4px;height: 40px;width: 40px; border-radius: 50%;">
                                            @endif
                                        </div>
                                      </a>
                                    </div>
                                    <div id="collapse{{$myuser->id}}" class="collapse" data-parent="#accordion">
                                        <div class="card-body" style="border-top: 1px solid #d0d0d0;margin-top: 10px; padding-top: 10px;">
                                            <div style="display: flex;justify-content:space-between">
    
                                                <div class="info ps-2"> 
                                                    <p class="m-0 pb-2" style="color:rgb(12, 6, 95) ;">
                                                        <b><span>{{ $myuser->name }}</span></b> <br>
                                                        <b><span>{{ $myuser->email }}</span></b> <br>
                                                        <b><span>{{ $myuser->country }}</span></b><br>
                                                        <b><span>Referral User:
                                                                {{ \App\Models\User::where('referral_by', $myuser->my_referral_id)->get()->count() }}</span></b>
                                                    </p>
                                                    <p class="m-0" style="color:rgb(26, 142, 214);margin: 0px;">
                                                        <b style="color: gray">Join Date:
                                                            <span>{{ $myuser->created_at->format('d M') }},
                                                                {{ $myuser->created_at->format('Y') }}
                                                                ,{{ $myuser->created_at->format('H:i:s') }}</span></b>
                                                    </p>
                                                </div>
                                                <div class="delivery"
                                                    style="padding-top: 0px;text-align: right;padding-right: 10px;"> 
                                                    <button class="btn btn-success btn-sm mb-2"
                                                            style="padding: 2px">{{ $myuser->status }}</button>
                                                        <br>
                                                        <button class="btn btn-primary btn-sm"
                                                            style="padding: 2px;">{{ $myuser->rank }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>  
                            @empty 
                                <div class="card p-2 mb-2">
                                    <div style="display: flex;justify-content:center">
    
                                        <div class="info ps-2 p-4">
                                            <h2> No User Found !</h2>
                                        </div>
                                    </div>
    
                                </div> 
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

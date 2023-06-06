@extends('webview.master')

@section('maincontent')

@section('title')
    {{ env('APP_NAME') }}- Support Tickets
@endsection

<style>
    #imagenew {
        height: 185px;
        max-height: 189px;
    }

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

    . {
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

    .product {
        margin: 8px 4px;
    }
</style>
<style>
    a {
        color: black;
        text-decoration: none;
    }

    span.select2.select2-container.select2-container--default {
        width: 80px !important;
    }

    #titlename {
        text-align: center;
        padding: 10px;
        text-transform: uppercase;
        background: gray;
        color: white;
        border-radius: 3px;
    }

    div {
        color: black;
    }

    #accountbtn {
        width: 50%;
        padding: 10px;
        font-size: 22px;
    }

    #pb30 {
        padding-bottom: 50px;
    }

    .ptlg {
        padding-top: 74px;
    }

    @media only screen and (max-width: 600px) {
        #accountbtn {
            width: 100%;
            padding: 10px;
            font-size: 22px;
        }

        .ptlg {
            padding-top: 0px;
        }
    }
</style>
<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-md-12 col-lg-9 m-auto" id="pb30">
                <div class="" style="display: flex;justify-content: space-between;">
                    <h4 id="titlename">Ticket Lists</h4>
                    <a href="{{ route('supporttikits.create') }}" class="btn btn-primary" style="height: 40px;">Create
                        New
                        Ticket</a>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card p-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Department</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Last Update</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse ($tikits as $tikit)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('supporttikits.show', $tikit->id) }}">
                                                    {{ $tikit->department }}
                                                </a>
                                            </th>
                                            <td>
                                                <a href="{{ route('supporttikits.show', $tikit->id) }}">
                                                    <span
                                                        style="float: left;color: green;font-weight: bold;">#000{{ $tikit->id }}</span>
                                                    <br>{{ $tikit->subject }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('supporttikits.show', $tikit->id) }}">
                                                    <button class="btn btn-secondary">{{ $tikit->status }}</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('supporttikits.show', $tikit->id) }}">
                                                    {{ $tikit->updated_at }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

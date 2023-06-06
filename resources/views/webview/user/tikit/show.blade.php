@extends('webview.master')

@section('maincontent')

@section('title')
    {{ env('APP_NAME') }}-View Support Tickets
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
            <div class="col-12 col-lg-9" id="pb30">
                <h4 id="titlename">Edit Ticket No - #000{{ $tikit->id }}</h4>
                <div class="row mb-4">
                    <div class="col-12 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header" id="heading" style="border: 1px solid skyblue;">
                                <h5 class="m-0"
                                    style="cursor: pointer;display: flex;justify-content: space-between;padding: 8px;font-weight: bold;">
                                    <a type="button" id="qtn" data-toggle="collapse"
                                        style="text-decoration: none;color:black" data-target="#collapseTikit"
                                        aria-expanded="true" aria-controls="collapseTikit">
                                        #000{{ $tikit->id }} >>> &nbsp;{{ $tikit->subject }}
                                    </a>
                                    <span><i class="fa fa-sort-down"></i></span>
                                </h5>
                            </div>

                            <div id="collapseTikit" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                                <div class="card-body" style="padding: 20px">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $tikit->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Email / Phone</label>
                                                <input class="form-control" type="text" name="email"
                                                    value="{{ $tikit->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Subject</label>
                                                <input class="form-control" value="{{ $tikit->subject }}" type="text"
                                                    name="subject" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Department</label>
                                                <select name="department" id="department" class="form-control" required>
                                                    <option @if ($tikit->department == 'Billing') selected  @else @endif
                                                        value="Billing">Billing</option>
                                                    <option @if ($tikit->department == 'Technical Support') selected  @else @endif
                                                        value="Technical Support">Technical Support</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Priority</label>
                                                <select name="priority" id="priority" class="form-control" required>
                                                    <option @if ($tikit->priority == 'Low') selected  @else @endif
                                                        value="Low">Low</option>
                                                    <option @if ($tikit->priority == 'Medium') selected  @else @endif
                                                        value="Medium">Medium</option>
                                                    <option @if ($tikit->priority == 'High') selected  @else @endif
                                                        value="High">High</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Message</label>
                                                <textarea class="form-control" name="message" required id="message" cols="30" rows="6">{{ $tikit->message }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Attachment</label>
                                                <img src="{{ asset($tikit->attachment) }}" alt=""
                                                    height="120px">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Status</label>
                                                <select name="department" id="department" class="form-control" required>
                                                    <option @if ($tikit->status == 'Processing') selected  @else @endif
                                                        value="Processing">Processing</option>
                                                    <option @if ($tikit->status == 'Inprogress') selected  @else @endif
                                                        value="Inprogress">Inprogress</option>
                                                    <option @if ($tikit->status == 'Customer-Replay') selected  @else @endif
                                                        value="Customer-Replay">Customer-Replay</option>
                                                    <option @if ($tikit->status == 'Answered') selected  @else @endif
                                                        value="Answered">Answered</option>
                                                    <option @if ($tikit->status == 'Closed') selected  @else @endif
                                                        value="Closed">Closed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 id="titlename">Replay Of Ticket - #000{{ $tikit->id }}</h4>
                <div class="card" style="padding-top: 20px">
                    <div class="col-12 col-md-12 mb-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($replays as $replay)
                                    <tr>
                                        <th scope="row">
                                            {{ $replay->id }}
                                        </th>
                                        <th scope="row">
                                            {{ $replay->replay }}
                                            <br>
                                            <img src="{{ asset($replay->replayatt) }}" alt=""
                                                height="80px">
                                        </th>
                                        <td>
                                            {{ $replay->status }}
                                        </td>
                                        <td>
                                            {{ $replay->updated_at }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card p-4" style="padding: 20px">
                    <div class="row">
                        <div class="col-12 col-md-12" style="    padding: 30px;">
                            <form action="{{ url('user/replay/tikit/' . $tikit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">

                                    <div class="row mb-2">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Message</label>
                                                <textarea class="form-control" name="replay" required id="replay" cols="30" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" value="User" class="form-control">
                                    <div class="row mb-4">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="name">Attachment</label>
                                                <input type="file" name="replayatt" id="attachment"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group"
                                                style="display: flex;justify-content: space-around;">
                                                <a href="{{ url('supporttikits') }}"
                                                    class="btn btn-secondary">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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


@endsection

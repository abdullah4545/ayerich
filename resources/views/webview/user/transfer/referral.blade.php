@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Referral Wallet
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


<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-xs-12 col-lg-9" style="padding-right:0;">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-12 p-2 pb-0 mb-4"
                        style="margin: auto;justify-content: space-around;display: flex;">
                        <div class="h-100 bg-secondary rounded p-2">
                            <h5 class="card-title text-center mt-2" style="color:black">Referral Bonus Transfer</h5>
                            <p class=" text-center" style="width::100%;color:red;">[ NB: You need to pay
                                2% charge for transfer money ]</p>

                            <form id="NewFoundtransfer" name="form" enctype="multipart/form-data"
                                class="from-prevent-multiple-submits">
                                @csrf
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-12 m-auto justify-content-center align-items-center">
                                        <div class="form-group mb-3">
                                            <label for="controlInput">From Referral Balance</label>
                                            <input type="text" class="form-control " id="balance" name="balance"
                                                value="Referral Balance : {{ intval(Auth::user()->referal_bonus) }}"
                                                placeholder="From Balance" required readonly>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <label for="controlInput">To Wallet</label>
                                                <select name="to" id="to" class="form-control" required>
                                                    <option value="">Choose Wallet</option>
                                                    <option value="Main Balance">Main Balance</option>
                                                    <option value="My Balance">My Balance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="controlInput1">Transfer Amount</label>
                                            <input type="number" min="1"
                                                max="{{ intval(Auth::user()->referal_bonus) }}" class="form-control"
                                                name="transfer_amount" placeholder="Transfer Amount" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="controlInput1">Password To Confirm</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Your Password To Confirm" required>
                                        </div>
                                        <div class="d-flex w-100" style="justify-content: space-around;">
                                            <button type="submit"
                                                class="btn btn-primary from-prevent-multiple-submits">
                                                <i class="spinner fa fa-spinner fa-spin"></i>
                                                Convert Now
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-xl-12 p-2 pt-0">
                        <div class="bg-secondary rounded p-2">
                            <h6 class="mb-2 text-center" style="color:black;">Transfer History</h6>
                            <div class="data-tables" style="overflow-x:auto;">
                                <table class="table table-striped" id="foundtransferinfo" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Amount</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </div>

            </div>
        </div>
    </div>
</div>



<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<script>
    $(document).ready(function() {

        var foundtransferinfo = $('#foundtransferinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            pageLength: 50,
            ajax: '{!! route('referraldata') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'from'
                },
                {
                    data: 'to'
                },
                {
                    data: 'amount'
                },

                {
                    data: 'date'
                },
            ]
        });


        $('#NewFoundtransfer').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('foundtransferreferral') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    if (data == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Password Incorrect',
                            text: 'Please enter a valid password',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else if (data == 'lessblance') {
                        swal({
                            icon: 'error',
                            title: 'Not enough blance',
                            text: 'Please keep required blance to transfer',
                            buttons: true,
                            buttons: "Thanks",
                        });
                    } else {
                        $('#amount').val('');
                        $('#password').val('');

                        swal({
                            title: "Found Transfer Success!",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        foundtransferinfotbl.ajax.reload();
                    }

                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

    });

    (function() {
        $('.from-prevent-multiple-submits').on('submit', function() {
            $('.from-prevent-multiple-submits').attr('disabled', 'true');
            $('.spinner').css('display', 'inline');
        })
    })();
</script>
@endsection

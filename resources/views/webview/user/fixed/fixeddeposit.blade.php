@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Fixed Deposit
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

@php
    $banks = App\Models\Bank::where('status', 'Active')->get();
@endphp
<div class="outer-top-xs outer-bottom-xs">
    <div class="container pt-4 mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-xs-12 col-lg-9" style="padding-right:0;">

                <div class="row">
                    @if (isset($depositss))
                    @else
                        <div class="col-sm-12 col-md-12 col-xl-12 p-2 pb-0 mb-4"
                            style="margin: auto;justify-content: space-around;display: flex;">
                            <div class="h-100 bg-secondary rounded p-2">
                                <h5 class="card-title text-center mt-2" style="color:black">Fixed Deposit</h5>
                                <p class=" text-center" style="width::100%;color:red;">[ NB: you will get 1% interest
                                    monthly ]</p>

                                <form id="NewFoundtransfer" name="form" enctype="multipart/form-data"
                                    class="from-prevent-multiple-submits">
                                    @csrf
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-12 m-auto justify-content-center align-items-center">

                                            <div class="form-group mb-3">
                                                <div class="form-group mb-3">
                                                    <label for="controlInput">Choose Bank</label>
                                                    <select name="bank_id" id="bank_id" onchange="setadd()"
                                                        class="form-control" required>
                                                        <option value="">Choose Bank</option>
                                                        @forelse ($banks as $b)
                                                            <option value="{{ $b->id }}">{{ $b->bank_name }}
                                                            </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3" id="aditional">

                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="controlInput1">Deposit Amount</label>
                                                <input type="number" class="form-control" name="amount"
                                                    placeholder="Deposit Amount" required>
                                            </div>
                                            <div class="d-flex w-100" style="justify-content: space-around;">
                                                <button type="submit"
                                                    class="btn btn-primary from-prevent-multiple-submits">
                                                    <i class="spinner fa fa-spinner fa-spin"></i>
                                                    Deposit Now
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endif

                    <div class="col-sm-12 col-md-12 col-xl-12 p-2 pt-0">
                        <div class="bg-secondary rounded p-2">
                            <h6 class="mb-2 text-center" style="color:black;">Transfer History</h6>
                            <div class="data-tables" style="overflow-x:auto;">
                                <table class="table table-striped" id="foundtransferinfo" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Bank</th>
                                            <th>To ACC</th>
                                            <th>TRX ID</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Status</th>
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
            ajax: '{!! route('fixeddepositdata') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'bank_name'
                },
                {
                    data: 'account_number'
                },
                {
                    data: 'trx_id'
                },
                {
                    data: 'amount'
                },
                {
                    data: 'date'
                },
                {
                    data: 'status'
                },
            ]
        });


        $('#NewFoundtransfer').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ url('user/fixeddeposits') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {

                    swal({
                        title: "Deposit request send Success!",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    location.reload();


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

    function setadd() {
        var id = $('#bank_id').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('user/get/bankinfo') }}/" + id,
            processData: false,
            contentType: false,

            success: function(response) {
                $('#aditional').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>
@endsection

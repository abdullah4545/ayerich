@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Income Report
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
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="bg-secondary rounded">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <form action="{{ url('user/income/report/download') }}" method="get">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2 p-2">
                                                        <label for="inputCity" class="col-form-label">Start Date</label>
                                                        <input type="text" name="startDate"
                                                            class="form-control datepicker" id="startDate"
                                                            value="<?php echo date('Y-m-d'); ?>" placeholder="Select Date">
                                                    </div>
                                                    <div class="form-group col-md-2 p-2">
                                                        <label for="inputCity" class="col-form-label">End Date</label>
                                                        <input type="text" name="endDate"
                                                            class="form-control datepicker" id="endDate"
                                                            value="<?php echo date('Y-m-d'); ?>" placeholder="Select Date">
                                                    </div>
                                                    <div class="form-group col-md-3 p-2">
                                                        <label for="inputState" class="col-form-label">Choose
                                                            Income Type</label>
                                                        <select id="income_type" name="income_type"
                                                            class="form-control">
                                                            <option value="Referal Bonus">Referal Bonus</option>
                                                            <option value="First Generation Bonus">First Gen Bonus
                                                            </option>
                                                            <option value="Secound Generation Bonus">Secound Gen Bonus
                                                            </option>
                                                            <option value="Third Generation Bonus">Third Gen Bonus
                                                            </option>
                                                            <option value="Fourth Generation Bonus">Four Gen Bonus
                                                            </option>
                                                            <option value="Fifth Generation Bonus">Fifth Gen Bonus
                                                            </option>
                                                            <option value="Sixth Generation Bonus">Six Gen Bonus
                                                            </option>
                                                            <option value="Seventh Generation Bonus">Seven Gen Bonus
                                                            </option>
                                                            <option value="Eighth Generation Bonus">Eight Gen Bonus
                                                            </option>
                                                            <option value="Nineth Generation Bonus">Nine Gen Bonus
                                                            </option>
                                                            <option value="Tenth Generation Bonus">Ten Gen Bonus
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3 pt-4"
                                                        style=" padding-top: 28px !important;">
                                                        <button type="submit"
                                                            class="btn btn-info btn-download-income_type"><i
                                                                class="fa fa-print"></i> Download</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="reportTable" class="table table-centered table-nowrap mb-0"
                                            style="width: 100%">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Bonus Name</th>
                                                    <th>Comments</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
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



<input type="hidden" name="_token" value="{{ csrf_token() }}" />


<script>
    $(document).ready(function() {
        $('#income_type').val();
        //token
        var token = $("input[name='_token']").val();
        //date picker
        $(".datepicker").flatpickr();

        var table = $("#reportTable").DataTable({
            type: "get",
            ajax: {
                url: "{{ url('user/income/report/data') }}",
                data: {
                    startDate: function() {
                        return $('#startDate').val()
                    },
                    endDate: function() {
                        return $('#endDate').val()
                    },
                    income_type: function() {
                        return $('#income_type').val()
                    }
                }
            },
            ordering: false,
            pageLength: 50,
            columns: [{
                    data: "orderid"
                },
                {
                    data: "date"
                },
                {
                    data: "bonus_name"
                },
                {
                    data: "comment"
                },
                {
                    data: "bonus_coin"
                }
            ],
            search: false,
            dom: '<"row"<"col-sm-6"Bl><"col-sm-6"f>>' +
                '<"row"<"col-sm-12"<"table-responsive"tr>>>' +
                '<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: {
                buttons: [{
                    extend: 'print',
                    text: 'Print',
                    footer: true,
                    title: function() {
                        var printTitle = $('#income_type').val();
                        return printTitle;
                    },
                    customize: function(win) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).find('h1').after(
                            '<p style="text-align: center">From : ' + $('#startDate')
                            .val() + ' - To : ' + $('#endDate').val() + '</p>');

                    }
                }]
            },
            language: {
                paginate: {
                    previous: "<i class='fas fa-chevron-left'>",
                    next: "<i class='fas fa-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-sm");
                $('.dt-buttons').hide();
            },
            footerCallback: function() {
                var api = this.api();
                var numRows = api.rows().count();
                $('.total').empty().append(numRows);

                var intVal = function(i) {
                    return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i ===
                        "number" ? i : 0;
                };

                Total = api.column(4, {
                    page: "current"
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                $(api.column(4).footer()).html(Total + " Tk");
            }

        });


        $(document).on('change', '#startDate', function() {
            table.ajax.reload();
        });
        $(document).on('change', '#endDate', function() {
            table.ajax.reload();
        });
        $(document).on('change', '#income_type', function() {
            table.ajax.reload();
        });


    });
</script>
@endsection

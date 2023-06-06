@extends('backend.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Rank Bonus
@endsection
<style>
    div#roleinfo_length {
        color: red;
    }

    div#roleinfo_filter {
        color: red;
    }

    div#roleinfo_info {
        color: red;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 p-2 pb-0">
            <div class="h-100 bg-secondary rounded p-2 pb-0">
                <div class="d-flex align-items-center justify-content-between" style="width: 50%;float:left;">
                    <h6 class="mb-0">Ranks List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#mainRank" class="btn btn-primary m-2"
                        style="float: right"> + Create Rank</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 p-2 pt-0">
            <div class="bg-secondary rounded p-2">
                <div class="data-tables" style="overflow-x:auto">
                    <table class="table table-dark" id="rankinfo" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Rank Name</th>
                                <th>Min User</th>
                                <th>Bonus Point</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- create payment icon --}}
        <div class="modal fade" id="mainRank" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Create New Rank</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddRank" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="rank_name" id="rank_name"
                                    placeholder="Rank Name" required>
                                <label for="floatingInput">Rank Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="rank_user_range" id="rank_user_range"
                                    placeholder="Minimum User" required>
                                <label for="floatingInput">Minimum User</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="rank_bonus_point" id="rank_bonus_point"
                                    placeholder="Bonus Point" required>
                                <label for="floatingInput">Bonus Point</label>
                            </div>
                            <div class="form-group mt-2" style="text-align: right">
                                <div class="submitBtnSCourse">
                                    <button type="submit" name="btn" data-bs-dismiss="modal"
                                        class="btn btn-dark btn-block" style="float: left">Close</button>
                                    <button type="submit" name="btn"
                                        class="btn btn-primary AddCourierBtn btn-block">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->

        {{-- edit payment icon --}}
        <div class="modal fade" id="editmainRank" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary rounded h-100">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: red;">Edit Rank</h5>
                        <button type="button" class="btn-dark btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditRank" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="rank_name" id="rank_name"
                                    placeholder="Rank Name" required>
                                <label for="floatingInput">Rank Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="rank_user_range" id="rank_user_range"
                                    placeholder="Minimum User" required>
                                <label for="floatingInput">Minimum User</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="rank_bonus_point"
                                    id="rank_bonus_point" placeholder="Bonus Point" required>
                                <label for="floatingInput">Bonus Point</label>
                            </div>
                            <input type="text" name="rank_id" id="rank_id" hidden>
                            <div class="form-group mt-2" style="text-align: right">
                                <div class="submitBtnSCourse">
                                    <button type="submit" name="btn" data-bs-dismiss="modal"
                                        class="btn btn-dark btn-block" style="float: left">Close</button>
                                    <button type="submit" name="btn"
                                        class="btn btn-primary AddCourierBtn btn-block">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
</div>

<script>
    $(document).ready(function() {
        var token = $("input[name='_token']").val();

        var rankinfo = $('#rankinfo').DataTable({
            order: [
                [0, 'desc']
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.rank.data') !!}',
            columns: [{
                    data: 'id'
                },
                {
                    data: 'rank_name'
                },
                {
                    data: 'rank_user_range'
                },
                {
                    data: 'rank_bonus_point'
                },
                {
                    "data": null,
                    render: function(data) {

                        if (data.status === 'Active') {
                            return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="rankstatusBtn" data-id="' +
                                data.id + '">Active</button>';
                        } else {
                            return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="rankstatusBtn" data-id="' +
                                data.id + '" >Inactive</button>';
                        }


                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });


        //add rank

        $('#AddRank').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                uploadUrl: '{{ route('admin.ranks.store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {

                    $('#rank_name').val('');
                    $('#amount_range').val('');
                    $('#rank_bonus_percent').val('');

                    swal({
                        title: "Success!",
                        icon: "success",
                    });
                    rankinfo.ajax.reload();


                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        //edit rank
        $(document).on('click', '#editRankBtn', function() {
            let rankId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: 'ranks/' + rankId + '/edit',

                success: function(data) {
                    $('#EditRank').find('#rank_name').val(data
                        .rank_name);
                    $('#EditRank').find('#amount_range').val(data.amount_range);
                    $('#EditRank').find('#rank_id').val(data.id);
                    $('#EditRank').find('#rank_bonus_percent').val(data.rank_bonus_percent);
                    $('#EditRank').attr('data-id', data.id);
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

        //update rank
        $('#EditRank').submit(function(e) {
            e.preventDefault();
            let rankId = $('#rank_id').val();

            $.ajax({
                type: 'POST',
                url: 'rank/' + rankId,
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {

                    $('#EditRank').find('#rank_name').val('');
                    $('#EditRank').find('#amount_range').val('');
                    $('#EditRank').find('#rank_bonus_percent').val('');

                    swal({
                        title: "Rank update successfully !",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    rankinfo.ajax.reload();


                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        // status update

        $(document).on('click', '#rankstatusBtn', function() {
            let rankId = $(this).data('id');
            let rankStatus = $(this).data('status');

            $.ajax({
                type: 'PUT',
                url: 'rank/status',
                data: {
                    rank_id: rankId,
                    status: rankStatus,
                    '_token': token
                },

                success: function(data) {
                    swal({
                        title: "Status updated !",
                        icon: "success",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    });
                    rankinfo.ajax.reload();
                },
                error: function(error) {
                    console.log('error');
                }

            });
        });

    });
</script>

@endsection

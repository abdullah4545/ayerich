@extends('backend.master')

@section('maincontent')
@section('title')
    Ayebazar- {{ $status }}
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
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-secondary rounded p-4 pb-0">
                <div class="d-flex align-items-center justify-content-between" style="width: 50%;float:left;">
                    <h6 class="mb-0">{{ $status }} Fixed Deposit List</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="data-tables">
                    <table class="table table-dark" id="foundtransferinfo" width="100%" style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>User Info</th>
                                <th>Bank</th>
                                <th>TRX ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deposits as $deposit)
                                <tr>
                                    <th>{{ $deposit->id }}</th>
                                    @php
                                        $u = App\Models\User::where('id', $deposit->user_id)->first();
                                    @endphp

                                    <input type="text" name="id" id="id" value="{{ $deposit->id }}"
                                        style="display: none">

                                    <th>{{ $u->name }} <br>{{ $u->username }} </th>
                                    <th>{{ $deposit->bank_name }} <br>ACC: {{ $deposit->account_number }}</th>
                                    <th>{{ $deposit->trx_id }}</th>
                                    <th>{{ $deposit->amount }}</th>
                                    <th>{{ $deposit->date }}</th>
                                    <th>
                                        <div class="form-group">
                                            <select class="form-control" name="status" id="status"
                                                onchange="changeStatus()" data-id="{{ $deposit->id }}">
                                                <option value="Pending"
                                                    @if ($deposit->status == 'Pending') selected @endif>Pending</option>
                                                <option value="Active"
                                                    @if ($deposit->status == 'Active') selected @endif>Active</option>
                                                <option value="Closed"
                                                    @if ($deposit->status == 'Closed') selected @endif>Closed</option>
                                                <option value="Hold"
                                                    @if ($deposit->status == 'Hold') selected @endif>Hold</option>
                                            </select>
                                        </div>
                                    </th>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="status" id="status" value="{{ $status }}">
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#foundtransferinfo').DataTable();
    });

    function changeStatus() {
        var token = $("input[name='_token']").val();
        var status = $('#status').val();
        var id = $('#id').val();

        $.ajax({
            type: 'POST',
            url: '{{ url('admin/fixed-deposit/change-status') }}',
            data: {
                deposit_id: id,
                status: status,
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
                location.reload();
            },
            error: function(error) {
                console.log('error');
            }

        });


    }
</script>

@endsection

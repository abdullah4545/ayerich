@extends('admin.master')

@section('maincontent')
    <main id="main" class="main">

        <div class="pagetitle row">
            <div class="col-6">
                <h1><a href="{{ url('/admindashboard') }}">Dashboard</a></h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admindashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Bank</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6" style="text-align: right">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#mainBank"><span style="font-weight: bold;">+</span> Add New Bank</button>
            </div>
        </div><!-- End Page Title -->

        {{-- //popup modal for create user --}}
        <div class="modal fade" id="mainBank" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Bank</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="AddBank" enctype="multipart/form-data">
                            @csrf
                            <div class="successSMS"></div>
                            <div class="form-group mb-3">
                                <label for="websiteTitle" class="control-label">Bank Name</label>
                                <div class="webtitle">
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" required>
                                </div>
                            </div>

                            <div class="form-group pb-3">
                                <label for="websiteTitle" class="control-label">Bank Account Number</label>
                                <div class="webtitle">
                                    <input type="text" class="form-control" name="account_number" id="account_number"
                                        required>
                                </div>
                            </div>
                            <div class="form-group pb-3">
                                <label for="websiteTitle" class="control-label">Branch (if available)</label>
                                <div class="webtitle">
                                    <input type="text" class="form-control" name="branch" id="branch">
                                </div>
                            </div>
                            <div class="form-group" style="text-align: right">
                                <div class="submitBtnSCourse">
                                    <button type="submit" name="btn"
                                        class="btn btn-primary AddBankBtn btn-block">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->

        {{-- //table section for category --}}

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body pt-4">
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ \Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover mb-0" id="bankinfotbl"
                                    width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Bank Name</th>
                                            <th>Bank Account</th>
                                            <th>Branch</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- //popup modal for edit user --}}
        <div class="modal fade" id="editmainBanks" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Bank</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" id="EditBank" enctype="multipart/form-data">
                            @csrf
                            <div class="successSMS"></div>

                            <div class="form-group mb-3">
                                <label for="websiteTitle" class="control-label">Bank Name</label>
                                <div class="webtitle">
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" required>
                                </div>
                            </div>

                            <div class="form-group pb-3">
                                <label for="websiteTitle" class="control-label">Bank Account Number</label>
                                <div class="webtitle">
                                    <input type="text" class="form-control" name="account_number" id="account_number"
                                        required>
                                </div>
                            </div>
                            <div class="form-group pb-3">
                                <label for="websiteTitle" class="control-label">Branch (if available)</label>
                                <div class="webtitle">
                                    <input type="text" class="form-control" name="branch" id="branch">
                                </div>
                            </div>
                            <input type="text" name="id" id="idhidden" hidden>
                            <div class="form-group" style="text-align: right">
                                <div class="submitBtnSCourse">
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->

    </main>



    <script>
        $(document).ready(function() {

            var bankinfotbl = $('#bankinfotbl').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('bank.info') !!}',
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
                        data: 'branch'
                    },
                    {
                        "data": null,
                        render: function(data) {

                            if (data.status === 'Active') {
                                return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="Inactive" id="statusBtnBank" data-id="' +
                                    data.id + '">Active</button>';
                            } else {
                                return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="Active" id="statusBtnBank" data-id="' +
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


            //add user

            $('#AddBank').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    uploadUrl: '{{ route('banks.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {
                        $('#bankNumber').val('');
                        $('#bank_type_id').val('');

                        swal({
                            title: "Success!",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        bankinfotbl.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            //edit city

            $(document).on('click', '#editBankBtn', function() {
                let bankId = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: 'banks/' + bankId + '/edit',

                    success: function(data) {
                        $('#EditBank').find('#bank_name').val(data.bank_name);
                        $('#EditBank').find('#account_number').val(data.account_number);
                        $('#EditBank').find('#branch').val(data.branch);
                        $('#EditBank').find('#idhidden').val(data.id);
                        $('#EditBank').attr('data-id', data.id);
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            //update city
            $('#EditBank').submit(function(e) {
                e.preventDefault();
                let bankId = $('#idhidden').val();

                $.ajax({
                    type: 'POST',
                    url: 'bank/' + bankId,
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {
                        $('#EditBank').find('#bank_name').val('');
                        $('#EditBank').find('#account_number').val('');
                        $('#EditBank').find('#branch').val('');
                        $('#EditBank').find('#idhidden').val('');


                        swal({
                            title: "Bank update successfully !",
                            icon: "success",
                            showCancelButton: true,
                            focusConfirm: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                        });
                        bankinfotbl.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            // //deleteuser

            // $(document).on('click', '#deleteBankBtn', function() {
            //     let bankId = $(this).data('id');
            //     swal({
            //             title: "Are you sure?",
            //             text: "Once deleted, you will not be able to recover this !",
            //             icon: "warning",
            //             buttons: true,
            //             dangerMode: true,
            //         })
            //         .then((willDelete) => {
            //             if (willDelete) {
            //                 $.ajax({
            //                     type: 'DELETE',
            //                     url: 'banks/' + bankId,

            //                     success: function(data) {
            //                         swal("Poof! Your bank has been deleted!", {
            //                             icon: "success",
            //                         });
            //                         bankinfotbl.ajax.reload();
            //                     },
            //                     error: function(error) {
            //                         console.log('error');
            //                     }

            //                 });


            //             } else {
            //                 swal("Your data is safe!");
            //             }
            //         });

            // });

            //status update

            $(document).on('click', '#statusBtnBank', function() {
                let bankId = $(this).data('id');
                let bankStatus = $(this).data('status');

                $.ajax({
                    type: 'PUT',
                    url: 'bank/status',
                    data: {
                        bank_id: bankId,
                        status: bankStatus,
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
                        bankinfotbl.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });






        });
    </script>
@endsection

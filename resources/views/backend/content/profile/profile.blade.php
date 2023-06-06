@extends('backend.master')

@section('maincontent')
@section('title')
    Ayebazar- Profile
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
                    <h6 class="mb-0">Shop Profile</h6>
                </div>
            </div>
        </div>




        <div class="col-12">
            <div class="modal-body bg-secondary rounded">

                <form name="form" action="{{ url('admin/update/profile') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name"
                                        value="{{ Auth::guard('admin')->user()->name }}" placeholder="Owner Name"
                                        disabled>
                                    <label for="floatingInput">Owner Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email"
                                        value="{{ Auth::guard('admin')->user()->email }}" placeholder="Email" disabled>
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone"
                                        value="{{ Auth::guard('admin')->user()->phone }}" placeholder="Phone" disabled>
                                    <label for="floatingInput">Phone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <button class="btn btn-info btn-block w-100" style="font-size:26px"
                                        disabled>Shop</button>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="shop_name" id="shop_name"
                                        placeholder="Title" value="{{ Auth::guard('admin')->user()->shop_name }}"
                                        required>
                                    <label for="floatingInput">Shop Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Shop Address" name="shop_address" id="shop_address" style="height: 80px;">{{ Auth::guard('admin')->user()->shop_address }}</textarea>
                                    <label for="floatingTextarea">Shop Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->shop_contact }}" name="shop_contact"
                                        id="shop_contact" placeholder="Shop Contact" required>
                                    <label for="floatingInput">Shop Contact</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->shop_licence_number }}"
                                        name="shop_licence_number" id="shop_licence_number"
                                        placeholder="Shop Licence Number" required>
                                    <label for="floatingInput">Shop Licence Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->delivery_charge }}"
                                        name="delivery_charge" id="delivery_charge" placeholder="Delivery Charge"
                                        required>
                                    <label for="floatingInput">Delivery Charge</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="file" name="shop_icon" id="shop_icon" class="form-control">
                                    <label for="floatingInput">Shop Icon</label>
                                </div>
                                @if (isset(Auth::guard('admin')->user()->shop_icon))
                                    <img src="{{ asset(Auth::guard('admin')->user()->shop_icon) }}" alt=""
                                        style="height: 100px;margin-bottom: 12px;">
                                @else
                                    <img src="{{ asset('public/webview/assets/images/cart.jpg') }}" alt=""
                                        style="height: 100px;margin-bottom: 12px;">
                                @endif


                                <div class="form-floating mb-3">
                                    <input type="file" name="trade_licence" id="trade_licence" class="form-control">
                                    <label for="floatingInput">Trade Licence</label>
                                </div>
                                @if (isset(Auth::guard('admin')->user()->trade_licence))
                                    <img src="{{ asset(Auth::guard('admin')->user()->trade_licence) }}" alt=""
                                        style="height: 100px;margin-bottom: 12px;">
                                @else
                                    <img src="{{ asset('public/webview/assets/images/cart.jpg') }}" alt=""
                                        style="height: 100px;margin-bottom: 12px;">
                                @endif

                                <div class="form-floating mb-3">
                                    <input type="file" name="national_id" id="national_id" class="form-control">
                                    <label for="floatingInput">National ID:</label>
                                </div>
                                @if (isset(Auth::guard('admin')->user()->national_id))
                                    <img src="{{ asset(Auth::guard('admin')->user()->national_id) }}" alt=""
                                        style="height: 100px;margin-bottom: 12px;">
                                @else
                                    <img src="{{ asset('public/webview/assets/images/cart.jpg') }}" alt=""
                                        style="height: 100px;margin-bottom: 12px;">
                                @endif

                            </div>

                        </div>
                    </div>


                    <div class="form-group mt-2" style="text-align: right">
                        <div class="submitBtnSCourse">
                            <button type="submit" name="btn"
                                class="btn btn-primary AddCourierBtn btn-block">Update
                                Profile</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
</div>

<script>
    $(document).ready(function() {


    });
</script>

@endsection

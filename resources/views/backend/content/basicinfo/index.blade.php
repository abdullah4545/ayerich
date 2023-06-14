@extends('backend.master')

@section('maincontent')
@section('title')
    Ayebazar- Basicinfo
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="row">

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Website Basic Information Update</h2>
                <form action="{{ route('admin.basicinfos.update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" value="{{ $webinfo->email }}"
                                    id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_one"
                                    value="{{ $webinfo->phone_one }}" id="floatingPassword" placeholder="Phone One">
                                <label for="floatingPassword">Phone One</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_two"
                                    value="{{ $webinfo->phone_two }}" id="floatingPassword" placeholder="Phone Two">
                                <label for="floatingPassword">Phone Two</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Office Address" name="address" id="floatingTextarea" style="height: 100px;">{{ $webinfo->address }}</textarea>
                                <label for="floatingTextarea">Office Address</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="usd_rate"
                                    value="{{ $webinfo->usd_rate }}" id="floatingPassword" placeholder="Phone Two">
                                <label for="floatingPassword">1 USD TO BDT</label>
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-lg bg-dark" name="logo" id="formFileLg"
                                    type="file">
                            </div>
                            <div class="m-3 ms-0" style="text-align: center;height: 85px;margin-top:50px !important">
                                <h4 style="width:30%;float: left;text-align: left;">LOGO : </h4>
                                <img src="{{ asset($webinfo->logo) }}" alt="" srcset=""
                                    style="max-height: 100px;">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Refer & Generation Information Update</h2>
                <form action="{{ url('admin/referal-generation/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="point_rate"
                                    value="{{ $webinfo->point_rate }}" id="floatingInput"
                                    placeholder="AyeRich Point Rate">
                                <label for="floatingInput">AyeRich Point Rate In(TK)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="min_withdrew"
                                    value="{{ $webinfo->min_withdrew }}" id="floatingInput" placeholder="Min Withdrew">
                                <label for="floatingInput">Min Withdrew</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="charge_convert"
                                    value="{{ $webinfo->charge_convert }}" id="floatingInput"
                                    placeholder="Convert Charge">
                                <label for="floatingInput">Convert Charge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="charge_withdrew"
                                    value="{{ $webinfo->charge_withdrew }}" id="floatingInput"
                                    placeholder="Withdrew Charge">
                                <label for="floatingInput">Withdrew Charge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="convert_bonus"
                                    value="{{ $webinfo->convert_bonus }}" id="floatingInput"
                                    placeholder="Withdrew Charge">
                                <label for="floatingInput">Convert Bonus</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="cashback"
                                    value="{{ $webinfo->cashback }}" id="floatingInput" placeholder="Cash Back">
                                <label for="floatingInput">Cash Back</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="futurefund"
                                    value="{{ $webinfo->futurefund }}" id="floatingInput"
                                    placeholder="Future Found">
                                <label for="floatingInput">Future Found</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="netprofit"
                                    value="{{ $webinfo->netprofit }}" id="floatingInput" placeholder="Net Profit">
                                <label for="floatingInput">Net Profit</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="globalsales"
                                    value="{{ $webinfo->globalsales }}" id="floatingInput"
                                    placeholder="Globalsales Bonus">
                                <label for="floatingInput">Globalsales Bonus</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="leadership"
                                    value="{{ $webinfo->leadership }}" id="floatingInput" placeholder="Leader Ship">
                                <label for="floatingInput">Leader Ship</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="royalty"
                                    value="{{ $webinfo->royalty }}" id="floatingInput" placeholder="Royalty Bonus">
                                <label for="floatingInput">Royalty Bonus</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="office_per"
                                    value="{{ $webinfo->office_per }}" id="floatingInput"
                                    placeholder="Office Percent">
                                <label for="floatingInput">Office Percent</label>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="referal_percent"
                                    value="{{ $webinfo->referal_percent }}" id="floatingInput"
                                    placeholder="Referal Bonus">
                                <label for="floatingInput">Referal Bonus %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="first_gen"
                                    value="{{ $webinfo->first_gen }}" id="floatingInput" placeholder="First Gen">
                                <label for="floatingInput">First Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="secound_gen"
                                    value="{{ $webinfo->secound_gen }}" id="floatingInput" placeholder="Second Gen">
                                <label for="floatingInput">Second Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="third_gen"
                                    value="{{ $webinfo->third_gen }}" id="floatingInput" placeholder="Third Gen">
                                <label for="floatingInput">Third Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="four_gen"
                                    value="{{ $webinfo->four_gen }}" id="floatingInput" placeholder="Four Gen">
                                <label for="floatingInput">Four Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="fifth_gen"
                                    value="{{ $webinfo->fifth_gen }}" id="floatingInput" placeholder="Fifth Gen">
                                <label for="floatingInput">Fifth Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="six_gen"
                                    value="{{ $webinfo->six_gen }}" id="floatingInput" placeholder="Six Gen">
                                <label for="floatingInput">Six Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="seven_gen"
                                    value="{{ $webinfo->seven_gen }}" id="floatingInput" placeholder="Seven Gen">
                                <label for="floatingInput">Seven Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="eight_gen"
                                    value="{{ $webinfo->eight_gen }}" id="floatingInput" placeholder="Eight Gen">
                                <label for="floatingInput">Eight Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nine_gen"
                                    value="{{ $webinfo->nine_gen }}" id="floatingInput" placeholder="Nine Gen">
                                <label for="floatingInput">Nine Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="ten_gen"
                                    value="{{ $webinfo->ten_gen }}" id="floatingInput" placeholder="Ten Gen">
                                <label for="floatingInput">Ten Gen %</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="fixed_deposit_interest"
                                    value="{{ $webinfo->fixed_deposit_interest }}" id="floatingInput"
                                    placeholder="Ten Gen">
                                <label for="floatingInput">Fixed Deposit Interest %</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Shipping Information Update</h2>
                <form action="{{ route('admin.shipping.update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="inside_dhaka_charge"
                                    value="{{ $webinfo->inside_dhaka_charge }}" id="inside_dhaka_charge"
                                    placeholder="Inside Dhaka Charge">
                                <label for="floatingInput">Inside Dhaka Charge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="outside_dhaka_charge"
                                    value="{{ $webinfo->outside_dhaka_charge }}" id="outside_dhaka_charge"
                                    placeholder="Outside Dhaka Charge">
                                <label for="floatingPassword">Outside Dhaka Charge</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="insie_dhaka"
                                    value="{{ $webinfo->insie_dhaka }}" id="insie_dhaka"
                                    placeholder="Inside Dhaka Delivery Time">
                                <label for="floatingPassword">Inside Dhaka Delivery Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="outside_dhaka"
                                    value="{{ $webinfo->outside_dhaka }}" id="outside_dhaka"
                                    placeholder="Outside Dhaka Delivery Time">
                                <label for="floatingPassword">Outside Dhaka Delivery Time</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="contact"
                                    value="{{ $webinfo->contact }}" id="contact" placeholder="Contact Info">
                                <label for="floatingInput">Contact Info</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="refund_rule"
                                    value="{{ $webinfo->refund_rule }}" id="refund_rule" placeholder="Refund Rules">
                                <label for="floatingPassword">Refund Rules</label>
                            </div>
                            <div class=" mb-4">
                                <select name="cash_on_delivery" id="cash_on_delivery" required
                                    class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    @if ($webinfo->cash_on_delivery == 'ON')
                                        <option value="ON" selected>ON</option>
                                        <option value="OFF">OFF</option>
                                    @else
                                        <option value="ON">ON</option>
                                        <option value="OFF" selected>OFF</option>
                                    @endif

                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>


        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">TMS</h2>
                <form action="{{ url('admin/tms/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control ckeditor" name="tms" id="tms" style="height: 150px;">{{ $webinfo->tms }}</textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Affiliate</h2>
                <form action="{{ url('admin/affiliate/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control ckeditor" name="affiliate" id="affiliate" style="height: 150px;">{{ $webinfo->affiliate }}</textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4" style="text-align: center;color:red">Team Work </h2>
                <form action="{{ url('admin/team-work/update', $webinfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control ckeditor" name="team_work" id="team_work" style="height: 150px;">{{ $webinfo->team_work }}</textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    initSample();
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

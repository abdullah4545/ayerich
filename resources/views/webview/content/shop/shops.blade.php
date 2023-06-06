@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Shops
@endsection

<!-- /.breadcrumb -->
<div class="body-content outer-top-xs outer-bottom-xs">
    <div class='container'>
        <div class='row'>
            @forelse ($shops as $shop)
                <div class="col-xs-6 col-md-3">
                    <div id="shopbox">
                        <a href="{{ url('shop/' . $shop->id . '/product') }}" class="text-center">
                            <div class="image">
                                <img src="{{ asset('public/images/shop.png') }}" alt="" style="width: 65%;">
                            </div>
                            <div class="name">
                                <p>{{ $shop->name }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- /.container -->
</div>



<style>
    #shopbox {
        border: 1px solid #d1d1d1;
        padding: 25px;
        margin-bottom: 10px;
    }

    #shopbox:hover {
        box-shadow: 1px 1px 10px 1px #d1d1d1;
        border-radius: 4px;
        padding: 25px;
    }
</style>
@endsection

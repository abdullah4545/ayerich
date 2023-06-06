@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-{{ $title }}
@endsection

<div class="body-content outer-top-xs">
    {!! $value->value !!}
</div>
@endsection

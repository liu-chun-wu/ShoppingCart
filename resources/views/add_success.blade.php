@extends('main')
@section('content')
    <div>
        {{-- <p align="center"><img src="{{ asset('img/fig1.jpg') }}"></p> --}}
        <p align="center">您所選取的產品及數量已成功放入購物車！</p>
        <p align="center"><a href="{{ route('page.show', 'show_product') }}">繼續購物</a></p>
        @php
        @endphp
    </div>
@endsection

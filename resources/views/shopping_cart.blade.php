@extends('main')
@php
    use App\Models\Products;
@endphp
@section('content')
    <div>
        <table border="0" align="center" width="800">
            <tr bgcolor="#ACACFF" height="30" align="center">
                <td>書號</td>
                <td>書名</td>
                <td>定價</td>
                <td>數量</td>
                <td>小計</td>
                <td>變更數量</td>
            </tr>
            {{-- {{ dd(json_decode(request()->cookie('cart'))) }} --}}
            @if (empty(json_decode(request()->cookie('cart'))))
                <tr align='center'>
                    <td colspan='6'>目前購物車內沒有任何產品及數量！</td>
                </tr>
            @else
                @foreach (json_decode(request()->cookie('cart')) as $id => $quantiity)
                    @php
                        $data = Products::find($id);
                    @endphp
                    <tr bgcolor="#ACACFF" height="30" align="center">
                        <input type="hidden" name="id"value="{{ $id }}">
                        <td>{{ $data['book_no'] }}</td>
                        <td>{{ $data['book_name'] }}</td>
                        <td>${{ $data['price'] }}</td>
                        <td><input type="text" name="quantity"value="{{ $quantiity }}"></td>
                        <td>${{ $data['price'] * $quantiity }}</td>
                        <td><input type="submit" value="變更數量"></td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection

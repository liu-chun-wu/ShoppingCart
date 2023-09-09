@extends('main')
@php
    use App\Models\Products;
    $total = 0;
@endphp
@section('content')
    <div>
        <table border="1" bgcolor="white" rules="cols" align="center" cellpadding="5">
            <tr height="25">
                <td colspan="4" align="center" bgcolor="#CCCC00">訂單細目</td>
            </tr>
            <tr height="25" align="center" bgcolor="FFFF99">
                <td>書名</td>
                <td>定價</td>
                <td>數量</td>
                <td>小計</td>
            </tr>
            @if (empty(json_decode(request()->cookie('cart'))))
                <tr align='center'>
                    <td colspan='6'>目前還沒有把任何產品加入購物車！</td>
                </tr>
            @else
                @foreach (json_decode(request()->cookie('cart')) as $id => $quantity)
                    @php
                        $data = Products::find($id);
                        if ($quantity == '0') {
                            continue;
                        }
                        $total += $data['price'] * $quantity;
                    @endphp
                    <tr bgcolor="#ACACFF" height="30" align="center">
                        @csrf
                        <td>{{ $data['book_name'] }}</td>
                        <td>${{ $data['price'] }}</td>
                        <td>{{ $quantity }}</td>
                        <td>${{ $data['price'] * $quantity }}</td>
                    </tr>
                @endforeach
            @endif
            <tr align='right' bgcolor='#CCCC00'>
                <td colspan='4'>總金額 = {{ $total }}</td>
            </tr>
        </table>
    </div>
@endsection

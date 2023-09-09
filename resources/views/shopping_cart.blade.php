@extends('main')
@php
    use App\Models\Products;
    $total = 0;
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
                <td>刪除商品</td>
            </tr>
            @if (empty(json_decode(request()->cookie('cart'))))
                <tr align='center'>
                    <td colspan='6'>目前購物車內沒有任何產品及數量！</td>
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
                        <form action="{{ route('edit_cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="id"value="{{ $id }}">
                            <input type="hidden" name="page"value="edit_success">
                            <td>{{ $data['book_no'] }}</td>
                            <td>{{ $data['book_name'] }}</td>
                            <td>${{ $data['price'] }}</td>
                            <td><input type="text" name="quantity" value="{{ $quantity }}"></td>
                            <td>${{ $data['price'] * $quantity }}</td>
                            <td><input type="submit" value="變更數量"></td>
                        </form>
                        <form action="{{ route('edit_cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="page"value="edit_success">
                            <input type="hidden" name="quantity" value="0">
                            <td><input type="submit" value="移除商品"></td>
                        </form>
                    </tr>
                @endforeach
                <tr align='center' bgcolor='#ACACFF'>
                    <td colspan='7'>總金額 = {{ $total }}</td>
                </tr>
            @endif
        </table>
    </div>
@endsection

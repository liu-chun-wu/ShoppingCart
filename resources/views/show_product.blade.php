@extends('main')
@php
    use App\Models\Products;
    $data = Products::all();
@endphp
@section('content')
    <div>
        <table border="0" align="center" width="800" cellspacing="2">
            <tr bgcolor="#ACACFF" height="30" align="center">
                <td>書號</td>
                <td>書名</td>
                <td>定價</td>
                <td>輸入數量</td>
                <td>進行訂購</td>
            </tr>
            @foreach ($data as $key => $value)
                <tr bgcolor="#ACACFF"align='center'>
                    <td>
                        @php
                            echo $value['book_no'];
                        @endphp
                    </td>
                    <td>
                        @php
                            echo $value['book_name'];
                        @endphp
                    </td>
                    <td align="center">
                        @php
                            echo $value['price'];
                        @endphp
                    </td>
                    <form action="{{ route('add_success') }}" method="post">
                        @csrf
                        <input type="hidden" name="id"value="{{ $value['id'] }}">
                        <td align="center"><input type="text" name="quantity"value="1"></td>
                        <td align="center"><input type="submit" value="加入購物車"></td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

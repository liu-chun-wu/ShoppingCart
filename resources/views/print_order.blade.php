@extends('main')
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
            <?php
            // 取得購物車資料
            // $book_name_array = explode(',', $_COOKIE['book_name_list']);
            // $price_array = explode(',', $_COOKIE['price_list']);
            // $quantity_array = explode(',', $_COOKIE['quantity_list']);
            
            // 顯示購物車內容
            $total = 0;
            // for ($i = 0; $i < count($book_name_array); $i++) {
            //     // 計算小計
            //     $sub_total = $price_array[$i] * $quantity_array[$i];
            
            //     // 計算總計
            //     $total += $sub_total;
            
            //     // 顯示各欄位資料
            //     // echo '<tr>';
            //     // echo "<td align='center'>" . $book_name_array[$i] . '</td>';
            //     // echo "<td align='center'>$" . $price_array[$i] . '</td>';
            //     // echo "<td align='center'>" . $quantity_array[$i] . '</td>';
            //     // echo "<td align='center'>$" . $sub_total . '</td>';
            //     // echo '</tr>';
            // }
            // echo "<tr align='right' bgcolor='#CCCC00'>";
            // echo "<td colspan='4'>總金額 = " . $total . '</td>';
            // echo '</tr>';
            ?>
        </table>
    </div>
@endsection

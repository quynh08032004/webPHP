<?php
    // Mảng ban đầu
    $array = [5, 2, 9, 1, 7, 3];

    // Tìm giá trị lớn nhất
    $max_value = max($array);

    // Tìm giá trị nhỏ nhất
    $min_value = min($array);

    // Tính tổng các phần tử trong mảng
    $sum = array_sum($array);

    // Sắp xếp mảng tăng dần
    sort($array);

    // Kiểm tra xem một phần tử có thuộc mảng hay không
    $search_value = 7;
    $is_in_array = in_array($search_value, $array) ? "$search_value có trong mảng" : "$search_value không có trong mảng";
?>

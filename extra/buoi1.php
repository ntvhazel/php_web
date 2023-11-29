<?php
function HocLuc($dToan, $dLy, $dHoa)
{
    $dTB = ($dToan + $dLy + $dHoa) / 3;
    if ($dTB >= 8) {
        echo "Bạn đạt loại giỏi";
    } elseif ($dTB >= 6 && $dTB < 8) {
        echo "Bạn đạt loại khá";
    } elseif ($dTB >= 3 && $dTB < 6) {
        echo "Bạn đoạt loại trung bình";
    } else {
        echo "Bạn đạt loại yếu";
    }
    return $dTB;
}
function divBy2($number)
{
    return $number / 2;
}


function BangCuuChuong()
{
    for ($i = 1; $i <= 9; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 9; $j++) {

            echo "<td>";
            echo $i . "x" . $j . "=" . $i * $j;
            echo "</td>";
        };
        echo "</tr>";
    }
}

BangCuuChuong();
?>

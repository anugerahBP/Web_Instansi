<?php
function divisionWithoutOperator($numerator, $denominator) {
    // Inisialisasi hasil bagi
    $result = 0;

    // Lakukan pengurangan berulang-ulang hingga numerator lebih kecil dari denominator
    while ($numerator >= $denominator) {
        $numerator -= $denominator;
        $result++;
    }

    return $result;
}

// Contoh penggunaan
$hasil1 = divisionWithoutOperator(7, 2);
$hasil2 = divisionWithoutOperator(8, 4);

echo "7 : 2 menghasilkan output : $hasil1" . PHP_EOL; // Output: 3
echo "atau" . PHP_EOL; // Baris pemutus
echo "8 : 4 menghasilkan output : $hasil2" . PHP_EOL; // Output: 2
?>
<?php

$aplikasi[1] = 'gtAkademik';
$aplikasi[2] = 'gtFinansi';
$aplikasi[3] = 'gtPerizinan';
$aplikasi[4] = 'eCampuz';
$aplikasi[5] = 'eOviz';

// Inisialisasi variabel indeks
$index = 1;

// Selama indeks kurang dari atau sama dengan jumlah elemen dalam array
while ($index <= count($aplikasi)) {
    // Mendapatkan nilai aplikasi berdasarkan indeks
    $value = $aplikasi[$index];
    
    // Menampilkan data ke browser
    echo "Aplikasi ke-$index: $value<br>";
    
    // Meningkatkan indeks
    $index++;
}

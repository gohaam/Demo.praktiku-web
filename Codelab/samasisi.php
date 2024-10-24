<?php
function segitigaSamaSisi($n) {
    for ($i = 1; $i <= $n; $i++) {
        // Spasi di bagian kiri
        echo str_repeat(' ', $n - $i);
        // Mencetak bintang
        echo str_repeat('*', 2 * $i - 1);
        // Ganti baris untuk terminal
        echo PHP_EOL;
    }
}

// Memanggil fungsi untuk segitiga sama sisi
segitigaSamaSisi(5);
?>

<?php
function segitigaSamaSisiTerbalik($n) {
    for ($i = $n; $i >= 1; $i--) {
        // Spasi di bagian kiri
        echo str_repeat(' ', $n - $i);
        // Mencetak bintang
        echo str_repeat('*', 2 * $i - 1);
        // Ganti baris untuk terminal
        echo PHP_EOL;
    }
}

// Memanggil fungsi untuk segitiga sama sisi terbalik
segitigaSamaSisiTerbalik(5);
?>

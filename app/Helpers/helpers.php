<?php
            if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil;
    }
}
            ?>
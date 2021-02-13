<?php
namespace App\Services;

class MatrixService
{
    public function diagonal_main($data) {
        $n = sizeof($data);
        $summa = 0;
        for ($i = 0; $i < $n; $i++) {
            $summa += $data[$i][$i];
        }
        return $summa;
    }

    public function diagonal_second($data) {
        $n = sizeof($data);
        $summa = 0;
        for ($i = 0, $j = $n - 1; $i < $n; $i++, $j--) {
            $summa += $data[$i][$j];
        }
        return $summa;
    }
}

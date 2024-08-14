<?php

namespace App\libraries;

class FungsiSimpeg
{
    public static function statusKeluarga($kode)
    {
        if ($kode == 'IST') {
            $hasil = 'ISTRI';
        } else if ($kode == 'AK') {
            $hasil = 'ANAK ';
        } else if ($kode == 'SU') {
            $hasil = 'SUAMI';
        } else {
            $hasil = 'unknown code';
        }
        return $hasil;
    }
}

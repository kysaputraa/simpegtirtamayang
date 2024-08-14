<?php

namespace App\libraries;

use DateTime;

class Multifungsi
{
    public static function age($dob)
    {
        //calculate years of age (input string: YYYY-MM-DD)
        $date = date('Y-m-d', strtotime($dob));
        list($year, $month, $day) = explode("-", $date);

        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;

        // if we are any month before the birthdate: year - 1 
        // OR if we are in the month of birth but on a day 
        // before the actual birth day: year - 1
        if (($month_diff < 0) || ($month_diff === 0 && $day_diff < 0))
            $year_diff--;

        return $year_diff . "-" . $month_diff . $day_diff;
    }

    public static function umur($date)
    {
        $tgllahir = date('d.m.y', strtotime($date));
        $bday = new DateTime($tgllahir); // Creating a DateTime object representing your date of birth.
        $today = new DateTime(date('d.m.y')); // Creating a DateTime object representing today's date.
        $diff = $today->diff($bday); // Calculating the difference between your date of birth and today's date.
        return $diff->y . '  Tahun, ' . $diff->m . ' Bulan, ' . $diff->d . ' hari'; // Displaying your age in years, months, and days.
    }

    public static function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    function terbilang($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = "" . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->terbilang($nilai - 10) . " belas ";
        } else if ($nilai < 100) {
            $temp = $this->terbilang($nilai / 10) . " puluh " . $this->terbilang($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus " . $this->terbilang($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->terbilang($nilai / 100) . " ratus " . $this->terbilang($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->terbilang($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->terbilang($nilai / 1000) . " ribu " . $this->terbilang($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->terbilang($nilai / 1000000) . " juta " . $this->terbilang($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->terbilang($nilai / 1000000000) . " milyar " . $this->terbilang(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->terbilang($nilai / 1000000000000) . " trilyun " . $this->terbilang(fmod($nilai, 1000000000000));
        }
        return $temp;
    }
    public static function bulan_indo($bulan)
    {
        if ($bulan == 01) {
            return 'Januari';
        } else if ($bulan == '02') {
            return 'Februari';
        } else if ($bulan == '03') {
            return 'Maret';
        } else if ($bulan == '04') {
            return 'April';
        } else if ($bulan == '05') {
            return 'Mei';
        } else if ($bulan == '06') {
            return 'Juni';
        } else if ($bulan == '07') {
            return 'Juli';
        } else if ($bulan == '08') {
            return 'Agustus';
        } else if ($bulan == '09') {
            return 'September';
        } else if ($bulan == '10') {
            return 'Oktober';
        } else if ($bulan == '11') {
            return 'November';
        } else if ($bulan == '12') {
            return 'Desember';
        }
    }

    public static function tampilbulanindo($date)
    {
        $hasil = date('d', strtotime($date)) . " " . self::bulan_indo(date('m', strtotime($date))) . " " . date('Y', strtotime($date));
        return $hasil;
    }

    function trim_jabatan($jabatan)
    {
        $result = str_ireplace('pertama', '', $jabatan);
        $result = str_ireplace('muda', '', $result);
        $result = str_ireplace('madya', '', $result);
        $result = str_ireplace('utama', '', $result);
        $result = str_ireplace('pemula', '', $result);
        $result = str_ireplace('terampil', '', $result);
        $result = str_ireplace('mahir', '', $result);
        $result = str_ireplace('penyelia', '', $result);
        $result = str_ireplace('pelaksana lanjutan', '', $result);
        $result = preg_replace('/\bpelaksana\b/i', '', $result);
        return $result;
    }

    function terbilangkoma($x)
    {
        if ($x < 0) {
            $hasil = "minus " . trim(konversi(x));
        } else {
            $poin = trim(tkoma($x));
            $hasil = trim(konversi($x));
        }
        if ($poin) {
            $hasil = $hasil . " koma " . $poin;
        } else {
            $hasil = $hasil;
        }
        return $hasil;
    }

    function konversi($x)
    {
        $x = abs($x);
        $angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";

        if ($x < 12) {
            $temp = " " . $angka[$x];
        } else if ($x < 20) {
            $temp = konversi($x - 10) . " belas";
        } else if ($x < 100) {
            $temp = konversi($x / 10) . " puluh" . konversi($x % 10);
        } else if ($x < 200) {
            $temp = "seratus" . konversi($x - 100);
        } else if ($x < 1000) {
            $temp = konversi($x / 100) . " ratus" . konversi($x % 100);
        } else if ($x < 2000) {
            $temp = "seribu" . konversi($x - 1000);
        } else if ($x < 1000000) {
            $temp = konversi($x / 1000) . " ribu" . konversi($x % 1000);
        } else if ($x < 1000000000) {
            $temp = konversi($x / 1000000) . " juta" . konversi($x % 1000000);
        } else if ($x < 1000000000000) {
            $temp = konversi($x / 1000000000) . " milyar" . konversi($x % 1000000000);
        }

        return $temp;
    }

    function tkoma($x)
    {
        $str = stristr($x, ".");
        $ex = explode('.', $x);
        if (isset($ex[1])) {
            if (($ex[1] / 10) <= 1) {
                $a = abs($ex[1]);
            }
            $string = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";

            $a2 = $ex[1] / 10;
            $pjg = strlen($str);
            $i = 1;

            while ($i < $pjg) {
                $char = substr($str, $i, 1);
                $i++;
                $temp .= " " . $string[$char];
            }

            return $temp;
        } else {
            return FALSE;
        }
    }

    function fancy_implode($arr)
    {
        array_push($arr, implode(' dan ', array_splice($arr, -2)));
        return implode(', ', $arr);
    }

    public static function hari($hari)
    {

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;
    }
}

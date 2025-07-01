<?php

namespace App\Services;

class PersianDate
{
    public static function toJalali($gy, $gm, $gd): string
    {
        $g_d_m = [0,31,59,90,120,151,181,212,243,273,304,334];
        $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
        $days = 355666 + (365 * $gy) + intval(($gy2 + 3) / 4) - intval(($gy2 + 99) / 100) + intval(($gy2 + 399) / 400) + $gd + $g_d_m[$gm - 1];

        $jy = -1595 + (33 * intval($days / 12053)); $days %= 12053;
        $jy += 4 * intval($days / 1461); $days %= 1461;
        if ($days > 365) { $jy += intval(($days - 1) / 365); $days = ($days - 1) % 365; }

        if ($days < 186) {
            $jm = 1 + intval($days / 31);
            $jd = 1 + ($days % 31);
        } else {
            $jm = 7 + intval(($days - 186) / 30);
            $jd = 1 + (($days - 186) % 30);
        }

        return sprintf('%04d/%02d/%02d', $jy, $jm, $jd);
    }

    public static function convert($timestamp): string
    {
        $date = date('Y-m-d', strtotime($timestamp));
        [$gy, $gm, $gd] = explode('-', $date);

        return self::toJalali((int)$gy, (int)$gm, (int)$gd);
    }
}

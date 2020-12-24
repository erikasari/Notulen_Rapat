<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        $BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agust", "Sept", "Okt", "Nov", "Des");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }
}

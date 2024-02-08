<?php
$tanggal = date_default_timezone_set('Asia/Jakarta').date('Y-m-d');
function tanggal_indo($tanggal)
{			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ];
	return $tgl_indo;
}
echo tanggal_indo ($tanggal); // Hasil: Minggu, 20 Maret 2016
echo date(' Y');
?>
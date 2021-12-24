<?php
    require APPPATH.'libraries/xlsxwriter.class.php';
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);

    $filename = "Laporan Penerimaan SPP Siswa SMKN 2 Kuningan.xlsx";
    header('Content-disposition: attachment; filename= "'.XLSXWriter::sanitize_filename($filename).'"');
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');


    $header = array(
        'No'=>'string',//text
        'Nama Siswa'=>'string',//text
        'L/P'=>'string',//text
        'Kelas'=>'string',//text
        'Tahun Yang Dibayar'=>'string',//text
        'Bulan Yang Dibayar'=>'string',//text
        'Tarif SPP'=>'string',//text
        'Jumlah Bayar'=>'string',//text
        'Tanggal Bayar'=>'string',//text
        'Nama Petugas'=>'string',//text
    );
    
    
    $writer = new XLSXWriter();
    $writer->setAuthor('@LENOVO-Abdilah');
    $writer->writeSheetHeader('Sheet1', $header);

    // $r1 = $a['Laporan Pembayaran SPP SMKN 2 Kuningan'];
    // $writer->writeSheetRow('Sheet1', $s1);

    $i=1;
    foreach ($data_pembayaran as $a) {
        $s1 = $i;
        $s2 = $a['nama_siswa'];
        $s3 = $a['jk'];
        $s4 = $a['nama_kelas'];
        $s5 = $a['tahun_bayar'];
        $s6 = $a['bulan_bayar'];
        $s7 = $a['nominal'];
        $s8 = $a['jumlah_bayar'];
        $s9 = $a['tgl_bayar'];
        $s10 = $a['nama_petugas'];

        $i++;

        $writer->writeSheetRow('Sheet1', array($s1, $s2, $s3, $s4, $s5,$s6, $s7, $s8, $s9, $s10) );
    }

    $writer->writeToStdOut();
    exit(0);
<?php
	  use App\Models\SiswaModel;
    use App\Models\PembayaranModel;
    use App\Models\SppModel;

    // untuk mengecek apakah 
    // kelas sudah digunakan di tabel siswa
    function kelasInSiswa($idKelas){
        $siswa=New SiswaModel;
        $jml=$siswa->where('id_kelas',$idKelas)->findAll();
        return count($jml);
    } 

    // untuk mengecek apakah 
    // petugas sudah menginput pembayaran
    function petugasInPembayaran($idPetugas){
        $dataBayar=New PembayaranModel;
        $jml=$dataBayar->where('id_petugas',$idPetugas)->findAll();
        return count($jml);
    } 
        
     // untuk mengecek apakah 
    // siswa sudah melakukan pembayaran
    function siswaInBayar($nis){
        $dataBayar=New PembayaranModel;
        $jml=$dataBayar->where('nis',$nis)->findAll();
        return count($jml);
    }

     //untuk mengecek apakah tarif SPP
     // sudah digunakan
     function sppInSiswa($idTarif){
      $dataSiswa=New SiswaModel;
      $jml=$dataSiswa->where('id_spp',$idTarif)->findAll();
      return count($jml);
    }


	function nama_bulan($aray_ke)
	{
		$list_bulan = array(
							'01' => 'Januari',
							'02' => 'Februari',
							'03' => 'Maret',
							'04' => 'April',
							'05' => 'Mei',
							'06' => 'Juni',
							'07' => 'Juli',
							'08' => 'Agustus',
							'09' => 'September',
							'10' => 'Oktober',
							'11' => 'November',
							'12' => 'Desember'
						);

		return "$list_bulan[$aray_ke]";
	}

?>
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PembayaranModel;
use App\Models\PetugasModel;
use App\Models\SiswaModel;
use App\Models\SppModel;

class Pembayaran extends BaseController
{
	public function index()
	{
		// $data['nama_bulan'] = nama_bulan();
		$data['data_petugas'] = $this->petugas->findAll();
		// data spp
		$data['data_spp'] = $this->spp->findAll();

		$data['pembayaran_hari_ini'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
		$data['pembayaran_hari_ini'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['pembayaran_hari_ini'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$data['pembayaran_hari_ini'] = $this->pembayaran->where('day(tgl_bayar)',date('d'));
		$data['pembayaran_hari_ini'] = $this->pembayaran->findAll();

		// join table siswa
		$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$data['data_siswa'] = $this->siswa->findAll();

		$data['title'] = 'Pembayaran SPP';
		$data['sub_title'] = 'Pembayaran SPP';
		return view('pembayaran/tampil',$data);
	}


	public function detailData($id_siswa)
	{
		// join table siswa
		$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$data['data_siswa'] = $this->siswa->where('id_siswa',$id_siswa);
		$data['data_siswa'] = $this->siswa->findAll();

		echo(json_encode($data));
	}

	public function bayar()
	{
		$tgl_bayar = date('Y-m-d');
		// $tgl = $this->request->getPost('tanggal');
		// $bulan_bayar = substr($tgl, 5,2);
		// $tahun_bayar = substr($tgl, 0,4);

		$data = [
					'id_petugas'   => $this->request->getPost('id_petugas'),
					'nis'          => $this->request->getPost('nis'),
					'tgl_bayar'    => $tgl_bayar,
					'bulan_bayar'  => $this->request->getPost('bulan_bayar'),
					'tahun_bayar'  => $this->request->getPost('tahun_bayar'),
					// 'id_spp'       => $this->request->getPost('id_spp'),
					'jumlah_bayar' => $this->request->getPost('jumlah_bayar'),
				];
		// var_dump($data);
				
		$this->pembayaran->insert($data);

		$session_pesan = 	[
								'status' => 'Spp berhasil dibayar',
								'status-icon' => 'success',
							];
		session()->set($session_pesan);
		return redirect()->to('/pembayaran/spp');
		// var_dump($_POST);
	}


	public function hapus($id='')
	{
		$this->pembayaran->where('id_pembayarn',$id)->delete();
		// aray pesan
		$session_pesan = [
							'status' => 'Data pembayaran berhasil dihapus',
							'status-icon' => 'success',
						];
		// push ke session
		session()->set($session_pesan);
		// session()->setFlashdata('status','Data berhasil dihapus');
		return redirect()->to('/pembayaran/spp');
	}
}
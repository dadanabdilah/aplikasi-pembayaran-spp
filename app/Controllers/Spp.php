<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PetugasModel;
use App\Models\SiswaModel;
use App\Models\SppModel;


class Spp extends BaseController
{
	public function index()
	{
		$data['data_spp'] = $this->spp->findAll();

		$data['title'] = 'Data SPP';
		$data['sub_title'] = 'Data SPP';
		return view('spp/tampil',$data);
	}

	public function detail($id)
	{
		$data_spp = $this->spp->where('id_spp',$id)->findAll();

		foreach ($data_spp as $d){
			$data = [
						'id_spp'  => $d['id_spp'],
						'tahun'	  => $d['tahun'],
						'nominal' => $d['nominal'],
					];
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function tambah()
	{
		$data = [
					'tahun'	  => $this->request->getPost('tahun'),
					'nominal' => $this->request->getPost('nominal')
				];
		$this->spp->insert($data);


		// aray pesan
		$session_pesan = [
							'status' => 'Data spp berhasil ditambahkan',
							'status-icon' => 'success',
						];
		// push ke session
		session()->set($session_pesan);

		return redirect()->to('/spp');
	}

	public function ubah()
	{
		helper(['form']);

		$data = [
					'id_spp'  => $this->request->getPost('id_spp'),
				    'tahun'	  => $this->request->getPost('tahun'),
					'nominal' => $this->request->getPost('nominal')
				];
		$this->spp->save($data);

		// aray pesan
		$session_pesan = [
							'status' => 'Data spp berhasil diubah',
							'status-icon' => 'success',
						];
		// push ke session
		session()->set($session_pesan);

		// session()->setFlashdata('status','Data berhasil diubah');
		return redirect()->to('/spp');
	}

	public function hapus($id)
	{
		if (sppInSiswa($id)==0) {
			$this->spp->where('id_spp',$id)->delete();

			// aray pesan
			$session_pesan = [
								'status' => 'Data spp berhasil dihapus',
								'status-icon' => 'success',
							];
		// push ke session
			session()->set($session_pesan);
			// session()->setFlashdata('status','Data berhasil dihapus');
			return redirect()->to('/spp');
		} else {
			$session_pesan = [
								'status' => 'Gagal dihapus',
								'status-text' => 'Karena telah digunakan pada tabel siswa.',
								'status-icon' => 'warning',
							];
			session()->set($session_pesan);
			// session()->setFlashdata('status','Data gagal dihapus');
			return redirect()->to('/spp');
		}
		
	}
}

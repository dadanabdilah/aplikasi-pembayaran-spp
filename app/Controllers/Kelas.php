<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

//use App\Filters\Authentication;

class Kelas extends BaseController
{
	public function __construct()
	{
		// $data['sub_title'] = 'Data Kelas';
	}
	public function index()
	{
		$data['data_kelas'] = $this->kelas->findAll();

		//echo \Config\Services::request()->uri->getSegment(1);

		$data['title'] = 'Data Kelas';
		$data['sub_title'] = 'Data Kelas';
		return view('kelas/tampil',$data);
	}

	public function detail($id)
	{
		$data_kls = $this->kelas->where('id_kelas',$id)->findAll();

		foreach ($data_kls as $d){
			$data = array(
					'id_kelas'	          => $d['id_kelas'],
					'nama_kelas'          => $d['nama_kelas'],
					'kompetensi_keahlian' => $d['kompetensi_keahlian'],
				);
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function tambah()
	{
		$data = [
					'nama_kelas'          => $this->request->getPost('nama_kelas'),
					'kompetensi_keahlian' => $this->request->getPost('kompetensi_keahlian'),
				];
		$this->kelas->insert($data);

		// aray pesan
		$session_pesan = [
							'status' => 'Data kelas berhasil ditambahkan',
							'status-icon' => 'success',
						];
		// push ke session
		session()->set($session_pesan);
		// session()->setFlashdata('status','Data berhasil ditambahkan');
		return redirect()->to('/kelas');
	}

	public function ubah()
	{
		helper(['form']);
		$data = [
				    'id_kelas'	          => $this->request->getPost('id_kelas'),
					'nama_kelas'          => $this->request->getPost('nama_kelas'),
					'kompetensi_keahlian' => $this->request->getPost('kompetensi_keahlian'),
				];
		$this->kelas->save($data);


		// aray pesan
		$session_pesan = [
							'status' => 'Data kelas berhasil diubah',
							'status-icon' => 'success',
						];
		// push ke session
		session()->set($session_pesan);

		// session()->setFlashdata('status','Data berhasil diubah');
		return redirect()->to('/kelas');
	}

	public function hapus($id)
	{
		if (kelasInSiswa($id) == 0) {
			$this->kelas->where('id_kelas',$id)->delete();

			// aray pesan
			$session_pesan = [
								'status' => 'Data kelas berhasil dihapus',
								'status-icon' => 'success',
							];
			// push ke session
			session()->set($session_pesan);

			return redirect()->to('/kelas');
		} else {
			// aray pesan
			$session_pesan = [
								'status' => 'Gagal dihapus',
								'status-text' => 'Karena telah digunakan pada tabel siswa',
								'status-icon' => 'warning',
							];
			// push ke session
			session()->set($session_pesan);
			return redirect()->to('/kelas');
		}
	}
}

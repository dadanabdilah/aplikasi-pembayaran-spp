<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
	public function tampil()
	{

		$data['data_petugas'] = $this->petugas->findAll();

		$data['title'] = 'Data Petugas';
		$data['sub_title'] = 'Data Petugas';
		return view('petugas/tampil',$data);
	}

	public function detail($id)
	{
		$data_petugas = $this->petugas->where('id_petugas',$id)->findAll();

		foreach ($data_petugas as $d){
			$data = array(
					'id_petugas'	=> $d['id_petugas'],
					'nama_petugas'	=> $d['nama_petugas'],
					'email'		=> $d['email'],
					// 'password'		=> $d['password'],
					// 'level'			=> $d['level']
				);
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function tambah()
	{
		$data = [
					'nama_petugas' => $this->request->getPost('nama_lengkap'),
					'email'     => $this->request->getPost('email'),
					// 'password'     => md5($this->request->getPost('password')),
					// 'level'        => $this->request->getPost('level')
				];
		$this->petugas->insert($data);

		$session_pesan = 	[
								'status' => 'Data petugas berhasil ditambahkan',
								'status-icon' => 'success',
							];
		session()->set($session_pesan);

		return redirect()->to('/petugas/tampil');
	}

	public function ubah()
	{
		helper(['form']);

		$data = [
		    'id_petugas'   => $this->request->getPost('id_petugas'),
		    'nama_petugas' => $this->request->getPost('nama_lengkap'),
			'email'     => $this->request->getPost('email'),
			// 'password'     => md5($this->request->getPost('password')),
			// 'level'        => $this->request->getPost('level')
		];
		// $this->petugas->where('id_petugas', $id);
		// $this->petugas->update($data);

		$this->petugas->save($data);

		$session_pesan = 	[
								'status' => 'Data petugas berhasil diubah',
								'status-icon' => 'success',
							];
		session()->set($session_pesan);
		return redirect()->to('/petugas/tampil');
	}

	public function hapus($id)
	{

		if (petugasInPembayaran($id)==0) {
			$this->petugas->where('id_petugas',$id)->delete();
			$session_pesan = [
								'status' => 'Data petugas berhasil dihapus',
								'status-icon' => 'success',
							];
			session()->set($session_pesan);
			return redirect()->to('/petugas/tampil');
		} else {
			$session_pesan = [
								'status' => 'Gagal dihapus',
								'status-text' => 'Karena telah menginput pembayaran.',
								'status-icon' => 'warning',
							];
			session()->set($session_pesan);
			return redirect()->to('/petugas/tampil');
		}
	}

// 	public function ubahPassword()
// 	{
// 		$data = [
// 					'title'      => 'Ubah Password',
// 					'sub_title'  => 'Ubah Password',
// 				];
// 		return view('petugas/ubah-password',$data);
// 	}

// 	public function simpanPassword()
// 	{
// 		$data = [
// 		    'id_petugas' => $this->request->getPost('id_petugas'),
// 		    'password'   => md5($this->request->getPost('password_baru')),
// 		];
// 		$this->petugas->save($data);
// 		return redirect()->to('/logout');
// 	}

// 	public function resetPassword($id){
// 		$data = [
// 		    'id_petugas' => $id,
// 		    'password'   => md5('123'),
// 		];
// 		$this->petugas->save($data);
// 		return redirect()->to('/petugas/tampil');
// 	}
}

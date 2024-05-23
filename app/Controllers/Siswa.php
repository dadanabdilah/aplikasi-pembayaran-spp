<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
	public function index()
	{
		// setting cuurrent page
		$current_page =  $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1 ;
		$data['current_page'] = $current_page;

		// seting data perhalaman
		$jml_per_page = 5;
		$data['jml_per_page'] = $jml_per_page;

		$keyword = $this->request->getPost('keyword');


		// title
		$data['title'] = 'Data Siswa';
		$data['sub_title'] = 'Data Siswa';
		// data spp
		$data['tarif_spp'] = $this->spp->findAll();
		// data kelas
		$data['data_kelas'] = $this->kelas->findAll();


		if ($keyword) {
			$data['data_siswa'] = $this->siswa->search($keyword);
			$data['data_siswa'] = $this->siswa->paginate($jml_per_page,'siswa');
			$data['pager'] = $this->siswa->pager;

			session()->set('key',$keyword);
			return view('siswa/tampil',$data);

		}else {
			if (session()->get('key')) {
				$key = session()->get('key');
				$data['data_siswa'] = $this->siswa->search($key);
				$data['data_siswa'] = $this->siswa->paginate($jml_per_page,'siswa');
				$data['pager'] = $this->siswa->pager;
				return view('siswa/tampil',$data);
			} else {
				// data siswa
				$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
				$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
				// $data['data_siswa'] = $this->siswa->findAll();
				$data['data_siswa'] = $this->siswa->paginate($jml_per_page,'siswa');
				$data['pager'] = $this->siswa->pager;
				return view('siswa/tampil',$data);
			}
			
		}
	}

	public function destroy()
	{
		session()->remove('key');
		return redirect()->to('/siswa');
	}

	public function detail($id_siswa)
	{
		$data_siswa = $this->siswa->where('id_siswa',$id_siswa)->findAll();

		foreach ($data_siswa as $d){
			$data = [
						'id_siswa'	  => $d['id_siswa'],
						'nisn'	      => $d['nisn'],
						'nis'	      => $d['nis'],
						'nama_siswa'  => $d['nama_siswa'],
						'jk'	      => $d['jk'],
						'alamat'	  => $d['alamat'],
						'no_telp'	  => $d['no_telp'],
						'id_kelas'    => $d['id_kelas'],
						'id_spp'      => $d['id_spp']
					];
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function profil()
	{
		$nis = session()->get('username');
		$data_siswa = $this->siswa->where('nis',$nis);
		$data_siswa = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data_siswa = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$data_siswa = $this->siswa->findAll();

		foreach ($data_siswa as $d){
			$data = [
						'id_siswa'	  => $d['id_siswa'],
						'nisn'	      => $d['nisn'],
						'nis'	      => $d['nis'],
						'nama_siswa'  => $d['nama_siswa'],
						'jk'	      => $d['jk'],
						'alamat'	  => $d['alamat'],
						'no_telp'	  => $d['no_telp'],
						'id_kelas'    => $d['id_kelas'],
						'nama_kelas'  => $d['nama_kelas'],
						'id_spp'      => $d['id_spp'],
						'nominal'     => $d['nominal'],

						'title'      => 'Profil Siswa',
						'sub_title'  => 'Profil Siswa',
					];
		}
		return view('siswa/profil',$data);
	}

	public function tambah()
	{
		$data = [
					'nisn'	      => $this->request->getPost('nisn'),
					'nis'	      => $this->request->getPost('nis'),
					'nama_siswa'  => $this->request->getPost('nama_siswa'),
					'jk'	      => $this->request->getPost('jk'),
					'alamat'	  => $this->request->getPost('alamat'),
					'no_telp'	  => $this->request->getPost('no_telp'),
					'id_kelas'    => $this->request->getPost('id_kelas'),
					'id_spp'      => $this->request->getPost('id_spp')
				];
		$this->siswa->insert($data);

		$this->user->insert([
			'nama_user' => $this->request->getPost('nama_siswa'),
			'username' => $this->request->getPost('nis'),
			'password' => md5($this->request->getPost('nis')),
			'level' => 'siswa'
		]);

		$session_pesan = [
							'status' => 'Data siswa berhasil ditambahkan',
							'status-icon' => 'success',
						];
		// push ke session
		session()->set($session_pesan);

		// session()->setFlashdata('status','Data berhasil ditambahkan');
		return redirect()->to('/siswa');
	}

	public function ubah()
	{
		helper(['form']);
		if (session()->get('level') == 'siswa') {
			$data = [
						'id_siswa'	  => $this->request->getPost('id_siswa'),
					    'nisn'	      => $this->request->getPost('nisn'),
						'nis'	      => $this->request->getPost('nis'),
						'nama_siswa'  => $this->request->getPost('nama_siswa'),
						'jk'	      => $this->request->getPost('jk'),
						'alamat'	  => $this->request->getPost('alamat'),
						'no_telp'	  => $this->request->getPost('no_telp'),
					];

			$this->siswa->save($data);
			
			$this->user->where('username', $this->request->getPost('nis'))->set([
				'nama_user' => $this->request->getPost('nama_siswa'),
				'username' => $this->request->getPost('nis'),
			])->update();

			$session_pesan = [
								'status' => 'Data siswa berhasil diubah',
								'status-icon' => 'success',
							];
			// push ke session
			session()->set($session_pesan);
			return redirect()->to('/siswa/profil');
		}else{
			$data = [
						'id_siswa'	  => $this->request->getPost('id_siswa'),
					    'nisn'	      => $this->request->getPost('nisn'),
						'nis'	      => $this->request->getPost('nis'),
						'nama_siswa'  => $this->request->getPost('nama_siswa'),
						'jk'	      => $this->request->getPost('jk'),
						'alamat'	  => $this->request->getPost('alamat'),
						'no_telp'	  => $this->request->getPost('no_telp'),
						'id_kelas'    => $this->request->getPost('id_kelas'),
						'id_spp'      => $this->request->getPost('id_spp')
					];
			$this->siswa->save($data);

			$this->user->where('username', $this->request->getPost('nis'))->set([
				'nama_user' => $this->request->getPost('nama_siswa'),
				'username' => $this->request->getPost('nis'),
			])->update();

			$session_pesan = [
								'status' => 'Data siswa berhasil diubah',
								'status-icon' => 'success',
							];
			// push ke session
			session()->set($session_pesan);

			return redirect()->to('/siswa');
		}
	}

	public function hapus($nis)
	{
		if (siswaInBayar($nis)==0) {
			$this->siswa->where('nis',$nis);
			$this->siswa->delete();
			// aray pesan
			$session_pesan = [
								'status' => 'Data siswa berhasil dihapus',
								'status-icon' => 'success',
							];
			// push ke session
			session()->set($session_pesan);
			return redirect()->to('/siswa');
		} else {
			// aray pesan
			$session_pesan = [
								'status' => 'Gagal dihapus',
								'status-text' => 'Karena telah digunakan pada tabel pembayaran',
								'status-icon' => 'warning',
							];
			// push ke session
			session()->set($session_pesan);
			return redirect()->to('/siswa');
		}
	}
}

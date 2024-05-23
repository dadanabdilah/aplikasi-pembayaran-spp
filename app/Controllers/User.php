<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
	public function index()
	{

		$data['data_user'] = $this->user->findAll();

		$data['title'] = 'Data User';
		$data['sub_title'] = 'Data User';
		return view('user/tampil',$data);
	}

	public function detail($id)
	{
		$data_user = $this->user->where('id_user',$id)->findAll();

		foreach ($data_user as $d){
			$data = array(
					'id_user'	 => $d['id_user'],
					'nama_user'  => $d['nama_user'],
					'username'	 => $d['username'],
					'password'	 => $d['password'],
					'level'	     => $d['level'],
				);
		}

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function profil()
	{
		$username = session()->get('username');
		$data_user = $this->user->where('username',$username)->findAll();

		foreach ($data_user as $d){
			$data = [
						'id_user'   =>  $d['id_user'],
					    'nama_user' =>  $d['nama_user'],
						'username'	=>  $d['username'],
						'password'	=>  $d['password'],
						'level'	    =>  $d['level'],
					];
		}

		$data = [
					'title'      => 'Profil User',
					'sub_title'  => 'Profil User',
				];
		return view('user/profil',$data);
	}

	public function tambah()
	{
		
		$data = [
				'nama_user'  =>  $this->request->getPost('nama_user'),
				'username'	 =>  $this->request->getPost('username'),
				'password'	 =>  $this->request->getPost('password'),
				'level'	     =>  $this->request->getPost('level'),
			];
			
		if ($this->user->insert($data)){

			$session_pesan = 	[
								'status' => 'Data user berhasil ditambahkan',
								'status-icon' => 'success',
							];
			session()->set($session_pesan);
			return redirect()->to('/user');
	   	}else{
			$session_pesan = 	[
								'status' => 'Data user gagal ditambahkan',
								'status-icon' => 'warning',
							];
			session()->set($session_pesan);
			return redirect()->to('/user');		
	   	}
		
	}


	public function ubah()
	{
		$data = [
					'id_user'   =>  $this->request->getPost('id_user'),
				    'nama_user' =>  $this->request->getPost('nama_user'),
					'username'	=>  $this->request->getPost('username'),
					'password'	=>  $this->request->getPost('password'),
					'level'	    =>  $this->request->getPost('level'),
				];
		$this->user->save($data);

		$session_pesan = [
							'status' => 'Data user berhasil diubah',
							'status-icon' => 'success',
						];
		session()->set($session_pesan);
		return redirect()->to('/user');
	}

	public function hapus($id)
	{
		$this->user->where('id_user',$id)->delete();

		$session_pesan = [
							'status' => 'Data user berhasil dihapus',
							'status-icon' => 'success',
						];
		session()->set($session_pesan);
		return redirect()->to('/user');
	}


	public function ubahPassword()
	{
		$data = [
					'title'      => 'Ubah Password',
					'sub_title'  => 'Ubah Password',
				];
		return view('user/ubah-password',$data);
	}

	public function simpanPassword()
	{
		$data = [
		    'id_user' => $this->request->getPost('id_user'),
		    'password'   => md5($this->request->getPost('password_baru')),
		];
		$this->user->save($data);

		session()->set('status','Password berhasil diubah');
		return redirect()->to('/logout');
	}

	public function resetPassword($id){
		$data = [
		    'id_user' => $id,
		    'password'   => md5('123'),
		];
		$this->user->save($data);

		$session_pesan = [
							'status' => 'Password user berhasil direset',
							'status-icon' => 'success',
						];
		session()->set($session_pesan);
		return redirect()->to('/user');
	}
}

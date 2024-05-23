<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

// use App\Helpers\my_helper;

class Auth extends BaseController
{
	public function index()
	{
		$data['title'] = 'Login';
		return view('/auth/login',$data);
	}

	public function loginSiswa()
	{
		d($_POST);
		helper(['form']);
		$aturan=[
					'iusername'=>'required',
					'ipassword'=>'required'
				];

		if ($this->validate($aturan)) {
			$syarat = [
						'username' => $this->request->getPost('iusername'),
						'password' => md5($this->request->getPost('ipassword'))
					];

			$data_petugas = $this->user->where('username',$this->request->getPost('iusername'))->findAll();

			if (count($data_petugas) == 1) {


				if ($data_petugas[0]['password'] == md5($this->request->getPost('ipassword'))) {
					$session_data = [
						'id_user'    	=> $data_petugas[0]['id_user'],
						'username'		=> $data_petugas[0]['username'],
						'nama_user'		=> $data_petugas[0]['nama_user'],
						'level'   		=> $data_petugas[0]['level'],
						'sudah_login'   => TRUE
					];

					$this->session->set($session_data);
					return redirect()->to('/dashboard');
				} else {
					$flash_data = [
						'status'    	=> 'Password salah',
						'username'		=> $this->request->getPost('iusername'),
					];
					session()->setFlashdata($flash_data);
					return redirect()->to('/login');
				}
			} else {
				session()->setFlashdata('status','Username salah');
				return redirect()->to('/login');
			}
			
		}else{
			return redirect()->to('/');
		}
	}

	public function loginPetugas()
	{
		helper(['form']);
		$aturan=[
					'iusername'=>'required',
					'ipassword'=>'required'
				];

		if ($this->validate($aturan)) {
			$syarat = [
						'username' => $this->request->getPost('iusername'),
						'password' => md5($this->request->getPost('ipassword'))
					];

			$data_petugas = $this->user->where('username',$this->request->getPost('iusername'))->findAll();

			if (count($data_petugas) == 1) {

				if ($data_petugas[0]['password'] == md5($this->request->getPost('ipassword'))) {
					$session_data = [
						'id_user'    	=> $data_petugas[0]['id_user'],
						'username'		=> $data_petugas[0]['username'],
						'nama_user'		=> $data_petugas[0]['nama_user'],
						'level'   		=> $data_petugas[0]['level'],
						'sudah_login'   => TRUE
					];

					$this->session->set($session_data);
					return redirect()->to('/dashboard');
				} else {
					$flash_data = [
						'status'    	=> 'Password salah',
						'username'		=> $this->request->getPost('iusername'),
					];
					session()->setFlashdata($flash_data);

					return redirect()->to('/petugas');
				}
			} else {
				session()->setFlashdata('status','Username salah');
				return redirect()->to('/petugas');
			}
			
		}else{
			$data['title'] = 'Login';
			return view('/auth/login-petugas',$data);
		}
	}


	public function logout()
	{
		if (session()->get('level') == 'siswa') {
			session()->destroy();
			return redirect()->to('/login');
		}else {
			session()->destroy();
			return redirect()->to('/petugas');
		}
	}
}
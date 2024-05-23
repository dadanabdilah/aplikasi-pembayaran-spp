<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'nama_user' => 'Admin',
			'username' => 'admin@gmail.com',
			'password' => md5('admin'),
			'level' => 'admin',
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db = \Config\Database::connect(); // Load the database library
		$this->db->table('user')->insert($data);
	}
}

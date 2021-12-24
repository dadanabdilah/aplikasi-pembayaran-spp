<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

use App\Filters\CekStatusLogin;
use App\Filters\CekAkses;
use App\Filters\CekPassword;
use App\Filters\CekPerubahanPassword;


class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     	 	=> CSRF::class,
		'toolbar'  	 	=> DebugToolbar::class,
		'honeypot' 	 	=> Honeypot::class,
		
		'cek_akses'  	=> CekStatusLogin::class,
		'blok_akses' 	=> CekAkses::class,
		'cek_pass'   	=> CekPassword::class,
		'cek_perubahan' => CekPerubahanPassword::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'cek_akses'
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
						'cek_akses' => [
							'before' => [
								'dashboard/', 'dashboard/*',
								'petugas/tampil', 'petugas/*',
								'kelas/', 'kelas/*',
								'laporan/', 'laporan/*',
								'pembayaran/', 'pembayaran/*',
								'siswa/', 'siswa/*',
								'user/', 'user/*',
								'spp/', 'spp/*'
							]
						],


						'blok_akses' => [
							'before' => [
								'petugas/tampil', 'petugas/tambah', 'petugas/ubah', 'petugas/hapus',
								'kelas/', 'kelas/*',
								'laporan','laporan/penerimaan', 'laporan/download',
								'siswa/', 'siswa/tambah','siswa/hapus',
								'user/', 'user/hapus','user/detail',
								'spp/', 'spp/*'
							]
						],

						'cek_pass' => [
							'before' => [
								'dashboard/', 'dashboard/*',
								'siswa/profil',
								'laporan/histori/pembayaran'
							]
						],

						'cek_perubahan' => [
							'before' => [
								'first/'
							]
						]
					];
}

<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\KelasModel;
use App\Models\SppModel;
use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\PetugasModel;
use App\Models\PembayaranModel;


use App\Helpers\my_helper;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{

	/**
	 * ini adalah controller prioritas 
	 * controller ini akan dijalankan sebelum controller lain
	 * atau bisa disebut ini adalah constructor nya tiap controller
	 *
	 */



	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['my_helper','form'];
	protected $kelas;
	protected $spp;
	protected $user;
	protected $siswa;
	protected $petugas;
	protected $pembayaran;
	protected $uri;

	protected $req;

	// protected $helper;

	protected $session;

	protected $validation;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		$this->session = \Config\Services::session();

		// $session = \Config\Services::session();
		
		// $session = session();

		// $pager = \Config\Services::pager();

		$this->validation =  \Config\Services::validation();

		$this->uri = \Config\Services::request();

		// $this->helper = new my_helper;

		$this->kelas = New KelasModel;
		$this->spp = New SppModel;
		$this->user = New UserModel;
		$this->siswa = New SiswaModel;
		$this->petugas = New PetugasModel;
		$this->pembayaran = New PembayaranModel;
	}
}

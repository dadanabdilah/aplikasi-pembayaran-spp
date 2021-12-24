<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PembayaranModel;


class Laporan extends BaseController
{

	public function index()
	{
		$db = \Config\Database::connect();

		$query = $db->query('SELECT SUM(jumlah_bayar) FROM pembayaran');
		$data['row']   = $query->getRowArray();

		
		$sesi = session()->get('fil_pmbyr');
		// d($sesi);
		if ($sesi=='') {
			$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			$data['data_pembayaran'] = $this->pembayaran->findAll();

			//data siswa
			$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			$data['data_siswa'] = $this->siswa->findAll();

			$data['title'] = 'Laporan';
			$data['sub_title'] = 'Histori Pembayaran';
			return view('laporan/histori-pembayaran',$data);	
			$nis = 'all';
		} else {
			if ($sesi =='all' ) {
				// $query = $db->query('SELECT SUM(jumlah_bayar) FROM pembayaran');
				// $data['row']   = $query->getRowArray();

				$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
				$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
				$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
				$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
				$data['data_pembayaran'] = $this->pembayaran->findAll();

				//data siswa
				$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
				$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
				$data['data_siswa'] = $this->siswa->findAll();

				$data['title'] = 'Laporan';
				$data['sub_title'] = 'Histori Pembayaran';
				return view('laporan/histori-pembayaran',$data);	
				$nis = 'all';
			} else {
				$nis = session()->get('fil_pmbyr');
				$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
				$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
				$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
				$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
				$data['data_pembayaran'] = $this->pembayaran->where('pembayaran.nis',$nis);
				$data['data_pembayaran'] = $this->pembayaran->findAll();

				//data siswa
				$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
				$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
				$data['data_siswa'] = $this->siswa->findAll();

				$data['title'] = 'Laporan';
				$data['sub_title'] = 'Histori Pembayaran';
				return view('laporan/histori-pembayaran',$data);
			}
		}
		
	}

	public function hsitoryByNis()
	{

		$nis = session()->get('username');
		$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$data['data_pembayaran'] = $this->pembayaran->where('pembayaran.nis',$nis);
		$data['data_pembayaran'] = $this->pembayaran->findAll();

		//data siswa
		$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$data['data_siswa'] = $this->siswa->findAll();

		$data['title'] = 'Laporan';
		$data['sub_title'] = 'Histori Pembayaran';
		return view('laporan/histori-pembayaran',$data);
		
	}

	public function set()
	{
		session()->set('fil_pmbyr',$this->request->getVar('nis_nya'));
		return redirect()->to('/laporan/histori-pembayaran');	
	}

	public function destroy()
	{
		session()->remove('fil_pmbyr');
		return redirect()->to('/laporan/histori-pembayaran');	
	}

	public function historyDetail($nis)
	{
		$data = session()->get('fil_pmbyr');
		if ($data =='' ) {
			$nis = 'all';
		} else {
			$nis = session()->get('fil_pmbyr');
		}
		
		if ($nis == 'all') {

			$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			$data['data_pembayaran'] = $this->pembayaran->findAll();

			//data siswa
			$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			$data['data_siswa'] = $this->siswa->findAll();

			$data['title'] = 'Laporan';
			return view('laporan/card-histori',$data);		
		}else {
			// join table
			$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			$data['data_pembayaran'] = $this->pembayaran->where('pembayaran.nis',$nis);
			$data['data_pembayaran'] = $this->pembayaran->findAll();

			//data siswa
			$data['data_siswa'] = $this->siswa->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_siswa'] = $this->siswa->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			$data['data_siswa'] = $this->siswa->findAll();

			$data['title'] = 'Laporan';
			return view('laporan/card-histori',$data);
		}
	}

	public function penerimaan()
	{
		$data = [
	        'users' => $this->pembayaran->paginate(1, 'group1'),
	        'pager' => $this->pembayaran->pager
	    ];

		// joining table
		$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		// select data
		$data['data_pembayaran'] = $this->pembayaran->findAll();

		if (session()->get('level') == 'siswa') {
			
		}else {
			
		}
		$data['title'] = 'Laporan';
		$data['sub_title'] = 'Laporan Penerimaan';
		return view('laporan/laporan-penerimaan',$data);
	}

	public function historiBayar()
	{
		$nisn = session()->get('username');

		$data = [
	        'users' => $this->pembayaran->paginate(1, 'group1'),
	        'pager' => $this->pembayaran->pager
	    ];

		// joining table
		$data['data_pembayaran'] = $this->siswa->where('nisn',$nisn);
		$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
		$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		// select data
		$data['data_pembayaran'] = $this->pembayaran->findAll();

		if (session()->get('level') == 'siswa') {
			$data['title'] = 'Laporan';
			$data['sub_title'] = 'Histori Pembayaran';
		}else {
			$data['title'] = 'Laporan';
			$data['sub_title'] = 'Laporan Penerimaan';
		}
		return view('laporan/histori-pembayaran',$data);
	}

	public function downloadLaporan($type=null)
	{
		// require_once APPPATH.'libraries/vendor/autoload.php';
		

		if ($type=='pdf') {

			// joining table
			$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			// select data
			$data['data_pembayaran'] = $this->pembayaran->findAll();

			$data['title'] = 'Laporan SPP';
	
			// return view('laporan/laporan-pdf',$data);

			$dompdf = new \Dompdf\Dompdf();
	        $dompdf->loadHtml(view('laporan/laporan-pdf',$data));
	        $dompdf->setPaper('A4', 'landscape');
	        $dompdf->render();
	        $dompdf->stream();



		} elseif ($type=='excel') {
			// joining table
			$data['data_pembayaran'] = $this->pembayaran->join('siswa', 'siswa.nis = pembayaran.nis', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
			$data['data_pembayaran'] = $this->pembayaran->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
			// select data
			$data['data_pembayaran'] = $this->pembayaran->findAll();

			// $data['title'] = 'Laporan';
			return view('laporan/laporan-excel',$data);
		} else {
			# code...
		}
	}
}
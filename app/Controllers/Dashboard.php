<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Dashboard extends BaseController
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['sub_title'] = 'Dashboard';
		return view('dashboard/dashboard',$data);
	}
}

// BaseController
<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = 'Home';
		$data['sub_title'] = 'SMK Negeri 2 Kuningan';
		return view('/home/index',$data);
	}
}

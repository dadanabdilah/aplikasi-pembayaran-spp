<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'siswa';
	protected $primaryKey           = 'id_siswa';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nisn','nis','nama_siswa','jk','alamat','no_telp','id_kelas','id_spp'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function search($keyword='')
	{
		$builder = $this->table('siswa');

		$builder->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$builder->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		$builder->like('nis', $keyword);
		$builder->orLike('nisn', $keyword);
		$builder->orLike('nama_siswa', $keyword);
		$builder->orLike('kelas.nama_kelas', $keyword);
		$builder->orLike('jk', $keyword);
		// $data['data_siswa'] = $this->siswa->findAll();
		// $data['data_siswa'] = $builder->paginate($jml_per_page,'siswa');
		// $data['pager'] = $this->siswa->pager;
		
		return $builder;
	}
}

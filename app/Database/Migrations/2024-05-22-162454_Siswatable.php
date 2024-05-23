<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswatable extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
				'constraint'     => 11,
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nis' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_siswa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jk' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'alamat' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'no_telp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'id_kelas' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'id_spp' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_siswa', true);
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_spp', 'spp', 'id_spp', 'CASCADE', 'CASCADE');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelastable extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
				'constraint'     => 11,
            ],
            'nama_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kompetensi_keahlian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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

        $this->forge->addKey('id_kelas', true);
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}

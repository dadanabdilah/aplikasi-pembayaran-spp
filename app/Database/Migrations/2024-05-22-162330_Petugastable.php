<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugastable extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id_petugas' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
				'constraint'     => 11,
            ],
            'nama_petugas' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey('id_petugas', true);
        $this->forge->createTable('petugas');
    }

    public function down()
    {
        $this->forge->dropTable('petugas');
    }
}

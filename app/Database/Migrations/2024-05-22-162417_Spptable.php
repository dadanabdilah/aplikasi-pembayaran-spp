<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Spptable extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id_spp' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
				'constraint'     => 11,
            ],
            'tahun' => [
                'type'       => 'YEAR',
                'null'       => false,
            ],
            'nominal' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
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

        $this->forge->addKey('id_spp', true);
        $this->forge->createTable('spp');
    }

    public function down()
    {
        $this->forge->dropTable('spp');
    }
}

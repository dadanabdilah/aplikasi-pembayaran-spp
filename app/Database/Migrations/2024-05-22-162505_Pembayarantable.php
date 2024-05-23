<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayarantable extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_petugas' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'nis' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tgl_bayar' => [
                'type'       => 'DATE',
            ],
            'bulan_bayar' => [
                'type'       => 'INT',
            ],
            'tahun_bayar' => [
                'type'       => 'YEAR',
            ],
            'jumlah_bayar' => [
                'type'       => 'INT',
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

        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_petugas', 'petugas', 'id_petugas', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }

}

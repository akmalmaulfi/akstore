<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_produk' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned' => true,
            ],
            'id_pembayaran' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => '10',
            ],
            'created_at' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_produk', 'produk', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pembayaran', 'pembayaran', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}

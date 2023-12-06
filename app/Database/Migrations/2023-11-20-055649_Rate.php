<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rate extends Migration
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
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'  => true,
            ],
            'id_customer' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'rate' => [
                'type'  => 'INT',
                'constraint' => 11,
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
        // $this->forge->addForeignKey('id_kategori', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_produk', 'produk', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_customer', 'customer', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rate');
    }

    public function down()
    {
        $this->forge->dropTable('rate');
    }
}

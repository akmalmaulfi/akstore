<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
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
            'produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'size' => [
                'type'       => 'ENUM("S", "M", "L", "XL", "XXL")',
                'null'       => true,
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
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}

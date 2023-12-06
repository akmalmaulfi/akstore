<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ukuran extends Migration
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
            'ukuran' => [
                'type'       => 'ENUM',
                'constraint' => ['S', 'M', 'L', 'XL', 'XXL'],
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
        $this->forge->createTable('ukuran');
    }

    public function down()
    {
        $this->forge->dropTable('ukuran');
    }
}

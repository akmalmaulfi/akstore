<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'telp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATE',
                null => TRUE
            ],
            'updated_at' => [
                'type' => 'DATE',
                null => TRUE
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}

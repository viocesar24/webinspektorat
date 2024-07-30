<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLayanan extends Migration
{
    public function up()
    {
        // Tabel Layanan
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => false,
            ],
            'badan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('layanan', true, ['ENGINE' => 'InnoDB']); // true = IF NOT EXISTS
    }

    public function down()
    {
        $this->forge->dropTable('layanan', true);
    }
}

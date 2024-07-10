<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPenghargaan extends Migration
{
    public function up()
    {
        // Migrasi tabel penghargaan, buat tabel baru
        // kolom id (primary key) auto increment
        // kolom gambar (varchar)
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penghargaan');
    }

    public function down()
    {
        // Drop tabel penghargaan
        $this->forge->dropTable('penghargaan');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBannerBeranda extends Migration
{
    public function up()
    {
        // Tabel Banner Beranda
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
                'null'       => true,
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
            ],
            'gambar' => ['type' => 'TEXT', 'null' => false],
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
        $this->forge->createTable('banner_beranda', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('banner_beranda', true);
    }
}

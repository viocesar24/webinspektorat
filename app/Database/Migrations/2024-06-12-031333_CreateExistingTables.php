<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExistingTables extends Migration
{
    public function up()
    {
        // Tabel Berita
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
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
            ],
            'badan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'waktu' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'gambar_1' => ['type' => 'TEXT', 'null' => true],
            'gambar_2' => ['type' => 'TEXT', 'null' => true],
            'gambar_3' => ['type' => 'TEXT', 'null' => true],
            'gambar_4' => ['type' => 'TEXT', 'null' => true],
            'gambar_5' => ['type' => 'TEXT', 'null' => true],
            'gambar_6' => ['type' => 'TEXT', 'null' => true],
            'gambar_7' => ['type' => 'TEXT', 'null' => true],
            'gambar_8' => ['type' => 'TEXT', 'null' => true],
            'gambar_9' => ['type' => 'TEXT', 'null' => true],
            'gambar_10' => ['type' => 'TEXT', 'null' => true],
            'gambar_11' => ['type' => 'TEXT', 'null' => true],
            'gambar_12' => ['type' => 'TEXT', 'null' => true],
            'gambar_13' => ['type' => 'TEXT', 'null' => true],
            'gambar_14' => ['type' => 'TEXT', 'null' => true],
            'gambar_15' => ['type' => 'TEXT', 'null' => true],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
                'default' => 0,
            ],
        ]);
        $this->forge->addKey('id', true); // Primary key
        $this->forge->addKey('slug');
        $this->forge->createTable('berita', true, ['ENGINE' => 'InnoDB']); // true = IF NOT EXISTS

        // Tabel Kegiatan (Struktur sama dengan tabel Berita)
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
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
            ],
            'badan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'waktu' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'gambar_1' => ['type' => 'TEXT', 'null' => true],
            'gambar_2' => ['type' => 'TEXT', 'null' => true],
            'gambar_3' => ['type' => 'TEXT', 'null' => true],
            'gambar_4' => ['type' => 'TEXT', 'null' => true],
            'gambar_5' => ['type' => 'TEXT', 'null' => true],
            'gambar_6' => ['type' => 'TEXT', 'null' => true],
            'gambar_7' => ['type' => 'TEXT', 'null' => true],
            'gambar_8' => ['type' => 'TEXT', 'null' => true],
            'gambar_9' => ['type' => 'TEXT', 'null' => true],
            'gambar_10' => ['type' => 'TEXT', 'null' => true],
            'gambar_11' => ['type' => 'TEXT', 'null' => true],
            'gambar_12' => ['type' => 'TEXT', 'null' => true],
            'gambar_13' => ['type' => 'TEXT', 'null' => true],
            'gambar_14' => ['type' => 'TEXT', 'null' => true],
            'gambar_15' => ['type' => 'TEXT', 'null' => true],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
                'default' => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');
        $this->forge->createTable('kegiatan', true, ['ENGINE' => 'InnoDB']);

        // Tabel Pejabat
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
            ],
            'jabatan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('nip', false, 768); // Index dengan panjang 768
        $this->forge->createTable('pejabat', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('pejabat', true);
        $this->forge->dropTable('kegiatan', true);
        $this->forge->dropTable('berita', true);
    }
}

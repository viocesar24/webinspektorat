<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('dokumenkategori', true, ['ENGINE' => 'InnoDB']);

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'foreign_key' => [
                    'table' => 'dokumenkategori',
                    'field' => 'id',
                ],
            ],
            'CONSTRAINT fk_dokumen FOREIGN KEY (kategori) REFERENCES dokumenkategori(id)',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('dokumen', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('dokumenkategori', true);
        $this->forge->dropTable('dokumen', true);
    }
}

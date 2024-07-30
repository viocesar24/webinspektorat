<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKebijakan extends Migration
{
    public function up()
    {
        // Make a new table with name 'kebijakan' in the database 'inspektoratkabkediri'
        // It will be created if it doesn't exist
        // It will do nothing if it already exists
        // The 'kebijakan' table will have 2 columns:
        // - id
        // - kebijakan text
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kebijakan' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kebijakan', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        // Drop the table 'kebijakan' from the database 'inspektoratkabkediri'
        $this->forge->dropTable('kebijakan', true);
    }
}

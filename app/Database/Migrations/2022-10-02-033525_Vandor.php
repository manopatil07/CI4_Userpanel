<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vandor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'vandor_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'vandor_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'create_time' => [
                'type' => 'DATETIME',
                'null' => true, 
            ],
            'update_time' => [
                'type' => 'DATETIME',
                'null' => true,              
            ],
        ]);
        $this->forge->addKey('Id', true);
        $this->forge->createTable('vandor');
    }

    public function down()
    {
        $this->forge->dropTable('vandor');
    }
}

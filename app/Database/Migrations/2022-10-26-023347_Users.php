<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'dob' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'hobb' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_type' => [
                'type'       => 'ENUM("admin","user")',
                'default'=>'user',
                'null' => FALSE,
            ],
            'img' => [
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
        $this->forge->createTable('Users');
    }
  

    public function down()
    {
        $this->forge->dropTable('Users');
    }
}

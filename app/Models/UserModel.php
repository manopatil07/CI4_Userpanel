<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
      protected $table="users";
      protected $allowedFields=['Id','name', 'email', 'phone', 'password',
      'user_type', 'dob', 'address', 'gender', 'img','hobb', 'city', 'create_time', 'update_time'];
      protected $useTimestamps = false;
      protected $dateFormat    = 'datetime';
      protected $createdField  = 'create_time';
      protected $updatedField  = 'update_timet';
   
    public function getuserRow($User_id)
    {
        return  $this->where('Id',$User_id)->first();
    }
}

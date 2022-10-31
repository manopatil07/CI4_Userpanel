<?php

namespace App\Models;
use CodeIgniter\Model;


class Vandormodel extends Model{

    protected $table="vandor";
    protected $allowedFields=['Id','vandor_title','vandor_description','image','create_time', 'update_time'];
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'create_time';
    protected $updatedField  = 'update_timet';
    

    public function getRecord(){
      return $this->findAll();
     
    }

    public function getRow($vandor_Id){
      return  $this->where('Id',$vandor_Id)->first();
    }
}

?>
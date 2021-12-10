<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelModeli extends Model
{
    protected $table      = 'Model';
    protected $primaryKey = 'idModel';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['slika', 'dizajner'];

    public function sviModeli($korisnickoIme){
        return $this->like('dizajner',$korisnickoIme)->findAll();
    }

   public function dohvatiModel($id){
    return $this->find($id);
   }
   public function svi(){
       return $this->findAll();
   }
   
    public function search($array_of_id)
    {
        $req = array();
          foreach ($array_of_id as $k)
            {
              $val = $this->find($k);
              array_push($req,$val);
            }
            return $req;
    }
}
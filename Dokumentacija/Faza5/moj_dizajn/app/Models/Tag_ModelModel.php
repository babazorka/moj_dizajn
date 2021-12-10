<?php namespace App\Models;

use CodeIgniter\Model;

class Tag_ModelModel extends Model
{
        protected $table      = 'model_tag';
        protected $primaryKey = 'idTag';
        protected $returnType = 'object';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['idModel'];
        

 

       

        public function search($keys)
        {
            foreach($keys as $key)
            {  $d=$this->where('idTag',$key)->findAll();
                foreach($d as $dd)
                { $data[]=$dd; }
            }
            
            if (empty($data)) //ako nema uopste podataka u bazi
            { return $data=[]; }
       
         $num = count($data);
         $num_key = count($keys);
         $definitivno = [];
          if($num_key>1) //ako ima pod i vise kljuceva
            { for($x=0; $x<$num; $x=$x+1)
           {
               $br=1;
              for($y=$x+1; $y<$num; $y=$y+1)
              {
                  if ($data[$x]->idModel==$data[$y]->idModel)
                  {
                      $br=$br+1;
                      if ($br===$num_key)
                      { 
                          
                          $definitivno[]=$data[$x];
                      }}} }}
         else 
         { return $data;} //ako ima 1 kljuc ne treba filtriranje, posalji samo pocetni data niz
            
        
          return $definitivno; //vraca redove sa unesenim tagom
        }
        
        
        

        public function mySearch($key)
        {
          
           return $this->like('idModel',$key)->findAll();
        }
        public function dohvTagModel($id) {
           return $this->find($id); 
           
        }
    }
        
//         public function search($key)
//         {
//            return $this->like('idTag',$key)->findAll(); 
//         }



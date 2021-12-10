<?php namespace App\Models;

use CodeIgniter\Model;

class UpitModel extends Model
{
        protected $table      = 'upit';
        protected $primaryKey = 'idUpit';
        protected $returnType = 'object';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['komentar', 'model', 'korisnik','dizajner','canvas', 'vreme', 'primer_modela',  'linkovi'];
        public function postoji($diz,$kor){
                $query=$this->db->query("SELECT COUNT(*) FROM upit WHERE  korisnik='$kor' AND dizajner='$diz'");
                if ($query->getResult() == 0) return false;
                else return true;
   }
        public function brojPoslatihUpita($diz,$kor){
                $query=$this->db->query("SELECT  COUNT(*) FROM upit WHERE dizajner='$diz' AND korisnik='$kor'");
                return $query->getResult(); ;
        }

        public function sviUpiti($diz){
                return $this->like('dizajner',$diz)->findAll();
        }
        public function insertujUpit($data){
                $this->insert($data);
        }
}
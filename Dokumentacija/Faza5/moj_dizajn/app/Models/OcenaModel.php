<?php namespace App\Models;

use CodeIgniter\Model;

class OcenaModel extends Model
{
        protected $table      = 'ocena';
        protected $primaryKey = 'idOcena';
        protected $returnType = 'object';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['korisnik', 'dizajner', 'cena','dizajn','kvalitet'];

        public function prosecnaCena($korisnickoIme){
               $query = $this->db->query("SELECT ROUND(AVG(cena),2) AS cena from ocena where dizajner='$korisnickoIme'");
               return $query->getRow()->cena;
                
        }
        public function prosecnaDizajn($korisnickoIme){
                $query = $this->db->query("SELECT ROUND(AVG(dizajn),2) AS dizajn from ocena where dizajner='$korisnickoIme'");
                return $query->getRow()->dizajn;
        }
        public function prosecnaKvalitet($korisnickoIme){
                $query = $this->db->query("SELECT ROUND(AVG(kvalitet),2) AS kvalitet from ocena where dizajner='$korisnickoIme'");
                return $query->getRow()->kvalitet;
        }
       
        public function ubaci($kor,$diz,$cena,$dizajn,$kvalitet)
        {
                $data=[
                        'korisnik'=> $kor,
                        'dizajner'=>$diz,
                        'cena'=>$cena,
                        'dizajn'=>$dizajn,
                        'kvalitet'=>$kvalitet
                ];
               $this->insert($data);
        }
        public function brojDatihOcena($diz,$kor){
                $query=$this->db->query("SELECT COUNT(*) FROM ocena WHERE dizajner='$diz' AND korisnik='$kor'");
                return $query->getResult() ;
        }


}
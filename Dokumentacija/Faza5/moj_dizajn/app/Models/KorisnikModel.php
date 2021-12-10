<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
        protected $table      = 'korisnik';
        protected $primaryKey = 'korisnicko_ime';
        protected $returnType = 'object';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['email', 'ime_i_prezime', 'status','sifra','stanje','cv', 'slika', 'biografija'];
        
     public function dohvatiKorisnika($korisnickoIme){
        return $this->find($korisnickoIme);
     }
     public function dohvatiDizajnere(){ 
        return $this->like('status','diz')->findAll();
      }
      
      public function dohvatiSveKorisnike(){
         return $this->findAll();
      }
      public function korisnikPrekoMejla($mejl){
         $query=$this->db->query("SELECT * FROM korisnik WHERE email='$mejl'");
         return $query->getRow();
      }

}
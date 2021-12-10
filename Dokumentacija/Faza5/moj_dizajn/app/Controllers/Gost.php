<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\DizajnerModel;
use App\Models\ModelModeli;
use CodeIgniter\Exceptions\AlertError;
use App\Models\Tag_ModelModel;
$validation =  \Config\Services::validation();

class Gost extends BaseController
{

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Gost';
        echo view('template/header');
        echo view("page/$page", $data);
    }

    public function index()
    {
        $modelModeli = new ModelModeli();
        $modeli = $modelModeli->findAll();
        $this->prikaz('home', ['model' => $modeli]); //ovde treba da se napise stranica gde se ispisuju modeli
    }

    public function login($message = null)
    {
        $this->prikaz('login', ['message' => $message]);
    }

    public function registration($message = null)
    {
        $this->prikaz('registration', ['message' => $message]);
    }

    public function design()
    {
        $this->prikaz('login', []);
    }

    public function picture($picture_id)
    {
        $this->prikaz('gost_picture', ['id_slike' => $picture_id]);
    }
    public function profile($korisnik_id)
    {
        $this->prikaz('profileGost', ['korisnickoIme' => $korisnik_id]);
        
    }
   
    
    public function regKorisnikSubmit(){
            $error_message = "";
           
if(isset($_POST['btnsignup'])){
    $korisnicko_ime = trim($_POST['korisnicko_ime']);
   $sifra = trim($_POST['sifra']);
   $email =trim($_POST['email']);
   $imePrezime =trim($_POST['imePrezime']);

   $isValid = true;

   // Check fields are empty or not
   if($korisnicko_ime==''  || $sifra=='' || $email==''  || $imePrezime==''){
     $isValid = false;
     $error_message = "Popunite sva polja.";
    return $this->prikaz('registration', ['error_message'=>$error_message]);
   }

   
   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Nevalidan mail.";
     return $this->prikaz('registration', ['error_message'=>$error_message]);
   }
   
        //ako korisnik vec postoji error
        $KorisnikModel = new KorisnikModel();
       $korisnik = $KorisnikModel->find($this->request->getVar('korisnicko_ime'));
        if ($korisnik != null) {
            $error_message = "Korisnicko ime je zauzeto. Izaberite drugo.";
            return $this->prikaz('registration', ['error_message'=>$error_message]);
        }
        
        if($isValid)
        {$kor = $this->request->getVar('korisnicko_ime');
        $sif = $this->request->getVar('sifra');
        $ime = $this->request->getVar('imePrezime');
        $email = $this->request->getVar('email');
        $db = \Config\Database::connect();
        $data = [
            'korisnicko_ime' => $kor,
            'sifra'  => $sif,
            'ime_i_prezime'  => $ime,
            'email'  => $email,
            'status'  => 'regkor',
            'stanje'  => 0,
            
        ];

        $db->table('korisnik')->insert($data);
        $korisnik=$KorisnikModel->find($kor);
        $this->session->set('korisnik', $korisnik);
        return redirect()->to(site_url('Korisnik'));
        
        }
}

        }
    

    public function regDizajnerSubmit()
    {
        $error_messageD = "";
if(isset($_POST['btnsignupD'])){
    $korisnicko_ime = trim($_POST['korimeD']);
   $sifra = trim($_POST['sifraD']);
   $email =trim($_POST['emailD']);
   $imePrezime =trim($_POST['imePrezimeD']);
   $cvD = trim($_POST['cvD']);
  
   $isValid = true;

   // Check fields are empty or not
   if($korisnicko_ime==''  || $sifra=='' || $email==''  || $imePrezime=='' || $cvD == ''){
     $isValid = false;
     $error_messageD = "Popunite sva polja.";
    return $this->prikaz('registration', ['error_messageD'=>$error_messageD]);
   }

   
   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_messageD = "Nevalidan mail.";
     return $this->prikaz('registration', ['error_messageD'=>$error_messageD]);
   }
   
        //ako korisnik vec postoji error
        $KorisnikModel = new KorisnikModel();
       $korisnik = $KorisnikModel->find($this->request->getVar('korimeD'));
        if ( $korisnik!=null) {
            $error_messageD = "Korisnicko ime je zauzeto. Izaberite drugo.";
            return $this->prikaz('registration', ['error_messageD'=>$error_messageD]);
        }      
        
       
          if($isValid)
          { $kor = $this->request->getVar('korimeD');
        $sif = $this->request->getVar('sifraD');
        $ime = $this->request->getVar('imePrezimeD');
        $email = $this->request->getVar('emailD');
        $cv = $this->request->getVar('cvD');
        $image=file_get_contents('profilna/1.png');
        $db = \Config\Database::connect();
        $data = [
            'korisnicko_ime' => $kor,
            'sifra'  => $sif,
            'ime_i_prezime'  => $ime,
            'email'  => $email,
            'status'  => 'regkor',
            'stanje'  => 0,
            'slika'=>$image,
            'cv'=> $cv,
          ];

        $db->table('korisnik')->insert($data);
        $korisnik=$KorisnikModel->find($kor);
        $this->session->set('korisnik', $korisnik); 

return redirect()->to(site_url('Korisnik'));

          }
       }
    
    }

    public function loginSubmit()
    {

       $error_messageD = "";

if(isset($_POST['btnlogin'])){
    $korisnicko_ime = trim($_POST['korisnicko_ime']);
   $sifra = trim($_POST['sifra']);
  
   $isValid = true;

   // Check fields are empty or not
   if($korisnicko_ime==''  || $sifra==''){
     $isValid = false;
     $error_message = "Popunite sva polja.";
    return $this->prikaz('login', ['error_message'=>$error_message]);
   }
   

        $korisnikModel = new KorisnikModel();
        $korisnik = $korisnikModel->find($this->request->getVar('korisnicko_ime'));

      if($korisnik == null)
      {
          $error_message = "Neispravno korisnicko ime.";
          return $this->prikaz('login', ['error_message'=>$error_message]);
          
      }
      if ($korisnik->stanje == 1)
      {
          $error_message = "Korisnik je blokiran!";
          return $this->prikaz('login', ['error_message'=>$error_message]);
          
      }
      
      if ($korisnik->sifra != $sifra)
      {
          $error_message = "Neispravna sifra.";
          return $this->prikaz('login', ['error_message'=>$error_message]);
      }
     
        if ($korisnik->status == 'diz') {
            $this->session->set('korisnik', $korisnik);
            return redirect()->to(site_url('Dizajner'));
        }

        if ($korisnik->status == 'admin' || $korisnik->status == 'mod') 
        {
            $this->session->set('korisnik', $korisnik);
            return redirect()->to(site_url('Admin'));
        }

        $this->session->set('korisnik', $korisnik); 
        return redirect()->to(site_url('Korisnik'));
    }
}
  
     
}
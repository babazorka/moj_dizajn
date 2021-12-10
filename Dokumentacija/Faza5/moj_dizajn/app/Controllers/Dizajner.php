<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\DizajnerModel;
use App\Models\ModelModeli;
use App\Models\OcenaModel;
use App\Models\TagModel;
use App\Models\UpitModel;
use CodeIgniter\Exceptions\AlertError;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Dizajner extends BaseController
{

  protected function prikaz($page, $data)
  {
    $data['controller'] = 'Dizajner';
    echo view('template/header_dizajner');
    echo view("page/$page", $data);
  }

  public function index()
  {

    $modelModeli = new ModelModeli();
    $modeli = $modelModeli->findAll();
    $this->prikaz('home', ['modeli' => $modeli]); //ovde treba da se napise stranica gde se ispisuju modeli
  }

  public function logout()
  {
    $this->session->destroy();
    return redirect()->to(site_url('/'));
  }

  public function designers_profile()
  {
    $this->prikaz('designers_profile', []);
    // ovde treba poslati ko pristupa
  }

  public function picture($picture_id)
  {
    $this->prikaz('picture', ['id_slike' => $picture_id]);
  }

  public function myModel($picture_id)
  {
    $this->prikaz('user_picture', ['id_slike' => $picture_id]);
  }

  public function profile($korisnik_id)
  {
    $this->prikaz('profile', ['korisnickoIme' => $korisnik_id]);
  }
  public function obrisi($dizajner_id, $model_id)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('model');
    $builder->where('idModel', $model_id);
    $builder->delete();
    $builder = $db->table('model_tag');
    $builder->where('idModel', $model_id);
    $builder->delete();
    $this->prikaz('my_profile', []);
  }
  public function design()
  {
    $this->prikaz('design', []);
  }

  public function upload_model()
  {
    $this->prikaz('upload_model', []);
  }

  public function edit_profile()
  {
    $this->prikaz('edit_profile', []);
  }

  public function upit_view()
  {
    $this->prikaz('upit_view', []);
  }


  public function izmeniProfilnu()
  {

    $files = glob('uploads/*');
    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (isset($_POST["submit"])) {
      $temp = explode(".", $_FILES["fileToUpload"]["name"]);
      $extension = end($temp);
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if ($check !== false) {
        echo "Fajl jeste slika - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "Fajl nije slika.";
        $uploadOk = 0;
      }
    }


    if (file_exists($target_file)) {
      echo "Fajl vec postoji.";
      $uploadOk = 0;
    }


    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Fajl koji ste izabrali je prevelik. Izaberite drugi fajl.";
      $uploadOk = 0;
    }


    if ($imageFileType != "png") {
      echo "Slika mora biti u .PNG formatu.";
      $uploadOk = 0;
    }


    if ($uploadOk == 0) {
      echo "Slika nije postavljena na server.";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . '1.' . $extension)) {

        echo "Slika " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " je uspesno poslata na server.";
        $session = session();
        $db = \Config\Database::connect();
        $builder = $db->table('korisnik');
        $image = file_get_contents('uploads/1.png');
        $data = [
          'slika' => $image,
        ];

        $builder->where('korisnicko_ime', $session->get('korisnik')->korisnicko_ime);
        $builder->update($data);
        $korIme = $session->get('korisnik')->korisnicko_ime;
        $query1 =  $db->query("SELECT * FROM korisnik where korisnicko_ime='$korIme'");
        $red = $query1->getRow();
        $this->session->set('korisnik', $red);
      } else {
        echo "Nastala je greska.";
      }
    }
  }
  public function dodajModel()
  {

    $files = glob('uploads/*');
    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (isset($_POST["submit"])) {
      $temp = explode(".", $_FILES["fileToUpload"]["name"]);
      $extension = end($temp);
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if ($check !== false) {
        echo "Fajl jeste slika - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "Fajl nije slika.";
        $uploadOk = 0;
      }
    }


    if (file_exists($target_file)) {
      echo "Fajl vec postoji.";
      $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 1000000) {
      echo "Fajl koji ste izabrali je prevelik. Izaberite drugi fajl.";
      $uploadOk = 0;
    }


    if ($imageFileType != "png") {
      echo "Slika mora biti u .PNG formatu.";
      $uploadOk = 0;
    }


    if ($uploadOk == 0) {
      echo "Slika nije postavljena na server.";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . '1.' . $extension)) {

        echo "Slika" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " je uspesno poslata na server.";
      } else {
        echo "Nastala je greska.";
      }
    }
  }

  public function uploadNaBazu(){
   
    $session=session();
    $db = \Config\Database::connect();
    $tagModel=new TagModel();
  $tekst  = service('request')->getPost('tekst'); 
 $image=file_get_contents('uploads/1.png');

    $data = [
        'slika' => $image,
       'dizajner'=> $session->get('korisnik')->korisnicko_ime
      ];
      $db->table('model')->insert($data);
      $tagovi = explode(",", $tekst);
      $id=$db->insertID();
     foreach($tagovi as $tag){
        $data = [
            'idModel' => $id,
           'idTag'=>  $tag
          ];
          $tagModel->ubaciTag($tag);
          $db->table('model_tag')->insert($data);
          
      }
      $files = glob('uploads/*');
      foreach ($files as $file) {
        if (is_file($file)) {
          unlink($file);
        }
      }
}
public function uploadDizajna(){
  $request = \Config\Services::request();
  $session=session();
  $upitModel=new UpitModel();
  $korisnikModel=new KorisnikModel();
$komentar  =$request->getVar('komentar');
$linkovi  = $request->getVar('linkovi');
$mejl =$request->getVar('mejl');
if($mejl==null) return;  /*potrebno dodati da mejl nije unet*/
$image=file_get_contents('uploads/1.png');
if($korisnikModel->korisnikPrekoMejla($mejl)==null) return; /*potrebno dodati da mejl ne postoji u sistemu*/
$dizajner=$korisnikModel->korisnikPrekoMejla($mejl)->korisnicko_ime;

  $data = [
      'primer_modela' => $image,
      'dizajner'=>$dizajner,
      'korisnik'=>$session->get('korisnik')->korisnicko_ime,
      'linkovi'=>$linkovi,
      'komentar' =>$komentar,
    ];
   $upitModel->insertujUpit($data);
   $files = glob('uploads/*');
   foreach ($files as $file) {
     if (is_file($file)) {
       unlink($file);
     }
   }
}
    public function oceni($korisnickoIme){
      $request = \Config\Services::request();
      $session=session();
      $cena  = $request->getVar('cena'); 
          if(($cena==null) || ($cena>5) || ($cena<1)) return;//Unesite ocenu od 1 do 5
      $dizajn  =$request->getVar('dizajn');
          if(($dizajn==null) || ($dizajn>5) || ($dizajn<1)) return;//Unesite ocenu od 1 do 5
      $kvalitet  =$request->getVar('kvalitet');
           if(($kvalitet==null) || ($kvalitet>5) || ($kvalitet<1)) return;//Unesite ocenu od 1 do 5
      $ocenaModel=new OcenaModel();
      $ocenaModel->ubaci($session->get('korisnik')->korisnicko_ime,$korisnickoIme,$cena,$dizajn,$kvalitet);
  }

  public function dodajBio()
  {
    $session = session();
    $db = \Config\Database::connect();
    $builder = $db->table('korisnik');
    $tekst  = service('request')->getPost('tekst');
    $data = [
      'korisnicko_ime' => $session->get('korisnik')->korisnicko_ime,
      'biografija' => $tekst,
    ];

    $builder->where('korisnicko_ime', $session->get('korisnik')->korisnicko_ime);
    $builder->update($data);
    $korIme = $session->get('korisnik')->korisnicko_ime;
    $query1 =  $db->query("SELECT * FROM korisnik where korisnicko_ime='$korIme'");
    $red = $query1->getRow();
    $this->session->set('korisnik', $red);
    
  }


  public function my_profile()
  {
    $this->prikaz('my_profile', []);
  }

  // protected function manage()
  // {
  //     $this->prikaz('manage', []);
  // }
}

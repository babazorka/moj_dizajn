<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Tag_ModelModel;
use App\Models\TagModel;
use App\Models\ModelModeli;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form','url'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		$this->session = session();
	}
        
      public function search()
        {
            $tag_model = new Tag_ModelModel();
            
            if(empty($this->request->getVar('search'))) //ako nista nije uneto u pretragu vrati prazan niz
            {
                $this->prikaz('search_result', ['data'=>[]]);
                return;
            }
            
            $niz=explode(" ",$this->request->getVar('search')); //niz tagova
           
            $tag_modeli=$tag_model->search($niz); //ovde se vrate svi tag_model koji odg unetom tagu
           
            if(empty($tag_modeli))
            {
                $this->prikaz('search_result', ['data'=>[]]);
                return;}
            $id_slika = array(); //u ovom nizu su id slika koje se ispisuju
            foreach ($tag_modeli as $k)
            { 
            $s = $k->idModel;
            array_push($id_slika, $s);
            }
       
           $modeli_modeli= new ModelModeli();
           $req = $modeli_modeli->search($id_slika); //niz objekata slika koje treba da se ispisu
           
            $this->prikaz('search_result', ['data'=>$req]);
           
        }
        
        protected function prikaz($page, $data)
        {
            throw \CodeInteger\Exceptions\PageNotFound::forPageNotFound();
        }
        
      
}
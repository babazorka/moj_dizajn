<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
      
public $signup = [
        'korisnicko_ime' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Morate uneti korisnicko ime.'
            ]
        ],
         'sifra' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Morate uneti sifru.'
            ]
        ], 
         'imePrezime' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Morate uneti ime i prezime.'
            ]
        ],
        'email' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Morate uneti email adresu.'
            ]
        ],'broj' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Morate uneti broj telefona.'
            ]
        ]
    ];

 


}

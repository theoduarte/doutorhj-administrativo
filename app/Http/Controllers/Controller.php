<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    /**
     * Consulta Cep através de sistema externo
     *
     * @param string $nrCep
     */
    public function consultaCep($nrCep){
        $output = null;
        
        if ( !empty($nrCep) ) {
            $nrCep = str_replace('-', '', $nrCep);
            
            $token = 'fa31850c7f0a4f2541c14a050d1255c9';
            $url = 'http://www.cepaberto.com/api/v2/ceps.json?cep='.$nrCep;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token token="' . $token . '"'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
        }
        
        return $output;
    }
}

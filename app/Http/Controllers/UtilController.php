<?php

namespace App\Http\Controllers;

class UtilController extends Controller
{
	/**
	 * toStr method
	 *
	 * @param string $input
	 * @return string
	 */
	public static function toStr($input) {
		$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
				'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
				'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
				'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
				'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ª' => '', 'º' => '' );
	
		$titulo = strtolower(strtr($input, $unwanted_array));
	
		return $titulo;
	}
	
	/**
	 * Retira máscara de CPF, CNPJ, Telefone e outros.
	 * @param string $input
	 */
	public static function retiraMascara($input){
// 	   return str_replace(',', '', 
// 	               str_replace('/', '', 
// 	                   str_replace('.', '', 
// 	                       str_replace('-', '', 
// 	                           str_replace('.', '', $input)))));
	    return preg_replace("/[^0-9]/", "", $input);
	}
	
	/**
	 * Trata valor monetário para banco.
	 * Ex.: moedaBanco(1.300,40) retorna 1300.40
	 * 
	 * @param string $input
	 * @return float
	 */
	public static function moedaBanco($input){
	    return str_replace(',', '.',str_replace('.', '', $input));
	}
	
	/**
	 * Formata número para formato de moeda R$.
	 * Ex.: formataMoeda(1300.40) retorna 1.300,40
	 * 
	 * @param float $input
	 * @return string
	 */
	public static function formataMoeda($input){
	    return number_format( $input,  2, ',', '.'); 
	}
	
	/**
	 * Coloca máscara no CPF
	 * Ex.: formataCpf(00812743199); retorna 008.127.431-99
	 * 
	 * @param string $nrCpf
	 */
	public static function formataCpf($nrCpf){
	    $parte_um     = substr($nrCpf, 0, 3);
	    $parte_dois   = substr($nrCpf, 3, 3);
	    $parte_tres   = substr($nrCpf, 6, 3);
	    $parte_quatro = substr($nrCpf, 9, 2);
	    
	    return "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
	}
	
	/**
	 * Coloca máscara no CNPJ
	 * Ex.: formataCnpj(10696691000163); retorna 10.696.691/0001-63
	 *
	 * @param string $nrCpf
	 */
	public static function formataCnpj($nrCnpj){
	    $parte_um     = substr($nrCnpj, 0, 2);
	    $parte_dois   = substr($nrCnpj, 2, 3);
	    $parte_tres   = substr($nrCnpj, 5, 3);
	    $parte_quatro = substr($nrCnpj, 8, 4);
	    $parte_cinto  = substr($nrCnpj, -2);
	    
	    return "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinto";
	}
	
	/**
	 * gera random string
	 * Ex.: WSWQKTQK92JP15IP
	 *
	 * @param integer $len
	 */
	public static function randHash($len=32)
	{
	    return substr(md5(openssl_random_pseudo_bytes(20)),-$len);
	}
}
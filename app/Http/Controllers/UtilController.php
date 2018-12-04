<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class UtilController extends Controller
{
	/**
	 * toStr method
	 *
	 * @param string $input
	 * @return string
	 */
	public static function toStr($input, $boRetiraEspacos=false) {
		$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
				'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
				'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
				'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
				'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ª' => '', 'º' => '' );
		
		if($boRetiraEspacos){
		    $unwanted_array[' '] = '';
		}
	
		$titulo = strtolower(strtr($input, $unwanted_array));
	
		return $titulo;
	}

	public static function removeMaskMoney($get_valor) {
		$source = array('.', ',');
		$replace = array('', '.');
		$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}

	public static function mask($val, $mask)
	{
		if(!empty($val)) {
			$val = (string)$val;
		}
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++) {
			if($mask[$i] == '#') {
				if(isset($val[$k]))
					$maskared .= $val[$k++];
			} else {
				if(isset($mask[$i]))
					$maskared .= $mask[$i];
			}

		}
		return $maskared;
	}

	/**
	 * getBetween method
	 *
	 * @param string $input
	 * @return string
	 */
	public static function getBetween($string, $start = "", $end = ""){
		if (strpos($string, $start)) { // required if $start not exist in $string
			$startCharCount = strpos($string, $start) + strlen($start);
			$firstSubStr = substr($string, $startCharCount, strlen($string));
			$endCharCount = strpos($firstSubStr, $end);
			if ($endCharCount == 0) {
				$endCharCount = strlen($firstSubStr);
			}
			return substr($firstSubStr, 0, $endCharCount);
		} else {
			return '';
		}
	}
	
	/**
	 * Retira máscara de CPF, CNPJ, Telefone e outros.
	 * @param string $input
	 */
	public static function retiraMascara($input){
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
	
    /**
     * Recebe data de um DataRangeTimePicker e
     * retorna referência de Carbon() para utilizar em consultas.
     * 
     * Ex.: getDataRangeTimePickerToCarbon("10/10/2010")
     * 
     * @param string $data
     * @return \App\Http\Controllers\Carbon
     */
	public static function getDataRangeTimePickerToCarbon($data){
	    $data = explode(' - ', $data);
	    $de  = explode('/', $data[0]);
	    $ate = explode('/', $data[1]);
	       
	    return array(
    	           'de'  => new Carbon($de[2].'-'.$de[1].'-'.$de[0].' 00:00:00'), 
	               'ate' => new Carbon($ate[2].'-'.$ate[1].'-'.$ate[0].' 23:59:59')
	           );
	}
	
	/**
	 * getExtensao method
	 * //realiza busca pela extensao de um arquivo para o correto preenchimento de dados no momento do envio para o servidor
	 * @throws NotFoundException
	 * @param string $nome
	 * @return string
	 */
	public function getExtensao($nome){
		$ext = explode('.',$nome);
		$ext = array_reverse($ext);
		$ext = strtolower($ext[0]);
	
		return $ext;
	}
	
	/**
	 * createThumb method
	 * //realiza a criacao de uma miniatura para uma determinada imagem
	 * @throws NotFoundException
	 * @param string $name, string $filename, integer $new_w, integer $new_h
	 * @return void
	 */
	public function createThumb($name, $filename, $new_w, $new_h){
	
		$system = explode('.',$name);
		//dd($name);
	
		if (preg_match('/jpg|jpeg/',strtolower($system[sizeof($system)-1]))){
			$src_img = imagecreatefromjpeg($name);
		}
	
		if (preg_match('/png/',strtolower($system[sizeof($system)-1]))){
			$src_img = imagecreatefrompng($name);
		}
	
		$old_x=imageSX($src_img);
		$old_y=imageSY($src_img);
		if ($old_x > $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$old_y*($new_h/$old_x);
		}
	
		if ($old_x < $old_y) {
			$thumb_w=$old_x*($new_w/$old_y);
			$thumb_h=$new_h;
		}
	
		if ($old_x == $old_y) {
			$thumb_w=$new_w;
			$thumb_h=$new_h;
		}
	
		$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
	
		if (preg_match("/png/",strtolower($system[sizeof($system)-1]))) {
			imagepng($dst_img, $filename);
		} else {
			imagejpeg($dst_img, $filename);
		}
	
		//imagedestroy($dst_img);
		//imagedestroy($src_img);
	}
	
	/**
	 * getImage method
	 * //converte e transfere imagens, produzindo miniatura
	 * @throws NotFoundException
	 * @param User $user_obj, integer $user_id
	 * @return $user_obj
	 */
	public function getImage($image, $user_id) {
	
		if(!file_exists(public_path('files/users/'.$user_id))) {
			mkdir(public_path('files/users/'.$user_id), 0777);
			mkdir(public_path('files/users/'.$user_id).'/thumb', 0777);
		}
			
		//$file_tmp = $image['tmp_name'];
		//$file_ext = $this->getExtensao($image['name']);
		$file_ext = $image->getClientOriginalExtension();
		$imgpath = '';
		//dd(str_replace(' ', '_', $image->getClientOriginalName()));
		if($file_ext != "" && ($file_ext == "png" | $file_ext == "jpg" | $file_ext == "gif" | $file_ext == "jpeg")) {
			$filename = str_replace(' ', '_', $image->getClientOriginalName());
			$destination = public_path('files/users/'.$user_id);
			$destination_thumb = public_path('files/users/'.$user_id).'/thumb/'.$filename;
			//move_uploaded_file($file_tmp, $destination);
			
			$image->move($destination, $filename);
			
			$imgpath = public_path('files/users/'.$user_id).'/'.$filename;
			//dd($filename);
			$path_name = $destination.'/'.$filename;
			$this->createThumb($path_name, $destination_thumb, 64, 64);
		}
	
		return $imgpath;
	}
	
	/**
	 * Recebe data de updated_at
	 * o tempo desde esse momento
	 *
	 * Ex.: timeAgo("Y-m-d H:i:s")
	 *
	 * @param string $data
	 * @return \App\Http\Controllers\Carbon
	 */
	public static function timeAgo($time_ago)
	{
	    $time_ago = strtotime($time_ago);
	    $cur_time   = time();
	    $time_elapsed   = $cur_time - $time_ago;
	    $seconds    = $time_elapsed ;
	    $minutes    = round($time_elapsed / 60 );
	    $hours      = round($time_elapsed / 3600);
	    $days       = round($time_elapsed / 86400 );
	    $weeks      = round($time_elapsed / 604800);
	    $months     = round($time_elapsed / 2600640 );
	    $years      = round($time_elapsed / 31207680 );
	    // Seconds
	    if($seconds <= 60){
	        return "Agora mesmo";
	    }
	    //Minutes
	    else if($minutes <=60){
	        if($minutes==1){
	            return "1 min atrás";
	        }
	        else{
	            return "$minutes min atrás";
	        }
	    }
	    //Hours
	    else if($hours <=24){
	        if($hours==1){
	            return "1 hr atrás";
	        }else{
	            return "$hours hrs atrás";
	        }
	    }
	    //Days
	    else if($days <= 7){
	        if($days==1){
	            return "ontem";
	        }else{
	            return "$days dias atrás";
	        }
	    }
	    //Weeks
	    else if($weeks <= 4.3){
	        if($weeks==1){
	            return "1 sem. atrás";
	        }else{
	            return "$weeks semanas";
	        }
	    }
	    //Months
	    else if($months <=12){
	        if($months==1){
	            return "1 mês atrás";
	        }else{
	            return "$months meses";
	        }
	    }
	    //Years
	    else{
	        if($years==1){
	            return "1 ano atrás";
	        }else{
	            return "$years anos";
	        }
	    }
	}
	
	public static function array_group_by(array $array, $key)
	{
	    if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key) ) {
	        trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
	        return null;
	    }
	    $func = (!is_string($key) && is_callable($key) ? $key : null);
	    $_key = $key;
	    // Load the new array, splitting by the target key
	    $grouped = [];
	    foreach ($array as $value) {
	        $key = null;
	        if (is_callable($func)) {
	            $key = call_user_func($func, $value);
	        } elseif (is_object($value) && isset($value->{$_key})) {
	            $key = $value->{$_key};
	        } elseif (isset($value[$_key])) {
	            $key = $value[$_key];
	        }
	        if ($key === null) {
	            continue;
	        }
	        $grouped[$key][] = $value;
	    }
	    // Recursively build a nested grouping if more parameters are supplied
	    // Each grouped array value is grouped according to the next sequential key
	    if (func_num_args() > 2) {
	        $args = func_get_args();
	        foreach ($grouped as $key => $value) {
	            $params = array_merge([ $value ], array_slice($args, 2, func_num_args()));
	            $grouped[$key] = call_user_func_array('array_group_by', $params);
	        }
	    }
	    return $grouped;
	}
	
	/**
	 * csvToArray method
	 *
	 * //--realiza a leitura de um arquivo csv e separa o mesmo num array de acordo com suas colunas
	 * 
	 * @param string $filename eh o caminho que arquivo.
	 * @param string $delimiter eh o caractere separador
	 */
	public static function csvToArray($filename = '', $delimiter = ',')
	{
		if (!file_exists($filename) || !is_readable($filename))
			return false;
	
			$header = null;
			$data = array();
			if (($handle = fopen($filename, 'r')) !== false)
			{
				while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
				{
					if (!$header)
						$header = $row;
						else
							$data[] = array_combine($header, $row);
				}
				fclose($handle);
			}
	
			return $data;
	}
	
	/**
	 * sendSms method
	 *
	 * @param string $number Destinatários que receberam a mensagem. DDD+Número, separados por vírgula caso possua mais de um.
	 * @param string $remetente Nome do Remetente até 32 caracteres. Utilizado somente na organização dos relatórios
	 * @param string $message Conteúdo da mensagem que será enviada. Tamanho máximo de 2048 caracteres.
	 */
	public static function sendSms($number, $remetente, $message)
	{
	    $comtele_api_key = env('COMTELE_API_KEY');
	    $url = "https://sms.comtele.com.br/Api/$comtele_api_key/SendMessage";
	    
	    $data = [
	        'content' => $message,
	        'sender' => $remetente,
	        'receivers' => $number
	    ];
	    
	    $fields = http_build_query($data);
	    $post = curl_init();
	    
	    $url = $url.'?'.$fields;
	    
	    curl_setopt($post, CURLOPT_URL, $url);
	    curl_setopt($post, CURLOPT_POST, 1);
	    curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
	    
	    $result['status'] = curl_exec($post);
	    
	    curl_close($post);
	    
	    if($result['status'] == false) {
	        $result['error'] = 'Curl error: ' . curl_error($post);
	    }
	    
	    return $result;
	}
	
	/**
	 * sendMail method
	 *
	 * @param string $number Destinatários que receberam a mensagem. DDD+Número, separados por vírgula caso possua mais de um.
	 * @param string $remetente Nome do Remetente até 32 caracteres. Utilizado somente na organização dos relatórios
	 * @param string $message Conteúdo da mensagem que será enviada. Tamanho máximo de 2048 caracteres.
	 */
	public static function sendMail($to, $from, $subject, $html_message)
	{
	    $token = env('SENDGRID_API_KEY');
	    $url = 'https://api.sendgrid.com/v3/mail/send';

		if(env('APP_ENV') != 'production') {
			$to = env('APP_EMAIL_DEV') ?? 'vitor.pagani.92@gmail.com';
		}

	    $payload = '{"personalizations": [{"to": [{"email": "'.$to.'"}]}],"from": {"email": "'.$from.'"},"subject": "'.$subject.'","content": [{"type": "text/html", "value": "'.$html_message.'"}]}';
	    //$payload = '{"personalizations": [{"to": [{"email": "teocomp@gmail.com"}]}],"from": {"email": "contato@doutorhoje.com.br"},"subject": "Hello, World!","content": [{"type": "text/html", "value": "<h1>teste3 DoutorHoje</h1>"}]}';
	    
	   dd($payload);
	    
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token, 'Content-Type:application/json'));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $output = curl_exec($ch);

	    if ($output == "") {
	        //return true;
	    }
	print_r($output);
	    die;
	   // return $output;

	}
}
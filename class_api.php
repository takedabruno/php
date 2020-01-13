<?php
/* 
 * Version 1.1 -> Implementação de objeto de response da API com informações sobre a requisição
 * 
 * Dependencias
 * class_VO_api_response.php
 * class_log.php
 * 
 */


include_once 'autoload.php';

class api{	
    private $log;
    
// MODELO DE HEADER    
//     $headers = [
//         'Origin: https://developer.riotgames.com',
//         'Accept-Charset: application/x-www-form-urlencoded; charset=UTF-8',
//         'X-Riot-Token: '. $token,
//         'Accept-Language: pt-BR,pt;q=0.9,ja-JP;q=0.8,ja;q=0.7,en-US;q=0.6,en;q=0.5',
//         'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36'
//     ];

    function __construct(){
        $this->log = new log();
    }
    
    protected function apiRequest($url, $headers=null){
        $curl = curl_init();
        
        if ($headers != null){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        
        curl_setopt($curl, CURLOPT_URL, "$url");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        
        $response = new VO_api_response();
        $response->setResponse($result);
        $response->setInfo($info);
        
        
        return $response;
    }
	
	protected function localJson($arquivo_caminho){
	    if (file_exists($arquivo_caminho)){
	        $string = file_get_contents($arquivo_caminho);
	        //$json = json_decode($string, true);

	        $this->log->logMsg(__METHOD__ . "-> " . "Lendo arquivo local : " . $arquivo_caminho);
	        return $string;
	    } else {
	        $this->log->logMsg(__METHOD__ . "-> " . "Não existe arquivo local : " . $arquivo_caminho . "");
	        return false;
	    }
            
	}
	
	function data_hoje(){
	    date_default_timezone_set("America/Sao_Paulo");
	    $data = date('Ymd');
	    return $data;
	}
	
	//epoch é a data convertida em milisegundos
	function data($epoch){
		date_default_timezone_set("America/Sao_Paulo");
		$data = date('d/m/Y', $epoch/1000);
		return $data;
	}
	
	function hora($epoch){
		date_default_timezone_set("America/Sao_Paulo");
		$hora = date('H:m:s', $epoch/1000);
		return $hora;
	}
	
	//epoch é a data convertida em milisegundos
	function data_hora($epoch){
		date_default_timezone_set("America/Sao_Paulo");
		$data_hora = date('d/m/Y H:m:s', $epoch/1000);
		return $data_hora;
	}
}

?>

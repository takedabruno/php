<?php
include_once 'autoload.php';
include_once 'class_log.php';

class VO_api_response{	
    
    var $info;
    var $http_status_code;
    var $response;
    
    
    
    
    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getHttp_status_code()
    {
        return $this->http_status_code;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $http_status_code
     */
    public function setHttp_status_code($http_status_code)
    {
        $this->http_status_code = $http_status_code;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

}

?>

<?php

class log{
    
    //Exemplo de como logar a classe e método que estão sendo executados o método logMsg
    //$this->log->logMsg(__METHOD__ . "-> " . "Lendo arquivo local : " . $arquivo_caminho);
    
    function logMsg($msg, $level = 'info', $file = 'main.log'){
        // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
        $levelStr = '';

        // verifica o nível do log
        switch ($level) {
            case 'info':
                // nível de informação
                $levelStr = 'INFO';
                break;

            case 'warning':
                // nível de aviso
                $levelStr = 'WARNING';
                break;

            case 'error':
                // nível de erro
                $levelStr = 'ERROR';
                break;
        }

        // data atual
        // O banco de dados de fusos horários IANA que o PHP fornece utiliza sinais estilo POSIX, que resulta nas time zones Etc/GMT+n Etc/GMT-n acabarem invertidas do uso comum.
        // O Brasil é Etc/GMT-3, mas para usar corretamente no PHP, inverte-se o sinal Etc/GMT+3
        date_default_timezone_set("Etc/GMT+3"); 
        $date = date('Y-m-d H:i:s');

        // formata a mensagem do log
        // 1o: data atual
        // 2o: nível da mensagem (INFO, WARNING ou ERROR)
        // 3o: a mensagem propriamente dita
        // 4o: uma quebra de linha
        $msg = sprintf("[%s] [%s] [%s]: %s%s", $date, $_SERVER['REMOTE_ADDR'], $levelStr, $msg, PHP_EOL);

        // escreve o log no arquivo
        // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
        file_put_contents($file, $msg, FILE_APPEND);
        
        return;
    }
}

?>

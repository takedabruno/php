<?php
include_once 'class_config.php';

/*-----------------------------------------------------------------------------------------------*/
/*FUNCOES GERAIS*/

/*Faz o carregamento automatico de classes
 * com o comando "new nome_da_class()"
 */
    spl_autoload_register(function ($class_name) {
        include_once 'class_'.$class_name . '.php';
    });

    function data_hoje(){
        date_default_timezone_set("America/Sao_Paulo");
        $data = date('d/m/Y');
        return $data;
    }
    
    function hora_hoje(){
        date_default_timezone_set("America/Sao_Paulo");
        $hora = date('H:m:s');
        return $hora;
    }
    
    function data_hora_hoje(){
        date_default_timezone_set("America/Sao_Paulo");
        $data_hora = date('d/m/Y H:m:s');
        return $data_hora;
    }
    
    function data($epoch){
        date_default_timezone_set("America/Sao_Paulo");
        $data = date('d/m/Y', $epoch / 1000);
        return $data;
    }
    
    function hora($epoch){
        date_default_timezone_set("America/Sao_Paulo");
        $hora = date('H:m:s', $epoch / 1000);
        return $hora;
    }
    
    function data_hora($epoch){
        date_default_timezone_set("America/Sao_Paulo");
        $data_hora = date('d/m/Y H:m:s', $epoch / 1000);
        return $data_hora;
    }


/*-----------------------------------------------------------------------------------------------*/
/*Layout*/
    
    function layout_(){
        ?>
        
        <?php        
    }
    
    function layout_header(){
        include_once 'layout_header.php';
    }
    
    function layout_footer(){
        include_once 'layout_footer.php';
    }
    
    function layout_menu(){
        include_once 'layout_menu.php';
    }
    
    function layout_loading(){
        ?>
        <div class="d-flex justify-content-center">
        	<div class="spinner-border text-primary" role="status">
        		<span class="sr-only">Loading...</span>
        	</div>
        </div>
		<?php
    }
    
    function layout_toast_header(){
        ?>
			<!-- <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px; min-width: 500px;"> -->
			<div aria-live="polite" aria-atomic="true" style="position: absolute; top: 80px; min-height: 200px; min-width: 500px;">
    	   		<div style="position: absolute; top: 10px; left: 10px;">
        <?php 
    }
    
    function layout_toast_footer(){
        ?>
        		</div>
			</div>
        <?php 
    }
    
    function layout_toast($titulo, $mensagem){
        ?>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" data-delay="2000">
    		<div class="toast-header">
    			<svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
    			<rect fill="#007aff" width="100%" height="100%" /></svg>
    			<strong class="mr-auto"><?php echo $titulo;?></strong>
    			<small class="text-muted"><?php echo date("d/m/Y");?></small>
    			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
    			</button>
    		</div>
    		<div class="toast-body"><?php echo $mensagem;?></div>
    	</div>
        <?php        
    }
?>

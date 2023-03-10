<?php 
      
       if(isset($_POST['acao'])){
              
                $data = array();
                $data['retorno'] = 'sucesso';
                die(json_decode($data));

            }
        ?>
<?php 



$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){
    $retorna = ['erro' => false, 'msg' => $pagina];

}else{
    $retorna = ['erro' => true, 'msg' => ];

}


echo json_encode($retorna);
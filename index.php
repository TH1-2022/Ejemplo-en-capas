<?php 
    require "utils/autoload.php";

    //PersonitaControlador::Alta('Juan','Perez',"1234","coso@coso.com");
    
    header("Content-Type:application/json");
    echo json_encode(PersonitaControlador::Listar());



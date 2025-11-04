<?php

    include_once "topo.php";
    include_once "menu.php";
    // Conteúdo
    if(empty($_SERVER["QUERY_STRING"])){
       include_once "dashboard.php";
    }elseif($_GET['pg']){
        $pg = $_GET['pg'];
        include_once "$pg.php";
    }else{
        echo "Página não encontrada";
    }
?>



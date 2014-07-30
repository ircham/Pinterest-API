<?php
    /* Require the Pinterest API class */
    require_once("lib/Pinterest.class.php");
    
    // Create new instance of the Pinterest API
    $pinterest = new Pinterest("pinterest");
    
    // Check if a page has to be set
    if(isset($_GET['page'])){
        $pinterest->currentpage = (int) $_GET['page'];
    }
    
    // Check the action
    switch($_GET['action']){
        case "getboards":
            $resp = $pinterest->getBoards();
            break;
        case "getpinsfromboard":
            $resp = $pinterest->getPinsFromBoard($_GET["board"]);
            break;
        case "getpins":
        default:
            $resp = $pinterest->getPins();
            break;
    }
    
    // Return the data
    echo json_encode( $resp );
?>
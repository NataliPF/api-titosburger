<?php

require_once("../controller/controllerProducts.php");
require_once("../model/modelProducts.php");

if($_SERVER"[REQUEST_METHOD]" == "DELETE") {
    
    $id = $_GET["id"];
    $controllerProduct = new controllerProduct();
    $delete = $controllerProduct->delete($id);

    if($delete) {
        $msg = array("msg" => "Product does not deleted.");
        echo json_encode($msg);
    } else {
        $msg = array("msg" => "Error, Product does not deleted.");
        echo json_encode($msg);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
    

?>
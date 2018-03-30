<?php
if (isset ($_GET["search"])) {
    $data = file_get_contents("../View/assets/brands.json");
    $data = json_decode($data, true);
    $criteria = $_GET["search"];
    $idx = 1;
    $result = array();
    foreach ($data as $item) {

        if (strpos($item["name"], $criteria) == 0) {
            $result[$item["name"]] = ["name"=>$item["name"],"flag"=>$item["flag"]];
            $idx++;
            if ($idx > 5) {
                break;
            }

        }


    }
    echo json_encode($result);
}
if(isset($_GET["name"])){
    $data = file_get_contents("../View/assets/brands.json");
    $data = json_decode($data, true);
    $criteria = $_GET["name"];
    $result=array();
    foreach ($data as $item){
        if($item["name"]==$criteria){
            $result["name"]=$item["name"];
            $result["Сериен номер"]=$item["Сериен номер"];
            $result["Производител"]=$item["Производител"];
            $result["Сцепление"]=$item["Сцепление"];
            $result["Описание"]=$item["Описание"];
            $result["flag"]=$item["flag"];
            $result["Код сервиз"]=$item["Код сервиз"];

        }

    }
    echo json_encode($result);
}

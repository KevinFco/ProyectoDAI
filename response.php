<?php
    require_once './php/database.php';

    if(isset($_SERVER["CONTENT_TYPE"])){
        $contentType = $_SERVER["CONTENT_TYPE"];

        if($contentType == "application/json"){
            $content = trim(file_get_contents("php://input"));

            $decoded = json_decode($content, true);

            if($decoded["size"]==0){
                $items = $database->select("tb_dishes","*",[
                    "AND"=>[
                        "id_category" => $decoded["category"]
                    ]
                ]);
            }else{
                $items = $database->select("tb_dishes","*",[
                    "AND"=>[
                        "id_serving" => $decoded["size"],
                        "id_category" => $decoded["category"]
                    ]
                ]);
            }
            /*$state = $database->select("tb_us_states","*",[
                "id_us_state" => $_GET["destination_state"]
            ]);*/

            echo json_encode($items);
        }
    }   
?>


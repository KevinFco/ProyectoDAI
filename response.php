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
                $items = $database->select("tb_dishes",[
                    "[>]tb_categories"=>["id_category" => "id_category"]
                ],[
                    "tb_dishes.id_dish",
                    "tb_categories.id_category",
                    "tb_categories.category_name",
                    "tb_dishes.dish_img",
                    "tb_dishes.dish_name",
                    "tb_dishes.description",
                    "tb_dishes.featured_dish",
                    "tb_dishes.price",
                ],[
                    'AND'=>[
                        "tb_dishes.id_serving" => $decoded["size"],
                        "tb_dishes.id_category" => $decoded["category"]
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


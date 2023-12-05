<?php
    require_once './php/database.php';

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
            "tb_dishes.id_serving" => 1,
            "tb_dishes.id_category" => 1
        ]
    ]);

    var_dump($items);
   
     
?>


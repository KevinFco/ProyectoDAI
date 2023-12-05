<?php 
    /***
     * 0. include database connection file
     * 1. receive form values from post and insert them into the table (match table field with values from name atributte)
     * 2. for the destination_image insert the value "destination-placeholder.webp"
     * 3. redirect to destinations-list. php after complete the insert into
     */

     require_once '../php/database.php';

     // Reference: https://medoo.in/api/select
     $servings = $database->select("tb_servings","*");

     // Reference: https://medoo.in/api/select
     $categories = $database->select("tb_categories","*");

     $message = "";

     if($_GET){
        $item = $database->select("tb_dishes","*",[
            "id_dish" => $_GET["id"],
        ]);
     }

     if($_POST){

        $data = $database->select("tb_dishes","*", ["id_dish"=>$_POST["id"]]);

        if(isset($_FILES["dish_img"]) && $_FILES["dish_img"]["name"] != ""){

            $errors = [];
            $file_name = $_FILES["dish_img"]["name"];
            $file_size = $_FILES["dish_img"]["size"];
            $file_tmp = $_FILES["dish_img"]["tmp_name"];
            $file_type = $_FILES["dish_img"]["type"];
            $file_ext_arr = explode(".", $_FILES["dish_img"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = ["jpeg", "png", "jpg", "webp"];

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type is not valid";
                $message = "File type is not valid";
            }

            if(empty($errors)){
                $filename = strtolower($_POST["dish_name"]);
                $filename = str_replace(',', '', $filename);
                $filename = str_replace('.', '', $filename);
                $filename = str_replace(' ', '-', $filename);
                $img = "location-".$filename.".".$file_ext;
                move_uploaded_file($file_tmp, "../imgs/dishes-imgs/".$img);

               
            }
        }else{
            $img = $data[0]["dish_img"];
        }
        
        $database->update("tb_dishes",[
            "id_serving"=> $_POST["dish_serving"],
            "id_category"=>$_POST["dish_category"],
            "dish_name"=>$_POST["dish_name"],
            "description"=>$_POST["description"],
            "dish_img"=> $img,
            "price"=>$_POST["price"],
            "dish_name_jp"=>$_POST["dish_name_jp"],
            "description_jp"=>$_POST["description_jp"],
        ],[
            "id_dish" => $_POST["id"]
        ]);

        header("location: list-meals.php");
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Edit Meal</h2>
        <?php 
            echo $message;
        ?>
        <form method="post" action="edit-meal.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="dish_name">Dish Name</label>
                <input id="dish_name" class="textfield" name="dish_name" type="text" value="<?php echo $item[0]["dish_name"] ?>">
            </div>
            <div class="form-items">
                <label for="dish_name_jp">Japanese Name</label>
                <input id="dish_name_jp" class="textfield" name="dish_name_jp" type="text" value="<?php echo $item[0]["dish_name_jp"] ?>">
            </div>
            <div class="form-items">
                <label for="dish_serving">Dish Servings</label>
                <select name="dish_serving" id="dish_serving">
                    <?php 
                        foreach($servings as $serving){
                            if($item[0]["id_serving"] == $serving["id_serving"]){
                                echo "<option value='".$serving["id_serving"]."' selected>".$serving["serving_name"]."</option>";
                            }else{
                                echo "<option value='".$serving["id_serving"]."'>".$serving["serving_name"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category">
                    <?php 
                        foreach($categories as $category){
                            if($item[0]["id_category"] == $category["id_category"]){
                                echo "<option value='".$category["id_category"]."' selected>".$category["category_name"]."</option>";
                            }else{
                                echo "<option value='".$category["id_category"]."'>".$category["category_name"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-items">
                <label for="description">Dish Description</label>
                <textarea id="description" name="description" id="" cols="30" rows="10"><?php echo $item[0]["description"]; ?></textarea>
            </div>
            <div class="form-items">
                <label for="description_jp">Japanese Dish Description</label>
                <textarea id="description_jp" name="description_jp" id="" cols="30" rows="10"><?php echo $item[0]["description_jp"]; ?></textarea>
            </div>
            <div class="form-items">
                <label for="dish_img">Dish Image</label>
                <img id="preview" src="../imgs/dishes-imgs/<?php echo  $item[0]["dish_img"] ?>" alt="Preview">
                <input id="dish_img" type="file" name="dish_img" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="price">Dish Price</label>
                <input id="price" class="textfield" name="price" type="text" value="<?php echo $item[0]["price"] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $item[0]["id_dish"]; ?>">
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Update Dish">
            </div>
        </form>
    </div>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
                let reader = new FileReader();

                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>
    
</body>
</html>
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

     if($_POST){

        if(isset($_FILES["dish_img"])){
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

                $database->insert("tb_dishes",[
                    "id_serving"=> $_POST["dish_serving"],
                    "id_category"=>$_POST["dish_category"],
                    "dish_name"=>$_POST["dish_name"],
                    "description"=>$_POST["description"],
                    "dish_img"=> $img,
                    "price"=>$_POST["price"],
                    "dish_name_jp"=>$_POST["dish_name_jp"],
                    "description_jp"=>$_POST["description_jp"]
                ]);
            }
        }
        
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Add New Dish</h2>
        <?php 
            echo $message;
        ?>
        <form method="post" action="add-dish.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="dish_name">Dish Name</label>
                <input id="dish_name" class="textfield" name="dish_name" type="text">
            </div>
            <div class="form-items">
                <label for="dish_name_jp">Japanese Name</label>
                <input id="dish_name_jp" class="textfield" name="dish_name_jp" type="text">
            </div>
            <div class="form-items">
                <label for="dish_serving">Dish Serving</label>
                <select name="dish_serving" id="dish_serving">
                    <?php 
                        foreach($servings as $serving){
                            echo "<option value='".$serving["id_serving"]."'>".$serving["serving_name"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category">
                    <?php 
                        foreach($categories as $category){
                            echo "<option value='".$category["id_category"]."'>".$category["category_name"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-items">
                <label for="description">Dish Description</label>
                <textarea id="description" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-items">
                <label for="description_jp">Japanese Dish Description</label>
                <textarea id="description_jp" name="description_jp" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-items">
                <label for="price">Dish Price</label>
                <input id="price" class="textfield" name="price" type="text">
            </div>
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Add New Dish">
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

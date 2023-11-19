<?php
    require_once '../php/database.php';
    
    include('simple_html_dom.php');

    //link
    $link = "https://livejapan.com/en/article-a0002670/";

    $locations = file_get_html($link);

    $dishes = [];
    $filenames = [];
    $descriptions = [];

    //save destination locations and filenames for the images
    $int = 0;
    foreach ($locations->find('<h2><span>') as $location){
        if($int < 32){
            $name = trim(str_get_html($location)->plaintext);
            $int ++;
            $dishes[] = $name;
            //
                $filename = strtolower($name);
                $filename = str_replace($int,'', $filename);
                $filename = str_replace(',', '', $filename);
                $filename = str_replace('.', '', $filename);
                $filename = str_replace(' ', '', $filename);
                $filenames[] = $filename;

            echo "<h2>".$filename."</h2>";
        }
    }

    //save destination descriptions
    $pos = -1;
    /*foreach ($locations->find('p') as $description){
       $pos++;
       if($pos > 1 && $pos < 55-21){
            $descriptions[] = trim($description->plaintext);
            echo "<h2>".$description."</h2>";
       }
    }*/

    //get and download destination images
    $index = 0;
    foreach ($locations->find('<div><img>') as $image){
        if($image->src != ""){
            if($index>16){
                    if($index < 49){
                        file_put_contents("../imgs/dishes-imgs/{$filenames[$index-17]}.jpg", file_get_contents($image->src));
                        echo "<h2>".$image->src."</h2>";  
                    }
            }
            $index++;
        }
    }
    /*for($i=0; $i<32; $i++){
        // Reference: https://medoo.in/api/insert
        $database->insert("tb_dishes",[
            "id_category" => 1,
            "id_serving" => mt_rand(1,3),
            "dish_name"=> $dishes[$i],
            "description"=> $descriptions[$i],
            "featured_dish" => mt_rand(0,1),
            "dish_img"=> $filenames[$i].".jpg",
            "price"=> mt_rand(10,150)/10
        ]);
    }*/
    

?>
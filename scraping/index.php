<?php
    include('simple_html_dom.php');

    require_once '../php/database.php';

    //link
    $link = "https://livejapan.com/en/article-a0002670/";

    $japan = file_get_html($link);

    $destinations = [];
    $filenames = [];
    $descriptions = [];
    
    //save dish names and filenames for the images
    foreach ($japan->find('h2') as $index=>$item){
        //stop the foreach
        if($index == 32) break;
        
        $string = trim(str_get_html($item)->plaintext);
        $strings = explode(" ", $string);
        
        //ramen needs to remove parenthesis
        if($index == 18) $name = substr($strings[1], 0, strpos($strings[1], '('));
        else $name = $strings[1];
        $destinations[]=$name;

        $filename = strtolower($name);
        $filenames[] = $filename;

        echo "<h2>".$destinations[$index]."</h2><br>";
    }

    //var_dump($filenames);

    //get and download destination images
    $file_index = 0;
    foreach ($japan->find('.c-guard-image > img') as $index=>$image){
        
        //to not load the last image
        if($index == 33) break;
        
        //to not load the first image
        if($index > 0) {
            $file = substr($image->src, 0, strpos($image->src, '?'));
            file_put_contents("../imgs/dishes-imgs/".$filenames[$file_index].".jpg", file_get_contents($file));
            $file_index++;
        }
       
    }

    // Reference: https://medoo.in/api/update
    $name_index = 0;
    for($i= 22; $i < 54; $i++){
        $database->update("tb_dishes",[
            "dish_name"=>$destinations[$name_index],
            "dish_img"=>$filenames[$name_index].".jpg"
        ],[
            "id_dish"=>$i
        ]);
        $name_index++;
    }

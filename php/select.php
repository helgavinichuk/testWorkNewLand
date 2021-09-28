<?php
include 'db.php';


$post_category = $_POST['category'];
//echo $post_category;
// $category1 = mysqli_query($link, "select idCategory FROM category where category='".$post_category."';");
// while ($row=mysqli_fetch_object($category1)){
//     $idCategory = $row->idCategory;
    if(isset($post_category)){
        $type = mysqli_query($link, "select * from Type where idCategory = ".$post_category.";");
        while ($row=mysqli_fetch_object($type)){
        echo '<option value = '.$row->idType.'>'.$row->Type.'</option>';
        }
                               
    }
//}




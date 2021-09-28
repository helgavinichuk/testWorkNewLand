<?php
include 'db.php';

$dates = $_POST['dates'];
$category = $_POST['category'];
$typei = $_POST['type'];
$sum = $_POST['sum'];
$comment = $_POST['comment'];
echo '<p> Вы ввели:<p/>';
echo 'Дата '.$dates.'<br>';
$category1 = mysqli_query($link, "select category FROM category where idCategory='".$category."';");
while ($row=mysqli_fetch_object($category1)){
    $iCategory = $row->category;
echo 'Категория '.$iCategory.'<br>';
}
$type = mysqli_query($link, "select type from Type where idType = ".$typei.";");
while ($row1=mysqli_fetch_object($type)){
    echo 'Тип '.$row1->type.'<br>';
}

echo 'Сумма '.$sum.'<br>';
if($comment!=''){
    echo 'Комментарий '.$comment.'<br>';   
}

// $category1 = mysqli_query($link, "select idCategory FROM category where category='".$category."';");
// while ($row=mysqli_fetch_object($category1)){
//     $idCategory = $row->idCategory;
//     if(isset($category)){
//         $type = mysqli_query($link, "select idType from Type where idCategory = ".$idCategory.";");
//         while ($row1=mysqli_fetch_object($type)){
//             $idType = $row1->idType;
//         }
        $itog = mysqli_query($link, "insert into Itog set idType = ".$typei.", dateD = '".$dates."', sum = ".$sum.", comment='".$comment."';");
//     }
// }

$itog = mysqli_query($link, "select * FROM Itog;");
// echo "<table border=1 class='tableItog'><thead><tr><td>id</td><td id='sCat'><select id='category1'><option  selected disable> Категория</option>";
// $category = mysqli_query($link, 'select category FROM category;');
// while ($row=mysqli_fetch_object($category)){
//     echo '<option value = '.$row->category.'>'.$row->category.'</option>';
// }
// echo "</select></td><td id='sType'>";
// echo '<select name="type" id="type1"><option  selected disable> Тип</option></select>';
// echo"</td><td id='sSum'>Сумма</td><td id='sComm'>Комментарий</td></tr></thead>";
echo "<table border=1 class='tableItog'><thead><tr><td>id</td><td id='sCat'> Категория</td><td id='sType'> Тип</td><td id='sSum'>Сумма</td><td id='sComm'>Комментарий</td><td id='sDate'>Дата</td></tr></thead>";
while($row=mysqli_fetch_object($itog)){
    $type = mysqli_query($link, "select * from Type where idType = ".$row->idType.";");
        while ($row1=mysqli_fetch_object($type)){
           $itype = $row1->Type;
           $idc = $row1->idCategory;
           $category2 = mysqli_query($link, "select * FROM category where  idCategory =".$idc.";");
           while ($row2=mysqli_fetch_object($category2)){
              $icategory = $row2->category;
            }
        }
        echo "<tr><td data-label='ID' id='id_".$row->idItog."'>".$row->idItog.'</td><td data-label="Категория" id="category_'.$row->idItog.'">'.$icategory.'</td><td data-label = "Тип" id="type_'.$row->idItog.'">'.$itype.'</td><td data-label = "Сумма" contentEditable="true" class="editSum" id="sum_'.$row->idItog.'">'.$row->sum.'</td><td data-label = "Комментарий" class="editComment" contentEditable="true" id="comment_'.$row->idItog.'">'.$row->comment.'</td><td data-label = "Дата" class="editDate" contentEditable="true" id="date_'.$row->idItog.'">'.$row->dateD.'</td></tr>';    

}
echo '</table>';

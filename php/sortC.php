<?php
include 'db.php';

$val = $_POST['val'];
if(($val!='Категория')){
$itog = mysqli_query($link, "select * FROM Itog;");
if(isset($itog)){
    echo "<table border=1 class='tableItog'><thead><tr><td>id</td><td id='sCat'> Категория</td><td id='sType'> Тип</td><td id='sSum'>Сумма</td><td id='sComm'>Комментарий</td><td id='sDate'>Дата</td></tr></thead>";
    while($row=mysqli_fetch_object($itog)){
        $type = mysqli_query($link, "select * from Type where idType = ".$row->idType." and idCategory = ".$val.";");
        while ($row1=mysqli_fetch_object($type)){
            $itype = $row1->Type;
            $idc = $row1->idCategory;
            $category2 = mysqli_query($link, "select * FROM category where   idCategory = ".$idc." ;");
            while ($row2=mysqli_fetch_object($category2)){
                $icategory = $row2->category;
                echo "<tr><td data-label='ID' id='id_".$row->idItog."'>".$row->idItog.'</td><td data-label="Категория" id="category_'.$row->idItog.'">'.$icategory.'</td><td data-label = "Тип" id="type_'.$row->idItog.'">'.$itype.'</td><td data-label = "Сумма" contentEditable="true" class="editSum" id="sum_'.$row->idItog.'">'.$row->sum.'</td><td data-label = "Комментарий" class="editComment" contentEditable="true" id="comment_'.$row->idItog.'">'.$row->comment.'</td><td data-label = "Дата" class="editDate" contentEditable="true" id="date_'.$row->idItog.'">'.$row->dateD.'</td></tr>';    
            }
        }

    }
echo '</table>';}
}
else {
    $itog = mysqli_query($link, "select * FROM Itog;");
    if(isset($itog)){
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
    echo '</table>';}
}
?>

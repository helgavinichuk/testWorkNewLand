<?php
include 'php/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test work</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <section>
        <div class="row spaceBetween" id="blockParent">
            <div class="block">
                <form action="" method="POST" class="formMargin">
                    <div class="blockMargin titleForm">Дата добавления</div>
                    <div class="blockMargin"><input type="datetime-local" required value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>" id="dates"></div>
                    <div class="blockMargin titleForm">Выберите категорию</div>
                    <div class="blockMargin">
                        
                        <select name="category" id="category">
                        <option selected disable>Категория</option>
                            <?php
                            $category = mysqli_query($link, 'select * FROM category;');
                            while ($row=mysqli_fetch_object($category)){
                                echo '<option value = '.$row->idCategory.'>'.$row->category.'</option>';
                            } 
                            ?>
                        </select>
                    </div>

                    <div class="blockMargin titleForm">Выберите тип</div>
                    <div class="blockMargin">
                        <select name="type" id="type">
                            <option  selected disable> Тип</option>
                        </select>  
                    </div>
                    <div class="blockMargin titleForm">
                        Сумма
                    </div> 
                    <div class="blockMargin">
                        <input type='text' required pattern = "^[0-9\s.]+$" id='sum'>
                    </div> 
                    <div class="blockMargin titleForm">
                        Комментарий   
                    </div> 
                    <div class="blockMargin">
                        <textarea rows = 3  id = 'comment'></textarea>   
                    </div> 

                    <div class="blockMargin titleForm send" id = 'send'>
                        Сохранить 
                    </div>                


            

                </form>
            </div>
            <div class="block" id='second'>
                <p>Выберите критерий сортировки/ фильтрации</p>
                <div class='blockFilter'>
                    <div>Фильтр по категории</div>
                    <select name="category1" id='category1'>
                        <option value='Категория' selected disable>Категория</option>
                            <?php
                                $category = mysqli_query($link, 'select * FROM category;');
                                while ($row=mysqli_fetch_object($category)){
                                    echo '<option value = '.$row->idCategory.'>'.$row->category.'</option>';
                                } 
                            ?>
                    </select>
                </div>
                <div class='blockFilter'>
                    <div>Фильтр по типу</div>
                    <select name="type1" id='type1' >
                        <option  value='Тип'  selected disable> Тип</option>
                        <?php
                                $type = mysqli_query($link, 'select * FROM Type;');
                                while ($row=mysqli_fetch_object($type)){
                                    echo '<option value = '.$row->idType.'>'.$row->Type.'</option>';
                                } 
                            ?>

                    </select>
                </div> 
                <div class='row sortBox spaceBetween'>
                    <div id='sortSum'>сумма &#8593;</div>
                    <div id='sortCom'>комментарии &#8593;</div>
                </div>
                <div class='row sortBox spaceBetween' > 
                    <div id='sortDate'>дата &#8593;</div>                
                    <div id='reset'>Сбросить</div> 
                </div>
                
            <div id="tableItog">
            <?php
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
            ?>
            </div>
            </div>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="src/script.js"></script>
    
</body>
</html>
$('#category').change(function(){
    $.ajax({
    type: 'POST',
    url: 'php/select.php',
    data: {category: $(this).val()},
    success: function(data) {
            $('#type').html(data);
            console.log(data);

    
    }
    });
});

$('#send').click(function(){
    let dates=$('#dates').val();
    let category=$('#category').val();
    let type=$('#type').val();
    let sum=$('#sum').val();
    let comment=$('#comment').val();
    if ((sum!='')||(category!='Категория')||(type!='Тип')){
    $.ajax({
    type: 'POST',
    url: 'php/send.php',
    data: {dates: dates, category: category, type: type, sum: sum,comment: comment },
    success: function(data) {
            $('#tableItog').html(data);
            alert('Данные сохранены')

    
    }
    });
    }
    else{
        alert('Обязательные поля для заполнения: категория, тип, сумма')
    }
});

$(".editSum").focusout(function(){
    let id = this.id;
    let splitId = id.split("_");
    let fieldName = splitId[0];
    let editId = splitId[1];
    let value = $(this).text();
    $.ajax({
     url: 'php/editSum.php',
     type: 'post',
     data: { field:fieldName, value:value, id:editId },
     success:function(response){
      //console.log('Save successfully');
     }
    });
   
   });

   $(".editComment").focusout(function(){
    let id = this.id;
    let splitId = id.split("_");
    let fieldName = splitId[0];
    let editId = splitId[1];
    let value = $(this).text();
    $.ajax({
     url: 'php/editComment.php',
     type: 'post',
     data: { field:fieldName, value:value, id:editId },
     success:function(response){
      //console.log('ok');
     }
    });
   
   });

$('#category1').change(function(){
    document.querySelector('#type1').value='Тип';
    let val = $(this).val();
    console.log(val);
    $.ajax({
    type: 'POST',
    url: 'php/sortC.php',
    data: {val: val},
    success: function(data) {
            $('#tableItog').html(data);


    
    }
    });
});

$('#type1').change(function(){
    document.querySelector('#category1').value='Категория';
    let val = $(this).val();
    console.log(val);
    $.ajax({
    type: 'POST',
    url: 'php/sortT.php',
    data: {val: val},
    success: function(data) {
            $('#tableItog').html(data);


    
    }
    });
});

$("#sortSum").click(function(){
    $("#sortSum").toggleClass('active');
    let sortSum;
    if ($('#sortSum').hasClass('active')) {
    	sortSum='asc';
        $('#sortSum').html('сумма &#8595;')
    } else {
    	sortSum='desc';
        $('#sortSum').html('сумма &#8593;')
    }
    $.ajax({
     url: 'php/sortSum.php',
     type: 'post',
     data: { s:sortSum },
     success:function(data){

        $('#tableItog').html(data);     }
    });
   
});

$("#sortCom").click(function(){
    $("#sortCom").toggleClass('active');
    let sortCom;
    if ($('#sortCom').hasClass('active')) {
    	sortCom='asc';
        $('#sortCom').html('комментарии &#8595;')
    } else {
    	sortCom='desc';
        $('#sortCom').html('комментарии &#8593;')
    }    
    $.ajax({
     url: 'php/sortCom.php',
     type: 'post',
     data: { s:sortCom },
     success:function(data){
        $('#tableItog').html(data);     }
    });
   
});

$("#sortDate").click(function(){
    $("#sortDate").toggleClass('active');
    let sortDate;
    if ($('#sortDate').hasClass('active')) {
    	sortDate='asc';
        $('#sortDate').html('дата &#8595;')
    } else {
    	sortDate='desc';
        $('#sortDate').html('дата &#8593;')
    }  
    $.ajax({
     url: 'php/sortDate.php',
     type: 'post',
     data: { s:sortDate },
     success:function(data){
        $('#tableItog').html(data);     }
    });
   
});
$("#sortDu").click(function(){
    let sortD = document.querySelector('#sortDu').textContent;
    $.ajax({
     url: 'php/sortDu.php',
     type: 'post',
     data: { s:sortD },
     success:function(data){
        $('#tableItog').html(data);     }
    });
   
});
$("#reset").click(function(){
    let reset = document.querySelector('#reset').textContent;
    $.ajax({
     url: 'php/reset.php',
     type: 'post',
     data: { s:reset },
     success:function(data){
        $('#tableItog').html(data);     }
    });
   
});

// $('#sSum').click(function(){

//     $.ajax({
//     type: 'POST',
//     url: 'php/send.php',
//     data: {dates: dates, category: category, type: type, sum: sum,comment: comment },
//     success: function(data) {
//             $('#second').html(data);
//             // console.log(data);

    
//     }
//     });
// });
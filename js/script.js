function call() {
    let msg   = $('#formx').serialize();
    $.ajax({
        type: 'POST',
        url: 'res.php',
        data: msg,
        success: function(data) {
            $('#results').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });

}

function writeMeSubmit(form) {
    //создаем экземпляр класс FormData, тут будем хранить всю информацию для отправки
    let formData = new FormData();

    //не забывайти проверить поля на заполнение
    //код проверки полей опустим, он к статье не имеет отнашение

    //присоединяем наш файл
    jQuery.each($('#file_v')[0].files, function (i, file) {
        formData.append('file_v', file);
    });

    //присоединяем остальные поля
    formData.append('name', $('input#fname').val());
    formData.append('phone', $('input#fphone').val());

    //отправляем через ajax
    $.ajax({
        url: "res.php",
        type: "POST",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        data: formData, //указываем что отправляем
        success: function (data) {$('#results').html(data);
        }
    });

    return false;
}

$(function() {
    $('#go_on').click(function(){

        let data = jQuery('#simplecheckout_form').find('input,select,textarea').serialize();

//--console.debug(data);


        let fd = new FormData();
        fd.append('name', '123');
        fd.append('type', 'one');
        fd.append('img', $('#imgFile')[0].files[0]);

        $.ajax({
            type: 'POST',
            url: 'res.php',
            data: fd,
            processData: false,
            contentType: false,
//          dataType: "json",
            dataType: "text",
            success: function(data) {
                $(".message_title").html('OK');
                $(".message").html(data);
            },
            error: function(data) {
                $(".message_title").html('Error');
                $(".message").html(data);
            }
        });
    });
});

/*верное решение*/
$(function(){
    $('#my_form').on('submit', function(e){
        e.preventDefault();
        let $that = $(this),
            formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
        $.ajax({
            url: 'res.php', // путь к php-обработчику
            type: 'POST', // метод передачи данных
            dataType: 'json',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data: formData,
            success: function(json){
                if(json){
                    $(".message").html(json);
                    console.log(json);
                    // тут что-то делаем с полученным результатом
                }
            }
        });
    });
});
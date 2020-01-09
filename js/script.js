/*$('#img').bind('change', ()=>{
    let fil = $('#img');
    console.log(fil[0].files[0]);
    if (fil[0].files[0].name.match(/\.(jpg|jpeg|png|gif)$/)){
        console.log('Файл является изображением');
    }
});*/
$(document).ready(function() {

    $('#my_form').submit(function(e) {

        e.preventDefault();

        let data = new FormData(this);
            let file = $('#img');
            if (file[0].files[0].name.match(/\.(jpg|jpeg|png|gif)$/)){ //Проверка файла
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(result) {
                        $('#results').html(result);
                        console.log(result);
                    },
                });
            }
            else{
                let result = "Файл не является изображением. Пожалуйста загрузите изображение и попробуйте снова";
                $('#results').html(result);
            }


    });

});
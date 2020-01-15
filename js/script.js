

$(document).ready(function() {
    $('#img').bind('change', ()=>{
        let fil = $('#img');
        console.log(fil[0].files[0]);
        if (!fil[0].files[0].name.match(/\.(jpg|jpeg|png|gif)$/)){
            console.log('Файл не является изображением');
        }
    });
    $('#migration').on("click", (e)=>{
        $.ajax({
            type: 'POST',
            url: 'src/php/1.php',
            contentType: false,
            cache: false,
            processData: false,

            success: function(result) {
                $('#results').html(result);
                console.log(result);
            },
        });
    })
    /*$('#test').on("click", (e)=>{
        let data = $('#my_form').serializeArray();
        $.ajax({
            type: 'POST',
            url: 'src/php/lib/Add_Article.php',
            data: data,
            contentType: false,
            cache: false,
            processData: false,


            success: function(result) {
                $('#results').html(result);
                console.log(result);
                console.log(data);
            },
        });
    })*/

    $('#my_form').submit(function(e) {

        e.preventDefault();

        let data = new FormData(this);
        if (($('#img')[0].files[0].type.indexOf('image')) >= 0) {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: data,
                contentType: false,
                cache: false,
                processData: false,

                success: function(result) {
                    $('#results').html(result);
                    //console.log(JSON.parse(result));
                },
            });


        }
        else
            $('#results').html('Файл на является изображением. Пожалуйста загрузите другой файл!');



    });

});
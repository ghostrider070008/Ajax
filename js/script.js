let files;

$('input[type=file]').change(function(){
    files = this.files;
});



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
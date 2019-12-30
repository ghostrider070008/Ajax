$(document).ready(function() {

    $('#my_form').submit(function(e) {

        e.preventDefault();

        let data = new FormData(this);
        console.log(data);

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: data,
            contentType: false,
            cache: false,
            processData: false,

            success: function(result) {
                $('#results').html(result);
                console.log(JSON.parse(result));
            },
        });

    });

});
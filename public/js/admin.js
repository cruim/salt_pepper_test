$(document).ready(function() {
    $(document).on('change', '.main td [type=checkbox]', function (e) {
        e.preventDefault();
        var element = $(this);
        updateData(element);
    })
});

function updateData(element){
    var request =
        {
            'id':$(element).parent().parent().data('id')
        };
    $.ajax({
        url: '/update_image_active',
        type: "GET",
        dataType: "json",
        data:{
            request: request
        },
        success: function (response) {
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
        }
    });
}
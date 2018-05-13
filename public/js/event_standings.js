$(document).ready(function(){
    $(document).on("click", ".set_vote", function(e) {
        e.preventDefault();
        var element = $(this);
        updateVotesCount(element);
        // console.log(element.parent().data('image'));
    });
});

function updateVotesCount(element)
{
    var request =
        {
            'image_id':$(element).parent().data('image')
        }

    $.ajax({
        url: '/update_vote_count',
        type: "GET",
        dataType: "json",
        data:{
            request: request,
        },
        success: function (response) {
            // console.log($(element).parent().parent().find('.vote_count').text());
            $(element).parent().parent().find('.vote_count').text(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
        }
    });
}
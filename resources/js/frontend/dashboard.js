$(function(){
    //Load the functionalities
    commentButton()
})

function commentButton() {
    $('.bandle_button').click(function(event){
        const dataURL = $(this).attr("data-src");
        const dataID = $(this).attr("data-post");
        //We have to do a condition if is active or not
        if($(this).hasClass('showing')) {
            $(`#comment_container_id_${dataID}`).text('')
            $(this).removeClass('showing')
            // $(`#comment_container_id_${dataID}`).html()='';
        } else {
            $(this).addClass('showing')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: dataURL
            }).done(function(data) {
                let dataArray = JSON.parse(data)
                dataArray.forEach((element,i) => {
                    let content=element.content
                    let author=element.author_id
                    $(`#comment_container_id_${dataID}`).append(
                        $("<div>", {class: 'container_comment m-2'})
                        .append(
                            $("<p>", {text: content})
                        )
                        .append(
                            $("<p>", {text: author, class: 'flex justify-end text-sm'}).click(function(){
                                alert("We have to put redirect to correct web...")
                            })
                        )
                    )
                });
                $(`.comment_container_id_${dataID}`).append(
                    $("<p>", {class: 'container_comment'})
                )
                console.log(JSON.parse(data))
            })
            .fail(function() {
                alert( "error" );
            });
        }
        console.log($(this).attr("data-src"))
    })
}
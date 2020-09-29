$(function(){
    //Load the functionalities
    $('#friendsContainer').fadeOut()
    commentButton()
    friendsButton()
    likesButton()
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



function friendsButton() {
    $('#friendsButton').click(function(){
        if($('#friendsContainer').hasClass('showing')) {
            console.log('removing friends')
            $('#friendsContainer').removeClass('showing').fadeOut()
        } else {
            console.log('Showing friends')
            $('#friendsContainer').addClass('showing').fadeIn()
        }
    })
}

function likesButton() {
    $('.likesButton').click(function(event){
        //const state = $(this).attr("data-state");
        const dataURL = $(this).attr("data-src");
        const userID = $(this).attr("data-userID");
        const postID = $(this).attr("data-postID");
        const likeValue = $(this).attr("data-value");
        console.log("UserID: " + userID + "\n" + "PostID: " + postID + "\n" + "LikeValue: " + likeValue)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                post_id: postID,
                author_id: userID,
                value: likeValue
            },
            url: dataURL,
            method: 'POST'
        }).done(function(data) {
            console.log(JSON.parse(data))
        }).fail(function(error){
            console.log(error)
        });
    });
}
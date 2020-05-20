$(function () {

    $('#postsTable').DataTable();
    $('.dataTables_length').addClass('bs-select');

    // close
    $('div.msg span#close').on('click', function(){
        $(this).parent().fadeOut('fast');
    });

    // delete post
    $("a.deletePost").on('click', function(e) {

        e.preventDefault();
        
        const deleteForm = $("#deletePostForm");

        bootbox.confirm("Are you sure you want to delete this post?", function(result){

            if(result === true) {
                deleteForm.submit();
            } else {

            }

        });

    });

});
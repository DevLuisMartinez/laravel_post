$(document).ready(function(){
    
    $('.delete').on('click',function(){
        deletePost(this);
    });

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
});

function deletePost( post_selected ) {

    if (confirm('Are you sure you want to delete this post?')) {
        $.ajax({
            type: 'DELETE',
            url: $(post_selected).data('delete_route'),
            success: function (response) {
                toastr.success('Deleted',response.message);
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        });
    }
}


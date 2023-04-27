

function autocompletIndexUser(){
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#user_id').val();
    console.log(keyword);
    if (keyword.length > min_length) {
        $.ajax({
            url: 'autocomplete/getData/'+keyword,
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('#user_list_id').show();
                $('#user_list_id').html(data);
                $('#user_list_id .list-group').css('position','absolute');
            }
        });
    } else {
        $('#user_list_id').hide();
    }
}


$('#user_id').on('keyup',function(){
    autocompletIndexUser();
});
//import jquery
import * as jQuery from './jquery-2.2.4.min.js' ;

function autocompletIndexUser(){
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('.form-control').val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: 'app/Controllers/autocompleteIndexUser.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                //$('#user_list_id').show();
                $('#user_list_id').html(data);
            }
        });
    } else {
        $('#search_index_list_id').hide();
    }
}

$(document).ready(function(){
    $('#user_id').keyup(function(){
        autocompletIndexUser();
    });
});
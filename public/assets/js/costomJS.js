//import jquery
import * as jQuery from './jquery-2.2.4.min.js' ;

$('document').ready(function(){
   $('#num_etudiant').keyup(function(){
        var num_etudiant = $(this).val();
        if(num_etudiant != ''){
             $.ajax({
                url:"http://localhost:8000/etudiant/num_etudiant",
                method:"POST",
                data:{num_etudiant:num_etudiant},
                success:function(data){
                 $('#num_etudiant_result').html(data);
                }
             });
        }
     });
}   );
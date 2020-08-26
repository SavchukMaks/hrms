/**
 * Created by vaniakucher on 13.07.17.
 */
$( document ).ready(function() {

    $('#company_name').attr('required', 'required');

     $("select[name='role']").change(function () {

         if($(this).val()=="company") {

           $('#company_name').attr('required', 'required');
           $('#first_name').removeAttr("required");
           $('#second_name').removeAttr("required");
           $("#recruiter-inputs").hide();
           $("#company-inputs").show();

       } else {

             $("#recruiter-inputs").show();
           $('#company_name').removeAttr("required");
           $('#first_name').attr('required', 'required');
           $('#second_name').attr('required', 'required');
           $("#company-inputs").hide();

       }
     });
});
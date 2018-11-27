$(document).ready(function() {
    $(":text").dblclick(function () {
      $(this).val("");   
    });
    $("#add").click(function() {
        var name = $("#name").val();
        var country = $("#country").val();
        var isValid = true;
           
        if(name == "") {
            $("#name").next().text("You must enter a name");
            isValid = false;
        }else {
            $("#name").next().text("");
                       
        }
        
        if(country == "") {
            $("#country").next().text("You must enter a country");
            isValid = false;
        }else {
            $("#country").next().text("");
        }
        
        if(isValid == true) {
            $("#add_player").submit();
        }
    });
});

$(function(){
$("#addClass").click(function () {
  $('#sidebar_secondary').addClass('popup-box-on');
    });
  
    $("#removeClass").click(function () {
  $('#sidebar_secondary').removeClass('popup-box-on');
    });
})

//script for handling message upload
$(document).ready(function(){

    // like and unlike click
    $(".sender").click(function(){
        
		var id = this.id;   // Getting Button id
		var split_id = id.split("_");

        var sid = split_id[0];
        var rid = split_id[1];  
		
		var text = document.getElementById("submit_message").value;
		document.getElementById("submit_message").value = "";
        // AJAX Request
        $.ajax({
            url: 'submit_chat.php',
            type: 'POST',
            data: {sid:sid,rid:rid,text:text},
			
			success: function (response) {
				var content = document.getElementById("dyn_cht");
				content.innerHTML = content.innerHTML+response;
				}
        });

    });

});



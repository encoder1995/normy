$(document).ready(function(){

    // like and unlike click
    $(".upload, .anonymous_upload").click(function(){
        
		var id = this.id;   // Getting Button id
		var cls = this.className //Getting Button class
		var text = document.getElementById("comment").value;
		document.getElementById("comment").value = "";
        // AJAX Request
        $.ajax({
            url: 'uploadcomment.php',
            type: 'POST',
            data: {id:id,cls:cls,text:text},
			
			/*success: function (response) {
				var content = document.getElementById("cmt");
				content.innerHTML = content.innerHTML+response;
				}*/
        });

    });

});


$(document).ready(function(){

    $(".btn.btn-default.folo").click(function(){
        
		var id = this.id;   // Getting Button id
		var val = this.value; //getting value
		
		if(val == "FOLLOW"){
		$(".btn.btn-default.folo").val("FOLLOWING");
		var elems = document.getElementsByClassName('btn btn-default folo');
			for(var i = 0; i < elems.length; i++) {
				elems[i].style.background = 'transparent';
				elems[i].style.color = 'white';
			}
        // AJAX Request
        $.ajax({
            url: 'followed.php',
            type: 'POST',
            data: {id:id},
			
			success: function (data) {
				   
				}
        });}
		else{
			$(".btn.btn-default.folo").val("FOLLOW");
			var elems = document.getElementsByClassName('btn btn-default folo');
			for(var i = 0; i < elems.length; i++) {
				elems[i].style.background = 'transparent';
				elems[i].style.color = 'white';
			}
        // AJAX Request
        $.ajax({
            url: 'unfollow.php',
            type: 'POST',
            data: {id:id},
			
			success: function (data) {
				   
				}
        });
		}

    });

});


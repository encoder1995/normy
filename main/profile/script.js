$(document).ready(function(){

    // like and unlike click
    $(".like, .unlike").click(function(){
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid

        // Finding click type
        var type = 0;
        if(text == "like"){
            type = 1;
        }else{
            type = 0;
        }

        // AJAX Request
        $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: {postid:postid,type:type},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+postid).text(likes);        // setting likes
                $("#unlikes_"+postid).text(unlikes);    // setting unlikes
				
				$("#likesm_"+postid).text(likes);        // setting likes
                $("#unlikesm_"+postid).text(unlikes);    // setting unlikes

                if(type == 1){
                    
					$("#l_"+postid).css("color","#a3bf00");
					$("#ul_"+postid).css("color","#898a8e");
					
					$("#lm_"+postid).css("color","#a3bf00");
					$("#ulm_"+postid).css("color","#898a8e");
					
					$("#lmc_"+postid).css("color","#a3bf00");
					$("#ulmc_"+postid).css("color","#898a8e");
                }

                if(type == 0){
                    
					$("#l_"+postid).css("color","#898a8e");
					$("#ul_"+postid).css("color","#a3bf00");
					
					$("#lm_"+postid).css("color","#898a8e");
					$("#ulm_"+postid).css("color","#a3bf00");
					
					$("#lmc_"+postid).css("color","#898a8e");
					$("#ulmc_"+postid).css("color","#a3bf00");
                }

            }
        });

    });

});
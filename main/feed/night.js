var darkEnabled = false; 
$(document).ready(function() {
        $("#dark").on("click", switchDarkMode);
        $("#reset").on("click", reset);
        }
      );
      
      function switchDarkMode(){
        darkEnabled = !darkEnabled;
        if(darkEnabled){
		  $("#roastbtn").addClass("darkroast");
          $("body").addClass("darkmode");
		  $(".title a").css("color","white");
		  $("#dark").css("color","white");
		  $(".spac").css("color","#dedfe5");
		  $(".spac-c").css("color","#dedfe5");
		  $(".rate").css("color","#dedfe5");
		  
		   
        } else {
		  $("#roastbtn").removeClass("darkroast");
          $("body").removeClass("darkmode");
		  $(".title a").css("color","black");
		  $("#dark").css("color","#93979e");
		  //$(".spac").css("color","black");
		  //$(".spac-c").css("color","black");
		  $(".rate").css("color","black");
		  $("body").css("transition","1s");
		  
        }
      }
      
      function reset(){
        $("body").removeClass("darkmode");
		$("#roastbtn").removeClass("darkroast");
      }
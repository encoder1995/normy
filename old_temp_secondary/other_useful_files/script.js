$(document).ready(function() {
    $('.button_like').click(function(e)
    {
        var productID = $(this).attr('rel');
        var likeval = parseInt($("#linkeBtn_"+productID).val(), 10);
        var unlikeval = parseInt($("#unlinkeBtn_"+productID).val(), 10);
        $.post("lookatmemes.php", {op:"like",pid: productID},function(data)
        {
            if(data == 1)
            {
                likeval = likeval+1;
                $("#linkeBtn_"+productID).val(likeval);
                $("#linkeBtn_"+productID).attr("disabled", "disabled");
                $("#unlinkeBtn_"+productID).css("background-image","url(likebw.png)");
            }
            else if(data == 2)
            {
                unlikeval = unlikeval-1;
                $("#unlinkeBtn_"+productID).val(unlikeval);
                $("#unlinkeBtn_"+productID).prop("disabled", false);
                $("#unlinkeBtn_"+productID).css("background-image","url(likebw.png)");
                
                likeval = likeval+1;
                
                $("#linkeBtn_"+productID).val(likeval);
                $("#linkeBtn_"+productID).attr("disabled", "disabled");
                $("#linkeBtn_"+productID).css("background-image","url(like.png)");
            }
        })
    });
    $('.button_unlike').click(function(e)
    {
        var productID = $(this).attr('rel');
        var likeval = parseInt($("#linkeBtn_"+productID).val(), 10);
    var unlikeval = parseInt($("#unlinkeBtn_"+productID).val(), 10);
        $.post("lookatmemes.php", {op:"unlike",pid: productID},function(data)
        {
            if(data == 1)
            {
                unlikeval = unlikeval+1;
                $("#unlinkeBtn_"+productID).val(unlikeval);
                $("#unlinkeBtn_"+productID).attr("disabled", "disabled");
                $("#linkeBtn_"+productID).css("background-image","url(likebw.png)");
            }
            else if(data == 2)
            {
                likeval = likeval-1;
                $("#linkeBtn_"+productID).val(likeval);
                $("#linkeBtn_"+productID).prop("disabled", false);
                $("#linkeBtn_"+productID).css("background-image","url(likebw.png)");
                
                unlikeval = unlikeval+1;
                $("#unlinkeBtn_"+productID).val(unlikeval);
                $("#unlinkeBtn_"+productID).attr("disabled", "disabled");
                $("#unlinkeBtn_"+productID).css("background-image","url(like.png)");
            }
        })
    });
});
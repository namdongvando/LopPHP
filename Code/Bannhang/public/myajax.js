$(function() {
    
      setInterval(function () {

          $.ajax({
            method: "GET",
            url: "/ajax.php?pages=ajaxthongbao",
            //url: "/banhang/ajax.php?pages=ajaxthongbao",
          }).done(function(res){
            //consol.log(res);
            $("#messages-menu").html(res);
          })

      },1000);

});
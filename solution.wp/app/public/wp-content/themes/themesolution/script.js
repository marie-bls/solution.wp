jQuery(document).ready(function($){
    $(".btn-menu").click(function(){
      $(".nav-drop").toggle();
    });
  });

  /*fonction recherche*/
  jQuery(document).ready(function($){
    $("#searchsubmit").click(function(){
      $("#s").removeClass("hidden");
    });
  });
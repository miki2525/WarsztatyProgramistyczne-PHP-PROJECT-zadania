$(document).ready(function () {

     $("body").css("display", "none");
     $("body").fadeIn(800);
     $(".count").css("font-weight", "bold")
         .css("color", "yellowgreen")
         .css("font-family", "Jokerman")
         .css("font-size", "150%");

     if(document.cookie.indexOf("login") != -1){
         $(".jumbotron").eq(0).hide();
         $(".jumbotron").eq(1).show();
         $("#loginpan > div > div > form > button").
         before("<p style='color: red'><strong>Niepoprawny login lub hasło</strong></p>");
     }

     else {
         $("#loginbtn").one("click", function () {
             $(".jumbotron").toggle("slow", function () {
             });
         });
     }

    
    /*COUNTER*/
    
    $(".count").each(function () {
    $(this).prop('Counter',100).animate({
        Counter: $(this).text()
    }, {
        duration: 2000, 
        step: function () {
            $(this).text(Math.ceil(this.Counter));
    }});
});
        
    
    
    
});
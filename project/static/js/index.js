$(document).ready(function () {
     
     $("body").css("display", "none");
     $("body").fadeIn(800);
    
     
     $("#loginbtn").one("click", function(){
                          $(".jumbotron").toggle( "slow", function() {});
                          });
                          $(this).off("#loginbtn");
    
    
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
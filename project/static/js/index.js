$(document).ready(function () {
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
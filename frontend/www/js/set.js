$(document).ready(function() {
       
    $("ul.sidemenu a").each(function(index) {
        if(this.href.trim() == window.location)
            $(this).addClass("selected");
    });
    
    $(".btn").popover({        
          html:true});
    
})
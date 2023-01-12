(function ($) {
    "use strict";
    $(document).ready(function () {
        var contactData=JSON.parse(sessionStorage.getItem("quoteList"));
        
        if(contactData){
            $("#contactForm input#name").val(contactData[0].value);
            $("#contactForm input#email").val(contactData[2].value);
            $("#contactForm input#phoneNumber").val(contactData[1].value);
        }
    });


})(jQuery);
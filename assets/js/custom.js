(function($) {
    'use strict';
    // Preloader
    jQuery(window).on('load', function() {
        jQuery("#preloader").delay(250).fadeOut(250);
    });
    // Scrollup
    // $(function() {
    //     $.scrollUp({
    //         scrollName: 'scrollUp',
    //         scrollText: 'Up',
    //         activeOverlay: false
    //     });
    // });
    // Restrict Inspect
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
                e.keyCode === 86 ||
                e.keyCode === 85 ||
                e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };
    $(document).keypress("u", function(e) {
        if (e.ctrlKey) {
            return false;
        } else {
            return true;
        }
    });
    // Navigation menu
    // const loc = location.href;
    // const navimenu = document.querySelectorAll('');
    // for (let i = 0; i < navimenu.length; i++) {
    //     if (navimenu[i].href == loc) {
    //         navimenu[i].classList.add('active');
    //     }
    // }
})(jQuery);

// print prescription button function
function printpage() {
    //Get the print button and put it into a variable
    var printButton = document.getElementById("printpagebutton");
    var previewBtn = document.getElementById("previewBtn");
    //Set the print button visibility to 'hidden' 
    printButton.style.visibility = 'hidden';
    previewBtn.style.visibility = 'hidden';
    //Print the page content
    window.print()
    printButton.style.visibility = 'visible';
    previewBtn.style.visibility = 'visible';
}

// print invoice button function
function printInvoicepage() {
    //Get the print button and put it into a variable
    var printButton = document.getElementById("printInvoicepagebutton");
    var addPayment = document.getElementById("add_payment");
    var backBTN = document.getElementById("backBTN");
    var savePDF = document.getElementById("savePDF");
    // var previewBtn = document.getElementById("previewBtn");

    //Set the print button visibility to 'hidden'  
    // previewBtn.style.visibility = 'hidden';

    //Print the page content
    window.print() 
}
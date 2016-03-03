
/* Background Images
-------------------------------------------------------------------*/
var  pageTopImage = jQuery('#page-top').data('background-image');
var  aboutImage = jQuery('#about').data('background-image');
var  subscribeImage = jQuery('#subscribe').data('background-image');
var  contactImage = jQuery('#contact').data('background-image');
var  lineupImage = jQuery('#lineup').data('background-image');

if (pageTopImage) {  jQuery('#page-top').css({ 'background-image':'url(' + pageTopImage + ')' }); };
if (aboutImage) {  jQuery('#about').css({ 'background-image':'url(' + aboutImage + ')' }); };
if (subscribeImage) {  jQuery('#subscribe').css({ 'background-image':'url(' + subscribeImage + ')' }); };
if (contactImage) {  jQuery('#contact').css({ 'background-image':'url(' + contactImage + ')' }); };
if (lineupImage) {  jQuery('#lineup').css({ 'background-image':'url(' + lineupImage + ')' }); };

/* Background Images End
-------------------------------------------------------------------*/



/* Document Ready function
-------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	"use strict";


    /* Window Height Resize
    -------------------------------------------------------------------*/
    var windowheight = jQuery(window).height();
    if(windowheight > 650)
    {
         $('.pattern').removeClass('height-resize');
    }
    /* Window Height Resize End
    -------------------------------------------------------------------*/


    
	/* Main Menu   
	-------------------------------------------------------------------*/
	$('#main-menu #headernavigation').onePageNav({
		currentClass: 'active',
		changeHash: false,
		scrollSpeed: 750,
		scrollThreshold: 0.5,
		scrollOffset: 0,
		filter: ':not(.external)',
		easing: 'swing'
	});  

	/* Main Menu End  
	-------------------------------------------------------------------*/




	/* Time Countdown 
	-------------------------------------------------------------------*/
	$('#time_countdown').countDown({
        
         targetDate: {
             'day': 24,
             'month': 7,
             'year': 2015,
             'hour': 12,
             'min': 0,
             'sec': 0,
             'utc': true
         },
         omitWeeks: true,

//         targetOffset: {
//            'day':      0,
//            'month':    0,
//            'year':     1,
//            'hour':     0,
//            'min':      0,
//            'sec':      3
//		},
//		omitWeeks: true

	    });



	/* Next Section   
	-------------------------------------------------------------------*/
	$('.next-section .go-to-about').click(function() {
    	$('html,body').animate({scrollTop:$('#about').offset().top}, 1000);
  	});
        $('.next-section .go-to-lineup').click(function() {
    	$('html,body').animate({scrollTop:$('#lineup').offset().top}, 1000);
  	});
  	$('.next-section .go-to-subscribe').click(function() {
    	$('html,body').animate({scrollTop:$('#subscribe').offset().top}, 1000);
  	});
  	$('.next-section .go-to-contact').click(function() {
    	$('html,body').animate({scrollTop:$('#contact').offset().top}, 1000);
  	});
  	$('.next-section .go-to-page-top').click(function() {
    	$('html,body').animate({scrollTop:$('#page-top').offset().top}, 1000);
  	});

  	/* Next Section End
	-------------------------------------------------------------------*/




  /* Subscribe
  -------------------------------------------------------------------*/
    $(".news-letter").ajaxChimp({
        callback: mailchimpResponse,
        url: "http://edm.us11.list-manage.com/subscribe/post?u=8ddea950745a992ef33e672e5&amp;id=ce190f761b" // Replace your mailchimp post url inside double quote "".  
    });

    function mailchimpResponse(resp) {
         if(resp.result === 'success') {
         
            $('.alert-success').html(resp.msg).fadeIn().delay(3000).fadeOut();
            
        } else if(resp.result === 'error') {
            $('.alert-warning').html(resp.msg).fadeIn().delay(3000).fadeOut();
        }  
    };




	/* Subscribe End
	-------------------------------------------------------------------*/
  
 
         
  function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
      return true;
    } else {
      return false;
    }
  } 
 

	/* Contact End
	-------------------------------------------------------------------*/


    

    



});

/* Document Ready function End
-------------------------------------------------------------------*/


/* Preloder 
-------------------------------------------------------------------*/
$(window).load(function () {    
    "use strict";
    $("#loader").fadeOut();
    $("#preloader").delay(350).fadeOut("slow");
});
 /* Preloder End
-------------------------------------------------------------------*/
   

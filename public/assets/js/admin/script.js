(function($) {
    "use strict";
    var $wrapper = $('.main-wrapper');
    var $pageWrapper = $('.page-wrapper');
    var $slimScrolls = $('.slimscroll');
    var Sidemenu = function() {
        this.$menuItem = $('#sidebar-menu a');
    };
    function init() {
        var $this = Sidemenu;
        $(".navigation li").hover(function() {
            var isHovered = $(this).is(":hover");
            if (isHovered) {
              $(this).children("ul").stop().slideDown(300);
            } else {
              $(this).children("ul").stop().slideUp(300);
            }
          });
          
        // $('#sidebar-menu a').hover( function(e) {
        //     if ($(this).parent().hasClass('submenu')) {
        //         e.preventDefault();
        //     }
        //     if (!$(this).hasClass('subdrop')) {
        //         $('ul', $(this).parents('ul:first')).slideUp(350);
        //         $('a', $(this).parents('ul:first')).removeClass('subdrop');
        //         $(this).next('ul').slideDown(350);
        //         $(this).addClass('subdrop');
        //     } else if ($(this).hasClass('subdrop')) {
        //         $(this).removeClass('subdrop');
        //         $(this).next('ul').slideUp(300);
        //     }
        // });
        // $('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
    }
    init();
    $('body').append('<div class="sidebar-overlay"></div>');
    $(document).on('click', '#mobile_btn', function() {
        $wrapper.toggleClass('slide-nav');
        $('.sidebar-overlay').toggleClass('opened');
        $('html').addClass('menu-opened');
        return false;
    });
    $(".sidebar-overlay").on("click", function() {
        $wrapper.removeClass('slide-nav');
        $(".sidebar-overlay").removeClass("opened");
        $('html').removeClass('menu-opened');
    });
    if ($('.page-wrapper').length > 0) {
        var height = $(window).height();
        $(".page-wrapper").css("min-height", height);
    }
    $(window).resize(function() {
        if ($('.page-wrapper').length > 0) {
            var height = $(window).height();
            $(".page-wrapper").css("min-height", height);
        }
    });
    $(document).on('click', '.mail-important', function() {
        $(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
    });
    if ($('.summernote').length > 0) {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false
        });
    }
    if ($('.proimage-thumb li a').length > 0) {
        var full_image = $(this).attr("href");
        $(".proimage-thumb li a").click(function() {
            full_image = $(this).attr("href");
            $(".pro-image img").attr("src", full_image);
            $(".pro-image img").parent().attr("href", full_image);
            return false;
        });
    }
    if ($('#pro_popup').length > 0) {
        $('#pro_popup').lightGallery({
            thumbnail: true,
            selector: 'a'
        });
    }
    if ($slimScrolls.length > 0) {
        $slimScrolls.slimScroll({
            height: 'auto',
            width: '100%',
            position: 'right',
            size: '7px',
            color: '#ccc',
            allowPageScroll: false,
            wheelStep: 10,
            touchScrollStep: 100
        });
        var wHeight = $(window).height() - 60;
        $slimScrolls.height(wHeight);
        $('.sidebar .slimScrollDiv').height(wHeight);
        $(window).resize(function() {
            var rHeight = $(window).height() - 60;
            $slimScrolls.height(rHeight);
            $('.sidebar .slimScrollDiv').height(rHeight);
        });
    }
    $(document).on('click', '#toggle_btn', function() {
        if ($('body').hasClass('mini-sidebar')) {
            $('body').removeClass('mini-sidebar');
            $('.subdrop + ul').slideDown();
        } else {
            $('body').addClass('mini-sidebar');
            $('.subdrop + ul').slideUp();
        }
        setTimeout(function() {
            mA.redraw();
            mL.redraw();
        }, 300);
        return false;
    });
    $(document).on('mouseover', function(e) {
        e.stopPropagation();
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
            var targ = $(e.target).closest('.sidebar').length;
            if (targ) {
                $('body').addClass('expand-menu');
                $('.subdrop + ul').slideDown();
            } else {
                $('body').removeClass('expand-menu');
                $('.subdrop + ul').slideUp();
            }
            return false;
        }
    });
}
)(jQuery);
// for map
$(document).ready(function() {
    var map = L.map('map').setView([16.817, 96.1590], 12);
  
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);
  
    map.on('click', function(e) {
      var latitude = e.latlng.lat;
      var longitude = e.latlng.lng;
  
      $('#latitude').val(latitude);
      $('#longitude').val(longitude);
  
      // Clear existing markers (if any)
      map.eachLayer(function(layer) {
        if (layer instanceof L.Marker) {
          map.removeLayer(layer);
        }
      });
  
      // Add a marker at the clicked location
      L.marker([latitude, longitude]).addTo(map);
    });
  });
  //   end map
$(document).ready(function(){
    $('.avtupload').click(function(){
        $('.mybg').fadeToggle('slow');
        $('.avatar').toggle();
    })
})
// for text editor
ClassicEditor
.create(document.querySelector('#description'))

// end here 
function checkInputs() {
    var inputFields = document.getElementsByClassName("inputField");
  
    for (var i = 0; i < inputFields.length; i++) {
      var inputField = inputFields[i];
      var label = document.querySelector("label[for='" + inputField.id + "']");
  
      if (inputField.value === "") {
        if (!label.classList.contains("error-label")) {
          label.classList.add("error-label");
          label.innerHTML += " *";
        }
      } else {
        label.classList.remove("error-label");
        label.innerHTML = label.innerHTML.replace(" *", "");
      }
    }
  }


 //functions
 /*
    String to slug
    http://dense13.com/blog/2009/05/03/converting-string-to-slug-javascript/
*/
function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  
  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to   = "aaaaeeeeiiiioooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}
 (function($){
      $.fn.goTop = function(){
        $(this).click(function(){
              $("html, body").animate({ scrollTop: $('#contenido').offset().top + 15 }, 'slow');
              return false;
         });
            
      }
})(jQuery);

 jQuery(document).ready(function($){

    if ( window.screen.width > 600 ) {
        $grid = $('.widget-post-categories');
        $grid.imagesLoaded( function(){
            $grid.masonry({
                itemSelector: '.noticia'
            });
        });
    }
    $('.wiki-embed').find('h2').each(function(){
        var obj = $(this);
        var slug = string_to_slug(obj.text());
        obj.attr('id',slug);
        var icon = obj.find('.icn').clone().get(0);
        var h6 = $('<h6>').addClass('xs').append(obj.text()).append(icon);
        var link = $('<a>').attr('href','#'+slug).append(h6);
        var li = $('<li>').addClass("sin-estilo").append(link);
        $('.local-nav').append(li);
    });
    $('.page-contenido').find('h4').each(function(){
        var obj = $(this);
        var slug = string_to_slug(obj.text());
        obj.attr('id',slug);
        var icon = obj.find('.icn').clone().get(0);
        var h6 = $('<h6>').addClass('xs').append(obj.text()).append(icon);
        var link = $('<a>').attr('href','#'+slug).append(h6);
        var li = $('<li>').addClass("sin-estilo").append(link);
        $('.local-nav').append(li);
    });

    $('#carousel-home, #carousel-enlaces, #carousel-portada').carousel();
    //$('div#scroll-able').scrollspy({ target: '#target_nav' });
    $('.tooltip-demo').tooltip({selector: "a[data-toggle=tooltip]"});
    $('#tabla-contenido a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

    $('#popover-test').popover();
    //$('body').localScroll(2000);
    //.parallax(xPosition, speedFactor, outerHeight) options:
    //xPosition - Horizontal position of the element
    //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
    //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
    $('#parallax, .ejemplo1, .ejemplo2, .ejemplo3, .universo').parallax("50%", 0.1, true);
    $('#parallax-historia, .foto-1, .foto-2, .foto-3, .foto-4').parallax("100%", 0.1, true);
    $('#lala, .foto-5, .foto-6, .foto-7').parallax("100%", 0.1, true);
    $('#lolo, .foto-8, .foto-9, .foto-10').parallax("0%", 0.1, true);
    // $('menu-menu-principal').find('a').delegate('click',function(ev){
    //     var obj = $(this);
    //     if ( obj.hasClass('dropdown-toggle') ) {
    //         obj.next('.dropdown-menu').
    //     }
    // });
    // $('a[href*=#]').click(function() {
    //     if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {
    //         var $target = $(this.hash);
    //         console.log($target);
    //         $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

    //         if ($target.length) {
    //             var targetOffset = $target.offset().top;
    //             $('html,body').animate({scrollTop: targetOffset}, 750);
    //             return false;
    //         }
    //     }
    // });
      //Stickies
    $("#sub-componentes").sticky({topSpacing: 0});
    $("#ejemplo-sticky").sticky({topSpacing: 50});
    $("#ejemplo-sticky-2").sticky({topSpacing: 80});
    $("#ejemplo-sticky-3").sticky({topSpacing: 110});
    $("#ejemplo-sticky-4").sticky({topSpacing: 140});
    $("#ejemplo-sticky-5").sticky({topSpacing: 170});
    $("#ejemplo-sticky-6").sticky({topSpacing: 200});
    $("#ejemplo-sticky-7").sticky({topSpacing: 230});
    $("#ejemplo-sticky-8").sticky({topSpacing: 260});
    $("#ead-sticky").sticky({topSpacing: 40});
    $("#meta-barra").sticky({topSpacing: 0});
    $("#nav-page").sticky({topSpacing:30});
    $("#fondo-publicacion").sticky({topSpacing: 0});
      
    var limit_bottom=$('#titulo-post').height(); 
    $('.titulo-post').sticky({topSpacing:0, bottomSpacing:limit_bottom});

    $('a[href=#topbar]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });

    $(".go-top").goTop();

});
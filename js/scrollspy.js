jQuery(document).ready(function($){
var lastId,
    topMenu = $("#ejemplo-sticky"),
    topMenuHeight = topMenu.outerHeight()+0,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });
// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.on('click', function(e){
  console.log('lala');
  var href = $(this).attr("href"),
      offsetTop = $(href).offset().top-50;
  $('html, body').stop().animate({ 
      scrollTop: offsetTop
  }, 600);
  e.preventDefault();
});

// Bind to scroll
$(window).scroll(function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+topMenuHeight;
   
   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   
   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
       menuItems
         .parent().removeClass("active")
         .end().filter("[href=#"+id+"]").parent().addClass("active");
   }                   
});
});

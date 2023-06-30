   $(document).ready(function() {
         $('#carousel, #carousel1').carousel();

            $('span.fa-long-arrow-left').addClass('fa-angle-left').
            removeClass('fa-long-arrow-left');
            $('span.fa-long-arrow-right').addClass('fa-angle-right').
            removeClass('fa-long-arrow-right');

        $('.carousel[data-type="multi"] .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 2; i++) {
          next = next.next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));
        }
      });

 
        $('.carousel1[data-type="multi"] .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 2; i++) {
          next = next.next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));
        }
      });
     
});

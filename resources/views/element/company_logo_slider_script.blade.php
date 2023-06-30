<script>
    $('.nav').on('hide.bs.dropdown', function (e) {
        if (e.clickEvent) {
            e.preventDefault();
        }
    });
    /* ......................................................Slider Script Start .............................*/
    

$(window).on('load',function(){
        $('.carousel-showmanymoveone .item').each(function(){
            var itemToClone = $(this);
            var item_len = $('#carousel-tilenav .item').length;
            for (var i=1;i<item_len;i++) {
                itemToClone = itemToClone.next();

                // wrap around if at end of item collection
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }

                // grab item, clone, add marker class, add to collection
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-"+(i))
                    .appendTo($(this));
            }
        });
        $('.carousel1 .item').each(function(){
            var itemToClone = $(this);
            var item_len = $('#carousel1 .item').length;

            for (var i=1;i<item_len;i++) {
                itemToClone = itemToClone.next();

                // wrap around if at end of item collection
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }

                // grab item, clone, add marker class, add to collection
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-"+(i))
                    .appendTo($(this));
            }
        });
    });

    // (function(){
    //     $('.carousel1 .item').each(function(){
    //         var itemToClone = $(this);

    //         for (var i=1;i<4;i++) {
    //             itemToClone = itemToClone.next();

    //             // wrap around if at end of item collection
    //             if (!itemToClone.length) {
    //                 itemToClone = $(this).siblings(':first');
    //             }

    //             // grab item, clone, add marker class, add to collection
    //             itemToClone.children(':first-child').clone()
    //                 .addClass("cloneditem-"+(i))
    //                 .appendTo($(this));
    //         }
    //     });
    // }());
    $(function() {
        $('#carousel-tilenav,#carousel1').carousel({
            interval : 2000,
            autoplay : true
        });
       
    });
</script>

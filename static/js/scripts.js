(function($) {
    // search box open close handle
    $('li.search > .search-handle, li.search .close-handle').click(function(){
        $('.main-header nav ul').toggleClass('opened-search');
        $('li.search input').focus();
    });
    $('li.search input').keyup(function(e) {
        if (e.keyCode == 27)
            if($('.main-header nav ul').hasClass('opened-search'))
                $('.main-header nav ul').toggleClass('opened-search');
    });


    // Fix Archive page columns height
    if( ($('.archive-section .column-1').height()) > $('.archive-section .column-2').height())
        $('.archive-section .column-2').height( $('.archive-section .column-1').height() -30);
    else if( ($('.archive-section .column-1').height())< $('.archive-section .column-2').height())
        $('.archive-section .column-1').height( $('.archive-section .column-2').height()+30 );

    // FitVidJs
    $(".video-post-type").fitVids();

    // Gallery image slider with FlexSlider
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        smoothHeight: true,
        touch: true
    });

    // Custome highlights
    $(".highlights.custom").css('backgroundColor',function(){ return $(this).data('bg-color') }).css('color',function(){ return $(this).data('text-color') });

    // header menu button for responsive layout
    $('.menu-button').click(function(){
        $('header nav>ul').slideToggle('', function() {});
    });

})(jQuery);
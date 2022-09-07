// NAV BAR HOVER EFFECTS
var navPos = $('nav.desktop').position().top;

// Link Highlighting
$(window).on('scroll', function () {
    var pos = $(window).scrollTop();
    var pos2 = pos + 50;
    var scrollBottom = pos + $(window).height();

    // Link Highlighting
    if (pos2 > $('#landingimg').offset().top) {
        highlightLink('Home');
    }
    if (pos2 > $('#skills').offset().top) {
        highlightLink('Skills');
    }
    if (pos2 > $('#projects').offset().top) {
        highlightLink('Projects');
    }
    if (pos2 > $('#about').offset().top) {
        highlightLink('About');
    }
    if (
        pos2 > $('#contact').offset().top ||
        pos + $(window).height() === $(document).height()
    ) {
        highlightLink('Contact');
    }
})

function highlightLink(anchor) {
    $('nav.desktop .active').removeClass('active');
    $('nav.desktop').find('#' + anchor).addClass('active');
}

$(document).ready(function(){
    $('.toggle-btn').click(function(){
        $('#sidebar').toggleClass('active');
        $('.sidebar-menu .menu .item span').toggleClass('menu-hide');
    });
});

$(document).ready(function () {
    $('.sub-btn').click(function () {
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
    });
});
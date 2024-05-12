$(document).ready(function() {
    $('.bi-list').click(function() {
        $('.dropdown-menu').toggle(); 
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.depart-btn').length) {
            $('.dropdown-menu').hide();
        }
    });
});

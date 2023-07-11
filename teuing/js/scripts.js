$(document).ready(function () {
    $("#dropdownhead").click(function () {
        $("#dropdownhead .fa-chevron-down").toggleClass("rotate");
        $("#dropdown-menu-head").stop().slideToggle(500);
    });
});

$(document).ready(function () {
    $("#dropdownfoot").click(function () {
        $("#dropdownfoot .fa-chevron-down").toggleClass("rotate");
        $("#dropdown-menu-foot").stop().slideToggle(500);
    });
});

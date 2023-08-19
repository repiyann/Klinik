var key = document.querySelector("a.muter");
document.addEventListener("click", function (event) {
    var isClickInside = key.contains(event.target);
    if (isClickInside) {
        var icon = this.querySelector("a.head i.fa-chevron-down");
        icon.classList.toggle("rotate");
    } else {
        var icon = this.querySelector("a.head i.fa-chevron-down");
        icon.classList.remove("rotate");
    }
});

$(function () {
    $("#reservasi").datepicker({
        format: "dd/mm/yy",
        startDate: "0d",
        daysOfWeekDisabled: [0, 6],
        endDate: "+30d",
    });
});
document.getElementById("muterfoot").addEventListener("click", function () {
    var icon1 = this.querySelector("a.foot i.fa-chevron-down");
    icon1.classList.toggle("rotate");
});

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

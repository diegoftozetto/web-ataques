$(document).ready(function () {
  $('a[href$="' + location.pathname + '"]').addClass("active");
});

$("#tab-options a").click(function (e) {
  e.preventDefault();
  $(this).tab("show");
});

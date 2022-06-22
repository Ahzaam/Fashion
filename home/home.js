$(document).ready(function() {
    $('#search').click(function (e) {
        e.preventDefault();
    })
    $('#searchinput').keyup(function () {
        console.log($(this).val());
    })
})
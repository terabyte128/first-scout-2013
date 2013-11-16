//functions for hiding and showing error and success messages on pages
//these should be included in every page, along with messages.php (they are in headers.php)
//valid message types: success, danger, warning

function showMessage(message, type) {
    $("#alertError").html(message);
    $("#inputError").addClass("alert-" + type);
    $("#inputError").slideDown(250);
    window.scrollTo(0, 0);
}
function hideMessage() {
    $("#inputError").slideUp(250);
}
function loadPageWithMessage(url, message, type) {
    localStorage.message = message;
    localStorage.type = type;
    window.location = url;
}
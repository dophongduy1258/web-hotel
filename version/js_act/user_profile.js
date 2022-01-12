var thePage = {};

// $('body').on('click', '#btn_copy', function(e) {
//     /* Get the text field */
//     var copyText = document.getElementById("referral_link");

//     /* Select the text field */
//     copyText.select();
//     copyText.setSelectionRange(0, 99999); /* For mobile devices */

//     /* Copy the text inside the text field */
//     navigator.clipboard.writeText(copyText.value);

//     /* Alert the copied text */
//     alert("Copied the text: " + copyText.value);
// });

var body = document.getElementsByTagName('body')[0];
var btnCopy = document.getElementById('btnCopy');
var link = $('#link').val();

var copyToClipboard = function(link) {
    var tempInput = document.createElement('INPUT');
    body.appendChild(tempInput);
    tempInput.setAttribute('value', link)
    tempInput.select();
    document.execCommand('copy');
    body.removeChild(tempInput);
}

$('body').on('click', '#btnCopy', function(e) {
    // e.preventDefault();
    copyToClipboard(link);
    alert_void("Đã copy thành công!", 1);
    return false;
});
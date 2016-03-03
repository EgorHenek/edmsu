$(function(){
    $('.field-blogs-source_url').hide();
    $('.field-blogs-source_title').hide();
    $('.field-blogs-start_time').hide();
    $('.field-blogs-end_time').hide();
    $("#blogs-datetime_publish").removeAttr("readonly");
});
function showSource () {
    $('.field-blogs-source_url').show();
    $('.field-blogs-source_title').show();
}
function hideSource () {
    $('.field-blogs-source_url').hide();
    $('.field-blogs-source_title').hide();
}

function hideTime() {
    $('.field-blogs-start_time').hide();
    $('.field-blogs-end_time').hide();
}
function showTime() {
    $('.field-blogs-start_time').show();
    $('.field-blogs-end_time').show();
}
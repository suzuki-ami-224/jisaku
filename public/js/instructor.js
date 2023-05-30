$(function(){
$('input').on('change', function () {
var file = $(this).prop('files')[0];
$('.picture').text(file.name);
});
});

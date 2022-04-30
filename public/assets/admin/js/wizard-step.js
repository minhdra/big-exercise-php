$(document).on('click', '.js-step', function(e) {
  e.stopPropagation();
  var attrStep = $(this).attr('data-show');
  $(this).parents('.js-steps-content').hide();
  $('#'+attrStep).show();
});
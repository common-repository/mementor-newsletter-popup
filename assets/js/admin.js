jQuery(function($) {

  $(document).on('click', '.file-upload .add', function(e) {
    e.preventDefault();
    wp.media.editor.send.attachment = function(props, attachment) {
      var url = attachment.url.replace(/^.*\/\/[^\/]+/, '');
      $('input[name=mementor_newsletter_popup_image]').val(url);
      $('.preview').find('.media').css('background-image', 'url('+url+')');
    };
    wp.media.editor.open($('.file-upload .add'));
    return false;
  });

  $(document).on('click', '.file-upload .remove', function (e) {
    e.preventDefault();
    $('input[name=mementor_newsletter_popup_image]').val('');
  });

});

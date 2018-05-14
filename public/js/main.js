$(document).ready(function() {
  // Navbar active item
  let action = location.search;
  if (action == "") {
    $('a[href="index.php"]').parent().addClass('active');
  } else if (action == "?action=listPosts" || action.search(/^\?action=post/g) !== -1) {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
  } else if (action == "?action=login") {
    $('a[href="index.php?action=login"]').parent().addClass('active');
  } else if (action == "?action=listComments") {
    $('a[href="index.php?action=listComments"]').parent().addClass('active');
  } else if (action == "?action=createPost") {
    $('a[href="index.php?action=createPost"]').parent().addClass('active');
  }

  // Hide message
  let message = $('#message');

  if (message.length !== 0) {
    setTimeout(function(){
      message.fadeOut(800);
    }, 3000);
  }

  // Report comment
  $('.report').on('click', function(){
    let action="index.php?action=reportComment&id="+this.dataset.comment+"&idPost="+this.dataset.post;
    $('#reportForm').attr("action", action);
  });
});

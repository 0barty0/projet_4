$(document).ready(function() {
  // Navbar active item
  let action = location.pathname;

  if (action.search(/listPosts/g) !== -1 || action.search(/post/g) !== -1 || action.search(/modify/g) !== -1) {
    $('a[href="listPosts/"]').parent().addClass('active');
  } else if (action.search(/listComments/g) !== -1) {
    $('a[href="listComments/"]').parent().addClass('active');
  } else if (action.search(/createPost/g) !== -1) {
    $('a[href="createPost/"]').parent().addClass('active');
  } else {
    $('a[href="index.php"]').parent().addClass('active');
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
    let action="index.php?action=reportComment&id="+this.dataset.comment;
    $('#reportForm').attr("action", action);
  });

  // Reply to comment
  $('.reply').on('click', function(){
    let action="index.php?action=reply&id="+this.dataset.comment+"&idPost="+this.dataset.post;
    $('#replyForm').attr("action", action);
  });

  // Popover
  $('[data-toggle="popover"]').popover();
});

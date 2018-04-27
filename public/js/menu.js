$(document).ready(function() {
  let action = location.search;
  if (action == "") {
    $('a[href="index.php"]').parent().addClass('active');
  }
  else if (action == "?action=listPosts" || action.search(/^\?action=post/g) !== -1) {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
  }
});

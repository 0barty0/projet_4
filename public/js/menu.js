$(document).ready(function() {
  let action = location.search;
  if (action == "") {
    $('a[href="index.php"]').parent().addClass('active');
  } else if (action == "?action=listPosts" || action.search(/^\?action=post/g) !== -1) {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
  } else if (action == "?action=listComment") {
    $('a[href="index.php?action=listComment"]').parent().addClass('active');
  } else if (action == "?action=createPost") {
    $('a[href="index.php?action=createPost"]').parent().addClass('active');
  }
});

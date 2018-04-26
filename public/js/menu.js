$(document).ready(function() {
  if (location.search == "?action=listPosts") {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
  } else {
    $('a[href="index.php"]').parent().addClass('active');
  }
});

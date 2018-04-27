$(document).ready(function() {

  if (location.search == "") {
    $('a[href="index.php"]').parent().addClass('active');
  }
  else if (location.search == "?action=listPosts") {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
    
  }
});

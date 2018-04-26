$(document).ready(function() {
<<<<<<< HEAD
  if (location.search == "") {
    $('a[href="index.php"]').parent().addClass('active');
  }
  else if (location.search == "?action=listPosts") {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
=======
  if (location.search == "?action=listPosts") {
    $('a[href="index.php?action=listPosts"]').parent().addClass('active');
  } else {
    $('a[href="index.php"]').parent().addClass('active');
>>>>>>> 1cbd8f1a780d4ab653a3636325bd1872d0448806
  }
});

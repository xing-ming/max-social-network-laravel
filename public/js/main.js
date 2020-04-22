$(document).ready(function () {
  $('.like').click(function(event) {
    event.preventDefault();
    let postId = event.target.parentNode.parentNode.dataset['postId'];
    let isLike = event.target.previousElementSibling == null;
    $.ajax({
      method: 'POST',
      url: urlLike,
      data: {isLike: isLike},
      // data: $('form').serialize(),
    });
    console.log(postId);
  })
  
});
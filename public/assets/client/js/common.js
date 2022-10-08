
function addToCart(id, userId) {
  if (typeof userId == 'undefined') {
    var domain = window.location.href
    let result = domain.replace(/[.*+?^${}()|[\]\\#]/gi, function (x) {
      return '';
    });
    window.location.href = result + 'login';
  }
  $.ajax({
    type: "post",
    url: "add-cart",
    data: {
      'id': id,
      'user_id': userId
    },
    success: function (result) {
      console.log(result['status']);
    },
    error: function (e) {
      console.log(e);
    }
  });
}

function addToCart(id, userId) {
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: "POST",
    url: "add-cart",
    data: {
      id: id,
      user_id: userId
    },
    dataType: "json",
    contentType: 'application/json; charset=utf-8'
  })
    .done(function (msg) {
      alert("Data Saved: " + msg);
    });
}
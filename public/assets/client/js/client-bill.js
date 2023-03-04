
function changeCity(){
    var city = $('#user_city').val();
    var domain = window.location.href
    let result = domain.replace(/[.*+?^${}()|[\]\\#]/gi, function (x) {
        return '';
    });
    let url = result.split("/");
    let lengthUrl = url.length;
    url.splice(lengthUrl - 2, lengthUrl - 1);
    let urlNew = url.join('/');
    urlNew = urlNew + '/public/get-districts-by-city';
    $.ajax({
        type: "POST",
        url: urlNew,
        data: {
            'code_city': city,
        },
        dataType: "json",
        success: function (result) {
        },
        error: function (e) {
            console.log(e);
        }
    });
}
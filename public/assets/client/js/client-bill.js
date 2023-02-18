
$( document ).ready(function() {
        $.ajax({
            type: "GET",
            url: "https://provinces.open-api.vn/api/?depth=3",
            data: 'json',
            success: function(data){
                console.log(data);
            }
        });
});
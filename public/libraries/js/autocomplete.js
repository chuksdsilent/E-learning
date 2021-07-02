$("#search_item").keydown(function () {
    const query = $(this).val();
    if (query !== ''){

        axios({
            method: 'get',
            url: 'http://'+location.hostname+'/api/autocomplete/?query=' + query,
            responseType: 'application/json',
        })
            .then(function (response) {
                console.log(response);
                $("#suggest").empty();
                $("#suggest").slideDown();
                $("#suggest").html(response.data);
            })
            .catch(function (error) {
                // handle error
                if (error.response.status === 401) {
                    console.log("Unauthorized Access");
                }
            })
            .finally(function () {
                // always executed
            });
    }
});

$("li").click(function () {
});
$(document).on('click','.suggest-list',function () {
    $("#search_item").val($(this).text());
    $("#suggest").fadeOut();
});
$(document).on('click','body',function () {
    $("#suggest").fadeOut();
});

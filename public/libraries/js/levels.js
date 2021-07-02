$("#school").change(function () {
    const fac = $("#school").val();
    const level = $("#level");
    getLevel(fac, level)
})
$("#profile_school").change(function () {
    const fac = $("#profile_school").val();
    const level = $("#profile_level");
    getLevel(fac, level)
})
function getLevel(fac, level) {

    let options = "";
    level.empty();
    level.html("<option id='loading'>Loading...</option>");
    axios({
        method: 'get',
        url:  'https://'+location.hostname+ '/api/level/' + fac,
        responseType: 'application/json',
    })
        .then(function (response) {
            console.log(response);
            console.log(response.data.length);
            if (response.data.length > 0) {

                options = "<option value=''>Select Level</option>";
                options += response.data;

                level.html(options);
                // level.empty();

                // level.append(options);
                level.html(options);
            } else {
                console.log("nothing");
                level.empty();
                options += "<option value=''>No level Found</options>";
                level.append(options);
            }
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
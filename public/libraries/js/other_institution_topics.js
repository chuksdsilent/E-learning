

$("#institution").change(function () {
    const institution = $("#institution");
    const level = $("#level");
    const course = $("#course");

    let options = "";

    level.empty();
    level.append("<option id='loading'>Loading...</option>");
    axios({
        method: 'get',
        url: 'institution/' + institution.val(),
        responseType: 'application/json',
    })
        .then(function (response) {
            console.log(response);
            if (response.data.data.length > 0) {
            console.log("weting")
                options = "<option>Select Level</option>";
                options += response.data.data;

                console.log(options);
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
});



$("#level").change(function () {
    const institution = $("#institution");
    const level = $("#level");
    const course = $("#course");

    let options = "";

    course.empty();
    course.append("<option id='loading'>Loading...</option>");

    axios({
        method: 'get',
        url: 'course/?ins=' + institution.val() + "&level=" + level.val(),
        responseType: 'application/json',
    })
        .then(function (response) {
            console.log(response);
            if (response.data.data.length > 0) {
                options = "<option>Select Course</option>";
                options += response.data.data;

                console.log(options);

                course.html(options);
            } else {
                console.log("nothing");
                course.empty();
                options += "<option value=''>No Course Found</options>";
                course.append(options);
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
});

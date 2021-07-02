$("#institution-name").change(function () {
    const institution_name = $("#institution-name").val();
    let level = $("#otherlevels");
    let options;
    //Make a request for a user with a given ID
    if (institution_name !== "") {
        level.empty();
        level.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'level/' + institution_name,
            responseType: 'application/json',
        })
            .then(function (response) {
                if (response.data.length > 0) {
                    options = "<option>Select Level</option>";
                    options += response.data;
                    // fac.empty();
                    console.log()
                    // fac.append(options);
                    level.html(options);
                } else {
                    console.log("nothing");
                    level.empty();
                    options += "<option value=''>No Level Found</options>";
                    level.append(options);
                }
            })
            .catch(function (error) {
                // handle error
                if (error.status === 401) {
                    console.log("Unauthorized Access");
                }
            })
            .finally(function () {
                // always executed
            });

    }
})

$("#otherlevels").change(function () {
    let institution = $("#institution-name").val();
    let levels = $("#otherlevels").val();
    let course = $("#othercourse");
    let options;
    getCourse(institution, levels, options, course);
})

var getCourse = (institution, levels, options, course) => {
    //Make a request for a user with a given ID
    if (levels !== "") {

        course.empty();
        course.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: '/course/?ins=' + institution + '&level=' + levels,
            responseType: 'application/json',
        })
            .then(function (response) {
                // handle success
                if (response.data.data.length > 0) {
                    console.log(response)
                    options = "<option value=''>Select Course</options>";
                    options += response.data.data;

                    course.empty();
                    course.append(options);
                } else {
                    console.log("nothing");
                    course.empty();
                    options += "<option value=''>No Course Found</options>";
                    course.append(options);
                }
                dept.empty();
                dept.append(options);
            })
            .catch(function (error) {
                // handle error

            })
            .finally(function () {
                // always executed
            });

    }
}

$("#course").change(function () {
    let course = $("#course").val();
    let topic = $("#topic");
    let options;
    // getTopic(course, options, topic );
})

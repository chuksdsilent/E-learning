$("#topic_uni_id").change(function(){
    var uni = $("#topic_uni_id").val();
    var fac = $("#topic_fac_id");
    var options;
    //Make a request for a user with a given ID
    if(uni !== ""){

        fac.empty();
        fac.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'faculties/'+ uni,
            responseType: 'application/json',
        })
            .then(function (response) {
                if(response.data.length > 0){
                    options = "<option>Select Faculty</option>";
                    response.data.forEach(element => {
                        options += "<option value="+element.fac_id+">" + element.name + "</options>";
                    });
                    // fac.empty();

                    // fac.append(options);
                    fac.html(options);
                }else{
                    console.log("nothing");
                    fac.empty();
                    options += "<option value=''>No Faculty Found</options>";
                    fac.append(options);
                }
            })
            .catch(function (error) {
                // handle error
                if(error.response.status === 401){
                    console.log("Unauthorized Access");
                }
            })
            .finally(function () {
                // always executed
            });

    }
})

$("#topic_fac_id").change(function(){
    let uni = $("#topic_uni_id").val();
    alert(uni);
    let fac = $("#topic_fac_id").val();
    let dept = $("#topic_dept_id");
    let options;
    getDepartments(fac, dept, options, uni);
})

var getDepartments = (fac, dept, options, uni) => {
    //Make a request for a user with a given ID
    if(fac !== ""){
        dept.empty();
        dept.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'departments/?fac_id='+ fac + '&uni_id=' + uni,
            responseType: 'application/json',
        })
            .then(function(response) {
                // handle success
                if(response.data.length > 0){
                    options = "<option value=''>Select Department</options>";
                    response.data.forEach(element => {
                        options += "<option value="+element.dept_id+">" + element.name + "</options>";
                    });
                    dept.empty();
                    dept.append(options);
                }else{
                    console.log("nothing");
                    dept.empty();
                    options += "<option value=''>No Department Found</options>";
                    dept.append(options);
                }
                dept.empty();
                dept.append(options);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
                if(error.response.status === 401){
                    console.log("Unauthorized Access");
                }
            })
            .finally(function () {
                // always executed
            });

    }
}


$("#topic_dept_id").change(function(){
    let uni = $("#topic_uni_id").val();
    let fac = $("#topic_fac_id").val();
    let dept = $("#topic_dept_id").val();
    let course = $("#topic_course_id");
    let options;
    getCourses(fac, dept, options, uni, course);
})

var getCourses = (fac, dept, options, uni, course) => {
    //Make a request for a user with a given ID
    if(fac !== ""){
        course.empty();
        course.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'courses/?fac_id='+ fac + '&uni_id=' + uni +'&dept_id=' + dept,
            responseType: 'application/json',
        })
            .then(function(response) {
                // handle success
                if(response.data.length > 0){
                    options = "<option value=''>Select Course</options>";
                    response.data.forEach(element => {
                        options += "<option value="+element.course_id+">(" + element.course_code + ") " + element.name + "</options>";
                    });
                    course.empty();
                    course.append(options);
                }else{
                    course.empty();
                    options += "<option value=''>No Course Found</options>";
                    course.append(options);
                }
                course.empty();
                course.append(options);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
                if(error.response.status === 401){
                    console.log("Unauthorized Access");
                }
            })
            .finally(function () {
                // always executed
            });

    }
}


$("#course_id").change(function(){
    let uni = $("#uni").val();
    let fac = $("#fac_id").val();
    let dept = $("#dept_id").val();
    let course = $("#course_id").val();
    let topic = $("#topic_id");
    let options;
    getTopic(fac, dept, options, uni, course, topic);
})

var getTopic = (fac, dept, options, uni, course, topic) => {
    //Make a request for a user with a given ID
    if(fac !== ""){
        topic.empty();
        topic.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'topics/?course_id='+ course + '&fac_id='+ fac + '&uni_id=' + uni +'&dept_id=' + dept,
            responseType: 'application/json',
        })
            .then(function(response) {
                // handle success
                if(response.data.length > 0){
                    options = "<option value=''>Select Topic</options>";
                    response.data.forEach(element => {
                        options += "<option value="+element.topic_id+">" + element.name + "</options>";
                    });
                    topic.empty();
                    topic.append(options);
                }else{
                    topic.empty();
                    options += "<option value=''>No Course Found</options>";
                    topic.append(options);
                }
                topic.empty();
                topic.append(options);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
                if(error.response.status === 401){
                    console.log("Unauthorized Access");
                }
            })
            .finally(function () {
                // always executed
            });

    }
}
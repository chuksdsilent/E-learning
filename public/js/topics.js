$("#uni_id").change(function(){
    let uni = $("#uni_id").val();
    let fac = $("#fac_id");
    let dept = $("#dept_id");
    let options;
    dept.empty();
    dept.append("<option id='loading'>Select Department</option>");
    getFaculties(uni, fac, dept, options);
})

var getFaculties = (uni, fac, dept, options) => {

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
                options = "<option value=''>Select Faculty</options>";
                response.data.forEach(element => {
                    options += "<option value="+element.fac_id+">" + element.name + "</options>";
                });
                fac.empty();
                fac.append(options);
            }else{
                console.log("nothing");
                fac.empty();
                options += "<option value=''>No Faculty Found</options>";
                fac.append(options);
            }
        })
        .catch(function (error) {
            if(error.response.status === 401){
                console.log("Unauthorized Access");
            }
        })
        .finally(function () {
            // always executed
        });
        
    }
}

$("#fac_id").change(function(){
    let uni = $("#uni_id").val();
    let fac = $("#fac_id").val();
    let dept = $("#dept_id");
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


$("#dept_id").change(function(){
    let uni = $("#uni_id").val();
    let fac = $("#fac_id").val();
    let dept = $("#dept_id").val();
    let course = $("#course_id");

    let options;
    getCourses(fac, dept, options, uni, course);
})

var getCourses = (fac, dept, options, uni, course) => {
    //Make a request for a user with a given ID
    if(dept !== ""){
        course.empty();
        course.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'courses/?dept_id='+ dept + '&fac_id='+ fac +'&uni_id=' + uni,
            responseType: 'application/json',
        })
        .then(function(response) {
            // handle success
            if(response.data.length > 0){
                options = "<option value=''>Select Course</options>";            
                response.data.forEach(element => {
                options += "<option value="+element.course_id+">" + element.name + "</options>";
                });
                course.empty();
                course.append(options);
            }else{
                console.log("nothing");
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
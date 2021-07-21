$("#uni").change(function(){
    var uni = $("#uni").val();
    var fac = $("#fac_id");
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

$("#fac_id").change(function(){
    let uni = $("#uni").val();
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
            url: 'departments?fac_id='+ fac,
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

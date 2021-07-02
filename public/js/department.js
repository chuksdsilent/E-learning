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

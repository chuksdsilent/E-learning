$("#subject").change(function(){
    let subject = $("#subject").val();
    let sec_topic = $("#secnd_topic");
    let options;
    //Make a request for a user with a given ID
    if(subject !== ""){

        sec_topic.empty();
        sec_topic.append("<option id='loading'>Loading...</option>");
        axios({
            method: 'get',
            url: 'sec/topic/'+ subject,
            responseType: 'application/json',
        })
            .then(function (response) {
                console.log(response);
                if(response.data.length > 0){
                    options = "<option>Select Topic</option>";
                    response.data.forEach(element => {
                        options += "<option value="+element.topic_id+">" + element.topic_name + "</options>";
                    });
                    // fac.empty();

                    // fac.append(options);
                    sec_topic.html(options);
                }else{
                    console.log("nothing");
                    sec_topic.empty();
                    options += "<option value=''>No Topic Found</options>";
                    sec_topic.append(options);
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

axios.defaults.baseURL = 'http://' + location.hostname + '/api';
axios.defaults.headers.common['Authorization'] = $("#token").val();
axios.defaults.headers.post['Content-Type'] = 'application/json';
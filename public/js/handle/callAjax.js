const callAjax = function (url, method, data, callback) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (response) {
            callback(response);
        },
        error: function (error) {
            console.log(error);
        }
    })
}

export default callAjax;
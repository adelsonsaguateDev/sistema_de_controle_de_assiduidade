$(function() {
    flatpickr(".date", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        maxDate: 'today'
    });

    var date1 = $(".start_date").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        defaultDate: 'today',
        onChange: function(selectedDates, dateStr, instance) {
            date2.set('minDate', dateStr)
        }
    });

    var date2 = $(".end_date").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr, instance) {
            date1.set('maxDate', dateStr)
        }
    });

})

function base_url_function() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/'; 
    } else {
        var url = location.origin+"/";
    }
    return url;
}

function showLoader() {
    setTimeout(function() {
        $('.loader-bg').fadeIn();
    }, 500);
}

function hideLoader() {
    setTimeout(function() {
        $('.loader-bg').fadeOut();
    }, 500);
}
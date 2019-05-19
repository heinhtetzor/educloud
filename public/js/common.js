$(document).ready(function() {
    updateLocation();
});

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            $("#test").val(position.coords.latitude);
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function updateLocation() {
    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/location/update',
        method: 'POST',
        data: {
            lat: getLocation("lat"),
            long: getLocation("long"),
        },
        success: function(success) {
            console.log(success);
        }
    })*/
}
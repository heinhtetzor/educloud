"use strict";

var lat, long;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(updateLocation);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
}

function showPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    
}

$(document).ready(function() {
    getLocation();
});

function updateLocation(position) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/location/update',
        method: 'POST',
        data: {
            lat: position.coords.latitude,
            long: position.coords.longitude,
        },
        success: function(success) {
            console.log(success);
        }
    })
}

"use strict";

// GOOGLE MAP
if (typeof google !== 'undefined')
{
    var pickup_map;
    var destination_map;
    var currPickupLatlng;
    var currDesLatlng;
    var distance;

    function initMap() {
        var platlng = new google.maps.LatLng(10.3181, 123.9050);
        var dlatlng = new google.maps.LatLng(9.4703, 123.3743);
        var pmapOptions = {
            zoom: 16,
            center: platlng
        }
        var dmapOptions = {
            zoom: 16,
            center: dlatlng
        }

        pickup_map = new google.maps.Map(document.getElementById('pickup_map'), pmapOptions);
        destination_map = new google.maps.Map(document.getElementById('destination_map'), dmapOptions);

        var defaultBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(10.3167, 123.8907),
                new google.maps.LatLng(10.3333, 123.9333));

        var options = {
            bounds: defaultBounds
        };
        var options2 = {
            bounds: defaultBounds
        };

        var pickup_input = document.getElementById('pickupLocation');
        var pickup_autocomplete = new google.maps.places.Autocomplete(pickup_input, options);
        var destination_input = document.getElementById('destination');
        var destination_autocomplete = new google.maps.places.Autocomplete(destination_input, options2);

        // var autocomplete = new google.maps.places.Autocomplete(input);
        pickup_autocomplete.bindTo('bounds', pickup_map);
        destination_autocomplete.bindTo('bound', destination_map);

        var pickup_marker = new google.maps.Marker({
            map: pickup_map,
            position: platlng,
            draggable: true,
            animation: google.maps.Animation.DROP
        });
        var destination_marker = new google.maps.Marker({
            map: destination_map,
            position: dlatlng,
            draggable: true,
            animation: google.maps.Animation.DROP
        });

        pickup_marker.setVisible(true);
        destination_marker.setVisible(true);

        google.maps.event.addListener(pickup_autocomplete, 'place_changed', function() {
            pickup_marker.setVisible(false);
            var place = pickup_autocomplete.getPlace();
            if (!place.geometry) {
              return;
            }

            // If the place has a geometry, then present it on a pickup_map.
            if (place.geometry.viewport) {
              pickup_map.fitBounds(place.geometry.viewport);
            } else {
              pickup_map.setCenter(place.geometry.location);
              pickup_map.setZoom(17);  // Why 17? Because it looks good.
            }
            
            pickup_marker.setPosition(place.geometry.location);
            pickup_marker.setVisible(true);

            var currentLat = pickup_marker.getPosition().lat();
            var currentLng = pickup_marker.getPosition().lng();

            currPickupLatlng = new google.maps.LatLng(currentLat, currentLng);
            
            if(currDesLatlng) {
                distance = google.maps.geometry.spherical.computeDistanceBetween (currPickupLatlng, currDesLatlng);
                calculateEstimate(distance, currPickupLatlng, currDesLatlng);
            }
        });

        google.maps.event.addListener(destination_autocomplete, 'place_changed', function() {
            destination_marker.setVisible(false);
            var place = destination_autocomplete.getPlace();
            if (!place.geometry) {
              return;
            }

            // If the place has a geometry, then present it on a pickup_map.
            if (place.geometry.viewport) {
              destination_map.fitBounds(place.geometry.viewport);
            } else {
              destination_map.setCenter(place.geometry.location);
              destination_map.setZoom(17);  // Why 17? Because it looks good.
            }
            
            destination_marker.setPosition(place.geometry.location);
            destination_marker.setVisible(true);

            var currentLat = destination_marker.getPosition().lat();
            var currentLng = destination_marker.getPosition().lng();

            currDesLatlng = new google.maps.LatLng(currentLat, currentLng);

            if(currPickupLatlng) {
                distance = google.maps.geometry.spherical.computeDistanceBetween (currPickupLatlng, currDesLatlng);
                calculateEstimate(distance, currPickupLatlng, currDesLatlng);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', initMap);
}
// END GOOGLE MAP

var today = new Date();
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    clear: 'Clear',
    close: 'Ok',
    today: '',
    formatSubmit: 'yyyy-mm-dd',
    closeOnSelect: false, // Close upon selecting a date,
    disable: [
            { from: [2016,1,1], to: new Date(today.getTime() + 1*24*60*60*1000) } // active day after tomorrow
        ],
    min: -15,
    hiddenName: true,
    showOn: 'button'
  });

// This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026
(function(a, b, c) {
    if (c in b && b[c]) {
        var d, e = a.location,
            f = /^(a|html)$/i;
        a.addEventListener("click", function(a) {
            d = a.target;
            while (!f.test(d.nodeName)) d = d.parentNode;
            "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d.href)
        }, !1)
    }
})(document, window.navigator, "standalone")


$.log = function(message) {
  var $logger = $("#logger");
  $logger.html($logger.html() + "\n * " + message );
}

/*
* Animate the page to scroll smoothly to an element
*
* @param {String} elementSelector Css selector of the element
*
*/
function smoothScrollTo(elementSelector) {
    
    // var topOffset = $(elementSelector).offset().top;
    // $('body, html').animate({
    //         scrollTop: topOffset
    //     }, speed,removeHash);
    var speed = 618;

    $('#form-container').show();
    $('#cover-flexes').fadeOut("fast");
    $('#summary-container').slideUp("swing");

    if (typeof google !== 'undefined')
    {
        google.maps.event.trigger(pickup_map, 'resize');
        google.maps.event.trigger(destination_map, 'resize');
    }
}

function smoothScrollToTop() {
    var speed = 618;
    $('#summary-container').slideDown("swing", function showNext() {
        $('#cover-flexes').fadeIn("swing");
    });

    setTimeout(function() {
        $('#form-container').hide();
    }, speed+100);

    window.scrollTo(0,0);
}

/*
* Remove the hash from the address bar
*
*/
function removeHash(){
    history.pushState('', document.title, window.location.pathname);
}

function calculateEstimate(distance, pickupLatlng, desLatlng) {
    var kms = distance / 1000;
    var tourType = $('#tourType').val();
    var vanPrice;
    var sedanPrice;
    var percRate = 0.35; //default

    if(kms < 20) { percRate = 1; }

    if(tourType == "2") { // One-way trip
        vanPrice = Math.round((430 * (kms/10)) + 650); 
        sedanPrice = Math.round((360 * (kms/10)) + 450);
    }
    else { // Round trip
        vanPrice = Math.round((((430 * percRate) + 430) * (kms/10)) + 650); 
        sedanPrice = Math.round((((360 * percRate) + 360) * (kms/10)) + 450);
    }

    var bdVanCount = parseInt($('#bdVanCount').text());
    var bdSedanCount = parseInt($('#bdSedanCount').text());

    (bdVanCount != "0") ? $('#bd-vanPrice').text('Per Van: Php' + vanPrice.toFixed(2)) 
                        : $('#bd-vanPrice').text('Per Van: Php0.00');
    (bdSedanCount != "0") ? $('#bd-sedanPrice').text('Per Car: Php' + sedanPrice.toFixed(2)) 
                        : $('#bd-sedanPrice').text('Per Car: Php0.00');

    var subtotal = (vanPrice * bdVanCount) + (sedanPrice * bdSedanCount);
    $('#bd-subtotal').text('Sub-total: Php' + subtotal.toFixed(2));

    var platlng = pickupLatlng.lat() + "," + pickupLatlng.lng();
    var dlatlng = desLatlng.lat() + "," + desLatlng.lng();

    $.ajax({
        url:"dist.php ",
        type:"POST",
        data: {
          distance: distance,
          platlng: platlng,
          dlatlng: dlatlng,
        }, 
        success: function(response) {
       },
       error:function(){
        alert("Message: ajax post.");
       } 
    });
}

$(document).ready(function() {
    $('#form-container').hide();
    $('select').material_select();
    var top = $(window).scrollTop()+$(window).height();

    // Click on the arrow will make the page scroll and hide the header image
    ///--
    // $('.book-button').on('click',function(e){
    //     e.preventDefault();
    //     smoothScrollTo('#form-container');
    // });

    $('select').material_select();

});

$('#vanCount').on('change', function() {
    $('#bdVanCount').text(this.value);
    if(distance) { calculateEstimate(distance, currPickupLatlng, currDesLatlng); }
});

$('#sedanCount').on('change', function() {
    $('#bdSedanCount').text(this.value);
    if(distance) { calculateEstimate(distance, currPickupLatlng, currDesLatlng); }
});

$('#tourType').on('change', function() {
    $('#bd-tourType').text($('#tourType option:selected').text());

    if(distance) { calculateEstimate(distance, currPickupLatlng, currDesLatlng); }
});

// Right Sidebar
$('.open-right').sideNav({ // Trigger id
    menuWidth: $(window).width(), // Default is 240
    edge: 'right', // Choose the horizontal origin
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
});

// Left Sidebar
$('.open-left').sideNav({ // Trigger id
    menuWidth: 240, // Default is 240
    edge: 'left', // Choose the horizontal origin
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
});

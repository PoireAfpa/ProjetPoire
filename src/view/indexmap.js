"use strict"

// Initialize and add the map
function initMap() {
    // The location of ABI company : 48.14854312023448, -1.7578956309311413
    const abi = { lat: 48.14854312023448, lng: -1.7578956309311413 }; 
    // The map, centered at ABI location
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: abi,
    });
    // The marker, positioned at ABI company
    const marker = new google.maps.Marker({
      position: abi,
      map: map,
    });
  }
  
mapboxgl.accessToken = 'pk.eyJ1IjoieG1lc2siLCJhIjoiY2xsZTBrdDFxMGliMjNzbWdpeDRzNWMwaCJ9.ov454YZw8oCBGPEb31aPlw';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v12',
    center: [5, 50.6],
    zoom: 7.3
});

map.addControl(
    new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true,
        showUserHeading: true
    })
);

const nav = new mapboxgl.NavigationControl();
map.addControl(nav);

var directions = new MapboxDirections({
    accessToken: 'pk.eyJ1IjoieG1lc2siLCJhIjoiY2xsZTBrdDFxMGliMjNzbWdpeDRzNWMwaCJ9.ov454YZw8oCBGPEb31aPlw',
    unit: 'metric',
    profile: 'mapbox/driving'
});

map.addControl(directions, 'top-left');
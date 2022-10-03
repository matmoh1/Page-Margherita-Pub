var geo = navigator.geolocation;
var detect = document.getElementById('detect');
var PI = 3.141592;
var multiplier = 111.3214;
// Wola Park
var X1 = 52.24206;
var Y1 = 20.93120;
// Restauracja gruzińska - rembertów
var Xr = 52.26191306646666;
var Yr = 21.16376692069518;
// Restauracaj Morso - Wilanów
var Xw = 52.15614543279274;
var Yw = 21.070606907067603;

var distance = 0;
var distanceR = 0;
var distanceW = 0;

var nearest = 0;
const spanNearest = document.querySelector('.nearest');
const htmlNearest = ['111 222 333',
                    '123 123 123',
                    '333 222 111'];
if(geo) {
    geo.getCurrentPosition(function(location) {
        // zapisanie szerokości i długości geograficznej do zmiennych
        var X2 = location.coords.latitude;
        var Y2 = location.coords.longitude;
        //Obliczanie odległości
        distance =Math.sqrt(Math.pow(X2 - X1, 2) + Math.pow(Math.cos((X1 * PI)/180) * (Y2-Y1), 2))  * multiplier;
        distanceR =Math.sqrt(Math.pow(X2 - Xr, 2) + Math.pow(Math.cos((Xr * PI)/180) * (Y2-Yr), 2))  * multiplier;
        distanceW =Math.sqrt(Math.pow(X2 - Xw, 2) + Math.pow(Math.cos((Xw * PI)/180) * (Y2-Yw), 2))  * multiplier;

        if (distance <= distanceR && distance <= distanceR){
            nearest = 0;
        }
        else if (distanceR <= distance && distanceR <= distanceW){
            nearest = 1;
        }
        else{
            nearest = 2;
        }

    });
        
} 
else {
    console.log('The location is not available');
}

spanNearest.innerHTML=htmlNearest[nearest];
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
var message = "";

var nearest = 0;
const divNearest = document.querySelector('.nearest');
const htmlNearest = ['<h2>Najbliższa restauracja znajduje się w dzielnicy <span class="discrict">Wola</span></h2><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.083808837635!2d20.928954515980223!3d52.24186136455661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecb0fe0ae4639%3A0x683597020ca7f690!2sWola%20Park!5e0!3m2!1spl!2spl!4v1655824652371!5m2!1spl!2spl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    '<h2>Najbliższa restauracja znajduje się w dzielnicy <span class="discrict">Rembertów</span></h2><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19535.84943760392!2d21.1385327!3d52.2618868!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ed1d2f3574a97%3A0x92c1e886d08d0344!2sRestauracja%20Gruzi%C5%84ska%20Ad%C5%BCaria%20Piekarnia%20%26%20Cukiernia!5e0!3m2!1spl!2spl!4v1656241914833!5m2!1spl!2spl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    '<h2>Najbliższa restauracja znajduje się w dzielnicy <span class="discrict">Wilanów</span></h2><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19582.83297731094!2d21.0372359!3d52.1551626!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47192d661d3c0001%3A0xda3f72ecbbc69bee!2sRestauracja%20&#39;Morso&#39;!5e0!3m2!1spl!2spl!4v1656241958071!5m2!1spl!2spl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'];
if(geo) {
    geo.getCurrentPosition(function(location) {
        // zapisanie szerokości i długości geograficznej do zmiennych
        var X2 = location.coords.latitude;
        var Y2 = location.coords.longitude;
        //Obliczanie odległości
        distance =Math.sqrt(Math.pow(X2 - X1, 2) + Math.pow(Math.cos((X1 * PI)/180) * (Y2-Y1), 2))  * multiplier;
        distanceR =Math.sqrt(Math.pow(X2 - Xr, 2) + Math.pow(Math.cos((Xr * PI)/180) * (Y2-Yr), 2))  * multiplier;
        distanceW =Math.sqrt(Math.pow(X2 - Xw, 2) + Math.pow(Math.cos((Xw * PI)/180) * (Y2-Yw), 2))  * multiplier;
        // console.log(distance);
        message = `Restauracje znajdują się w odległości:\nRestauracja w Woli - ${distance.toFixed(2)}km,\nRestauracja w Rembertowie - ${distanceR.toFixed(2)}km,\nRestauracja w Wilanowie - ${distanceW.toFixed(2)}km.\n\n`;
        
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
    
    detect.addEventListener('click', function() {
        if (distance <= 5 || distance <= 5 || distance <= 5) {
            alert(`${message} Zapraszamy! Jesteśmy tuż za rogiem ;)`)
        }
        else {
            alert(`${message} Czekamy na Ciebie`)
        }
    });
        
} 
else {
    console.log('Lokalizacja jest niedostępna');
}

divNearest.innerHTML=htmlNearest[nearest];
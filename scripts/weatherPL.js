var degree = document.querySelector(".degree");

id = 756135 //id Warszawy
const api = `https://api.openweathermap.org/data/2.5/weather?id=${id}&appid=6867179f6962f335abf90b69743a848f`;

fetch(`${api}`)
.then(response => response.json())
.then(data => {
    var temp = "Aktualna temperatura: " + (data['main']['temp'] - 273.15).toFixed(2) + " &#x2103";
    degree.innerHTML = temp;
})
.catch(err => alert("Weather API problem"))

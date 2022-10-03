var degree = document.querySelector(".degree");
var desc = document.querySelector(".weatherDescription");

id = 756135 //id Warszawy
const api = `https://api.openweathermap.org/data/2.5/weather?id=${id}&appid=6867179f6962f335abf90b69743a848f`;

fetch(`${api}`)
.then(response => response.json())
.then(data => {
    console.log(data);
    var temp = "Current temperature: " + (data['main']['temp'] - 273.15).toFixed(2)  + " &#x2103";
    var description = "Weather description: " + data['weather'][0]['description'];
    degree.innerHTML = temp;
    desc.innerHTML = description;
})
.catch(err => alert("Weather API problem"))

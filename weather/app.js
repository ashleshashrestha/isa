const apiKey = '973e8385ff772e226758580362d6f378';

function getWeather(city) {
  // Construct the API URL
  const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

  // Fetch the weather data from the API
  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      // Extract the relevant weather information from the API response
      const cityName = data.name;
      const temperature = data.main.temp;
      const humidity = data.main.humidity;
      const { icon, description } = data.weather[0];
      const rainfall = data.rain ? `${data.rain["1h"]} mm/h` : "N/A";
      const windSpeed = data.wind.speed;
      const{dt}=data;

      //Date section starts frome here
      const date = new Date(dt * 1000);

      const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      const dayOfWeek = daysOfWeek[date.getDay()];
      const dateString = `${date.toLocaleDateString()}, ${dayOfWeek}`;
 

      // Update the HTML with the weather information
      document.querySelector('.weather-info h2').textContent = cityName;
      document.querySelector('.temp').textContent = `Temperature: ${temperature}°C`;
      document.querySelector('.humidity').textContent = `Humidity: ${humidity}%`;
      document.querySelector('.description').textContent = `Weather Description: ${description}`;
      document.querySelector(".icon").src = "https://openweathermap.org/img/wn/" + icon + ".png";
      document.querySelector('.rainfall').textContent = `Rainfall: ${rainfall}`;
      document.querySelector('.wind-speed').textContent = `Wind Speed: ${windSpeed} m/s`;
      document.querySelector(".dt").innerText ="Date and Day: " + dateString + " UTC";
 
     
    })
    .catch(error => {
      // If there's an error fetching the weather data, display an error message
      document.querySelector('.weather-info h2').textContent = 'Error';
      document.querySelector('.temp').textContent = '';
      document.querySelector('.humidity').textContent = '';
      document.querySelector('.description').textContent = error.message;
      
    });
}

// Attach an event listener to the form to fetch weather data when the form is submitted
const form = document.querySelector('form');
form.addEventListener('submit', event => {
  event.preventDefault();
  const cityInput = document.querySelector('input[type="text"]');
  const city = cityInput.value.trim();
  getWeather(city);
});

getWeather("putalibazar");
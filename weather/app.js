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
      const description = data.weather[0].description;
      const rainfall = data.rain ? `${data.rain["1h"]} mm/h` : "N/A";
      const windSpeed = data.wind.speed;

 

      // Update the HTML with the weather information
      document.querySelector('.weather-info h2').textContent = cityName;
      document.querySelector('.temp').textContent = `Temperature: ${temperature}°C`;
      document.querySelector('.humidity').textContent = `Humidity: ${humidity}%`;
      document.querySelector('.description').textContent = `Weather Description: ${description}`;
      document.querySelector('.rainfall').textContent = `Rainfall: ${rainfall}`;
      document.querySelector('.wind-speed').textContent = `Wind Speed: ${windSpeed} m/s`;
 
     
    })
    .catch(error => {
      // If there's an error fetching the weather data, display an error message
      document.querySelector('.weather-info h2').textContent = 'Error';
      document.querySelector('.temp').textContent = '';
      document.querySelector('.humidity').textContent = '';
      document.querySelector('.description').textContent = error.message;
      
    });
}

function updateDateTime(timezone) {
  // Get the current date and time for the given timezone
  const now = new Date();
  const utcOffset = now.getTimezoneOffset() * 60; // Get the UTC offset in seconds
  const localTime = now.getTime() + (timezone + utcOffset) * 1000; // Calculate the local time in milliseconds
  const localDate = new Date(localTime);

  // Format the date and time string
  const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  const timeOptions = { hour: 'numeric', minute: 'numeric', hour12: true };
  const dateString = localDate.toLocaleDateString(undefined, dateOptions);
  const timeString = localDate.toLocaleTimeString(undefined, timeOptions);

  // Update the HTML with the date and time
  const datetimeElement = document.querySelector('.datetime');
  datetimeElement.textContent = `${dateString} ${timeString}`;

}

// Update the date and time every second
setInterval(updateDateTime, 1000);

// Attach an event listener to the form to fetch weather data when the form is submitted
const form = document.querySelector('form');
form.addEventListener('submit', event => {
  event.preventDefault();
  const cityInput = document.querySelector('input[type="text"]');
  const city = cityInput.value.trim();
  getWeather(city);
});

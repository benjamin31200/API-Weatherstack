/* eslint-disable no-console */
import { get } from 'axios';
import { apiKey } from 'api.js';

const getCity = document.querySelectorAll('.setCity')[0].innerText;
const getStartTime = document.querySelectorAll('.getStart')[0].innerText.split(' ')[0];
const getEndTime = document.querySelectorAll('.getEnd')[0].innerText.split(' ')[0];
const params = {
    access_key: apiKey,
    query: getCity,
    historical_date_start: getStartTime,
    historical_date_end: getEndTime,
    hourly: 1,
};
get('https://api.weatherstack.com/historical', { params })
    .then((response) => {
        const apiResponse = response.data;
        console.log(apiResponse);
        document.querySelector('.getStartTime').append(apiResponse.historical[getStartTime].date);
        document.querySelector('.getEndTime').append(apiResponse.historical[getEndTime].date);
        document.querySelector('.country').append(apiResponse.location.country);
        document.querySelector('.localtime').append(apiResponse.location.localtime.split(' ')[1]);
        document.querySelector('.region').append(apiResponse.location.region);
        document.querySelector('.timezone').append(apiResponse.location.timezone_id);
        document.querySelector('.cloudcover').append(`${apiResponse.current.cloudcover}%`);
        document.querySelector('.feelslike').append(`${apiResponse.current.feelslike}°`);
        document.querySelector('.humidity').append(`${apiResponse.current.humidity}%`);
        document.querySelector('.precip').append(`${apiResponse.current.precip}%`);
        document.querySelector('.pressure').append(`${apiResponse.current.pressure}bar`);
        document.querySelector('.temperature').append(`${apiResponse.current.temperature}°`);
        document.querySelector('.wind_degree').append(`${apiResponse.current.wind_degree}°`);
        document.querySelector('.wind_dir').append(apiResponse.current.wind_dir);
        document.querySelector('.wind_speed').append(`${apiResponse.current.wind_speed}Km`);
        document.querySelector('.avgDay1').append(`${apiResponse.historical[getStartTime].avgtemp}°`);
        document.querySelector('.maxDay1').append(`${apiResponse.historical[getStartTime].maxtemp}°`);
        document.querySelector('.minDay1').append(`${apiResponse.historical[getStartTime].mintemp}°`);
        document.querySelector('.avgDay2').append(`${apiResponse.historical[getEndTime].avgtemp}°`);
        document.querySelector('.maxDay2').append(`${apiResponse.historical[getEndTime].maxtemp}°`);
        document.querySelector('.minDay2').append(`${apiResponse.historical[getEndTime].mintemp}°`);
        document.querySelector('.moon1').append(`${apiResponse.historical[getEndTime].astro.moon_illumination}%`);
        document.querySelector('.moon2').append(`${apiResponse.historical[getEndTime].astro.moon_illumination}%`);
        const weatherIcon = document.createElement('img');
        // eslint-disable-next-line prefer-destructuring
        weatherIcon.src = apiResponse.current.weather_icons[0];
        document.querySelector('.weather').append(weatherIcon);
    }).catch((error) => {
        console.log(error);
    });

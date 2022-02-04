/* eslint-disable no-console */
import { get } from 'axios';

const getCity = document.querySelectorAll('.setCity')[0].innerText;
const getStartTime = document.querySelectorAll('.getStart')[0].innerText.split(' ')[0];
const getEndTime = document.querySelectorAll('.getEnd')[0].innerText.split(' ')[0];
const params = {
    access_key: '6d2338286c34ff04f43ca8c2a7f4bdcb',
    query: getCity,
    historical_date_start: getStartTime,
    historical_date_end: getEndTime,
    hourly: 1,
};
get('https://api.weatherstack.com/historical', { params })
    .then((response) => {
        const apiResponse = response.data;
        console.log(apiResponse);
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
        const weatherIcon = document.createElement('img');
        weatherIcon.src = apiResponse.current.weather_icons[0];
        document.querySelector('.weather').append(weatherIcon);
    }).catch((error) => {
        console.log(error);
    });

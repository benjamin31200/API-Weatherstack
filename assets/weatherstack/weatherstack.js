/* eslint-disable no-console */
import { get } from 'axios';

const getCity = document.querySelectorAll('.setCity')[0].innerText;

const params = {
    access_key: '6d2338286c34ff04f43ca8c2a7f4bdcb',
    query: getCity,
    historical_date: '2015-01-21',
    hourly: 1,
};
console.log('hello');
get('https://api.weatherstack.com/historical', { params })
    .then((response) => {
        const apiResponse = response.data;
        const getCountry = response.data.location.country;
        // const getLocalTime = response.data.location.localtime;
        // console.log(getLocalTime);
        // console.log(apiResponse);
        const country = document.createTextNode(getCountry);
        console.log(country);
        document.querySelector('.country').append(country);
    }).catch((error) => {
        console.log(error);
    });

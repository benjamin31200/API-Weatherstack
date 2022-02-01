/* eslint-disable no-restricted-syntax */
/* eslint-disable no-console */
import { get } from 'axios';

const getCity = document.querySelectorAll('.setCity')[0].innerText;

const cloudcover = [];
const params = {
    access_key: '6d2338286c34ff04f43ca8c2a7f4bdcb',
    query: getCity,
    historical_date: '2015-01-21',
    hourly: 1,
};
get('https://api.weatherstack.com/historical', { params })
    .then((response) => {
        const apiResponse = response.data.current.cloudcover;
        cloudcover.push(apiResponse);
        document.querySelectorAll('.cloudcoverCity').innerText(apiResponse);
    }).catch((error) => {
        console.log(error);
    });

/* eslint-disable no-restricted-syntax */
/* eslint-disable no-console */
import { get } from 'axios';

const getCity1 = document.querySelectorAll('.setCity1')[0].innerText;
const getCity2 = document.querySelectorAll('.setCity2')[0].innerText;

const arrayCity = [getCity1, getCity2];
for (const city of arrayCity) {
    const params = {
        access_key: '6d2338286c34ff04f43ca8c2a7f4bdcb',
        query: city,
        historical_date: '2015-01-21',
        hourly: 1,
    };
    get('https://api.weatherstack.com/historical', { params })
        .then((response) => {
            const apiResponse = response.data;
            console.log(apiResponse);
        }).catch((error) => {
            console.log(error);
        });
}

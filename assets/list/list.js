/* eslint-disable no-restricted-syntax */
/* eslint-disable no-console */
import { get } from 'axios';

const getListCity = document.querySelectorAll('.ListCity');
const getTemperature = [];
for (const city of getListCity) {
    const params = {
        access_key: '6d2338286c34ff04f43ca8c2a7f4bdcb',
        query: city.innerHTML,
    };
    get('https://api.weatherstack.com/current', { params })
        .then((response) => {
            const apiResponse = response.data.current.temperature;
            console.log(apiResponse);
        }).catch((error) => {
            console.log(error);
        });
}

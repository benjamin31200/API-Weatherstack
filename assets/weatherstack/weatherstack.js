/* eslint-disable no-restricted-syntax */
/* eslint-disable no-console */
import { get } from 'axios';

const arrayCity = [
    'Marseille',
    'Paris',
    'Bordeaux',
    'Dijon',
    'Toulon',
    'Lyon',
    'Toulouse',
    'Reims',
    'Lille',
    'Rennes',
    'Nantes',
    'Montpellier',
    'Villeurbanne',
    'Grenoble',
    'Nice',
    'Le Havre',
    'Saint-étienne',
    'Strasbourg',
    'Nîmes',
    'Angers',
];

function quotas() {
    const getSelect1 = document.querySelector('#option_city1');
    const getSelect2 = document.querySelector('#option_city2');

    for (const city of arrayCity) {
        const options = document.createTextNode(city);
        getSelect1.appendChild(options);
        getSelect2.appendChild(options);
    }

    function updateDisplay(param) {
        const params = {
            access_key: '6d2338286c34ff04f43ca8c2a7f4bdcb',
            query: param,
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
}

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
console.log(getTemperature);

const table = document.querySelector('.test');

const tableSDRMonth = document.createElement('table');
tableSDRMonth.classList.add('tableStat');
const thead = document.createElement('thead');
const tbody = document.createElement('tbody');

tableSDRMonth.appendChild(thead);
tableSDRMonth.appendChild(tbody);
table.appendChild(tableSDRMonth);

const row1 = document.createElement('tr');
const heading1 = document.createElement('th');
heading1.innerHTML = 'Département';
const heading2 = document.createElement('th');
heading2.innerHTML = 'Nombre de permanence par SDR sur le mois';

row1.appendChild(heading1);
row1.appendChild(heading2);
thead.appendChild(row1);

const row2 = document.createElement('tr');
const rowdata1 = document.createElement('td');
rowdata1.classList.add('tdSDR');
const test = apiResponse;
rowdata1.innerHTML = test;
const rowdata2 = document.createElement('td');
rowdata2.classList.add('tdQuota');
rowdata2.innerHTML = 'hello';

row2.appendChild(rowdata1);
row2.appendChild(rowdata2);
tbody.appendChild(row2);

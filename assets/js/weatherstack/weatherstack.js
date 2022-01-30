fetch("http://api.weatherstack.com/")
.then(reponse => reponse.json())
.then(data => console.table(data))
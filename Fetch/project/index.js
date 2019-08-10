document.querySelector('#text').addEventListener('click', getTextFile);
document.querySelector('#json').addEventListener('click', getJsonFile);

function getTextFile() {
    fetch('lorem.txt')
        .then(response => response.text())
        .then(data => {
        document.querySelector('#out').innerHTML += data;
    });
}

function getJsonFile() {
    fetch('article.json')
        .then(response => response.json())
        .then(data => {
        let output = "<ul>";
        data.forEach(article => {
            output += `<li>nomi: ${article.name}</li>`;
            output += `<span>malumot: ${article.description}</span><br>`;
            output += `<span>Davlat: ${article.address.country}</span><br>`;
            output += `<span>Shahar: ${article.address.city}</span><br>`;
            output += `<span>Kucha: ${article.address.street}</span><br>`;
            output += `<span>Telefon-1: ${article.address.telephone[0]}</span><br>`;
            output += `<span>Telefon-2: ${article.address.telephone[1]}</span>`;
        });
        output += "</ul>";
        document.querySelector('#out').innerHTML += output;
    });
}
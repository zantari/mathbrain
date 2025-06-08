
const dzialanie = ['+', '-', '*'];
const dlugoscTabeli = dzialanie.length;

const tresc = document.getElementById("tresc");

const komunikat = document.getElementById('komunikat');





const czyDobrze = document.getElementById("czyDobrze");


const timerHTML = document.getElementById("timer");

const startBtn = document.getElementById("start");


const twojePunkty = document.getElementById('points');

const losujButton = document.getElementById("losujButton");


let timer = null;
let sekundy = 10
let prawidlowaOdp = null;
punkty = 0;


let punktyRankingowe = 0;


function zamknij() {
    komunikat.style.display = 'none';
    window.location.reload();
}

function komunikatShow() {
    document.getElementById("trescKomunikat").textContent = `You lost with ${punkty} points (${punktyRankingowe}ranked)`;
    komunikat.style.display = 'block';

}


function losowaLiczba() {
    return Math.floor(Math.random() * 10)
}

function losoweDzialanie() {
    return Math.floor(Math.random() * dzialanie.length)
}
function iloscLiczby() {
    return Math.floor(Math.random() * 2) + 2;
}

function wykonajDzialanie2Liczb(liczba1, liczba2, zadanie) {
    if (zadanie == '+') prawidlowaOdp = liczba1 + liczba2;
    if (zadanie === '-') prawidlowaOdp = liczba1 - liczba2;
    if (zadanie === '*') prawidlowaOdp = liczba1 * liczba2;

}

function wykonajDzialanie3Liczb(liczba1, liczba2, liczba3, zadanie1, zadanie2) {
    let wynik;

    if (zadanie1 == '*') {
        wynik = liczba1 * liczba2;

        if (zadanie2 === '+') wynik = wynik + liczba3;
        if (zadanie2 === '-') wynik = wynik - liczba3;
        if (zadanie2 === '*') wynik = wynik * liczba3;
    }

    else {
        let wynik2;

        if (zadanie2 == '+') wynik2 = liczba2 + liczba3;
        if (zadanie2 === '-') wynik2 = liczba2 - liczba3;
        if (zadanie2 === '*') wynik2 = liczba2 * liczba3;


        if (zadanie1 === '+') wynik = liczba1 + wynik2;
        if (zadanie1 === '-') wynik = liczba1 - wynik2;
    }

    prawidlowaOdp = wynik;

}

function losowanie() {
    let iloscLiczb = iloscLiczby();


    if (iloscLiczb == 2) {
        let liczba1 = losowaLiczba();
        let liczba2 = losowaLiczba();
        let zadanie = dzialanie[losoweDzialanie()];
        tresc.textContent = `${liczba1} ${zadanie} ${liczba2}`;

        wykonajDzialanie2Liczb(liczba1, liczba2, zadanie);


    }


    if (iloscLiczb == 3) {
        let liczba1 = losowaLiczba();
        let liczba2 = losowaLiczba();
        let liczba3 = losowaLiczba();
        let zadanie1 = dzialanie[losoweDzialanie()];
        let zadanie2 = dzialanie[losoweDzialanie()];
        tresc.textContent = `${liczba1} ${zadanie1} ${liczba2} ${zadanie2} ${liczba3}`;

        wykonajDzialanie3Liczb(liczba1, liczba2, liczba3, zadanie1, zadanie2);


    }
    else {
        iloscLiczb = 2;
    }






}

function sprawdzOdp() {


    let odpowiedzUzytkownika = document.getElementById("odpowiedz").value;
    if (odpowiedzUzytkownika == prawidlowaOdp) {
        clearInterval(timer)

        timer = null;
        sekundy = 10;
        timerHTML.textContent = 10;
        timerfunkcja()
        punkty++;
        twojePunkty.textContent = punkty

        setTimeout(() => {
            document.getElementById("odpowiedz").value = '';
            console.log('loadnig');
            losowanie();
        }, 200);

    }
    else {

        czyDobrze.textContent = "WRONG ANSWER ";

        setTimeout(() => {

            czyDobrze.textContent = ''
        }, 3000);
    }

}

function gra() {
    startBtn.onclick = check;
    timerfunkcja();
    losowanie();
}

function check() {
    timerfunkcja();
    sprawdzOdp();

}


function timerfunkcja() {
    if (timerHTML.style.color === 'red') {
        timerHTML.style.color = "#6ab1ff";
        timerHTML.textContent = 10;
    }

    if (startBtn.textContent != 'CHECK!') {
        startBtn.textContent = 'CHECK!'


    }



    if (timer == null) {
        timer = setInterval(() => {
            if (sekundy > 0) {
                sekundy--;
                timerHTML.textContent = sekundy;
            }
            else {
                timerHTML.style.color = 'red';
                timerHTML.textContent = 'you lost :(';
                
                clearInterval(timer);
                sekundy = 10;
                timer = null;

                if(punkty<5){
                    punktyRankingowe-=3;
                }

                else if(punkty == 5){
                    punktyRankingowe+=0
                }
                else if(punkty>5 && punkty<10){
                    punktyRankingowe+=3
                    
                }

                else if(punkty>=10){
                    punktyRankingowe+=10;
                }


                komunikatShow()
                sendRankingPoints();
            }


        }, 1000);
    }


    function sendRankingPoints() {
    fetch('sendranked.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ punktyRankingowe: punktyRankingowe })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('blad ', error);
    });
}






}


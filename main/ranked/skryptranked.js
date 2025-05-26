
const dzialanie = ['dodawanie', 'odejmowanie', 'mnozenie', 'dzielenie'];
const dlugoscTabeli = dzialanie.length;
const dzialanieHTML = document.getElementById("dzialanie");
const odpowiedzUzytkownikaHTML = document.getElementById("odpowiedz");
const czyDobrze = document.getElementById("czyDobrze");
const timerHTML = document.getElementById("timer");
const twojePunkty = document.getElementById('twojePunkty');

let punkt = 0;

let rozwiazanie = null;

function randomLiczba() {

    let losowaLiczba = Math.floor(Math.random() * 10) + 1;

    return losowaLiczba;
}

function randomDzialanie() {


    let losoweDzialanie = Math.floor(Math.random() * dlugoscTabeli);
    return losoweDzialanie;
}


let i = 10;
let t = null;

function timer() {
    if (t !== null) {
        clearInterval(t);
    }
    t = setInterval(() => {
        i--;
        timerHTML.textContent = i;

        if (i == 0) {
            alert("przegrales zdobywajac " + punkt + "punktow wow");
            
            clearInterval(t);
            i = 10;
            punkt = 0;
             twojePunkty.textContent = punkt;
             clearInterval(t);
        }


    }, 1000);
}




function rownanie() {
    timer();



    let iloscLiczb = Math.floor(Math.random() * 4) + 2;





    if (iloscLiczb === 2) {

        let losoweDzialanie = randomDzialanie();
        let pierwszaLiczba = randomLiczba();
        let drugaLiczba = randomLiczba();





        if (losoweDzialanie == 0) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "=";

            rozwiazanie = pierwszaLiczba + drugaLiczba;




        }
        if (losoweDzialanie == 1) {
            dzialanieHTML.textContent = pierwszaLiczba + "-" + drugaLiczba + "=";
            rozwiazanie = pierwszaLiczba - drugaLiczba;

        }
        if (losoweDzialanie == 2) {

            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + "=";
            rozwiazanie = pierwszaLiczba * drugaLiczba;

        }

        if (losoweDzialanie == 3) {
            if (pierwszaLiczba > drugaLiczba) {

                dzialanieHTML.textContent = pierwszaLiczba + ":" + drugaLiczba + " (w przyblizeniu) =";
                rozwiazanie = Math.floor(pierwszaLiczba / drugaLiczba);
            }

            else {
                dzialanieHTML.textContent = drugaLiczba + ":" + pierwszaLiczba + "(w przyblizeniu) =";
                rozwiazanie = Math.floor(drugaLiczba / pierwszaLiczba);
            }

        }




    }




    if (iloscLiczb === 3) {
        let pierwszaLiczba = randomLiczba();
        let drugaLiczba = randomLiczba();
        let trzeciaLiczba = randomLiczba();

        let losoweDzialanie1 = randomDzialanie();
        let losoweDzialanie2 = randomDzialanie();

        //0

        if (losoweDzialanie1 == 0 && losoweDzialanie2 == 0) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "+" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba + drugaLiczba + trzeciaLiczba;

        }

        if (losoweDzialanie1 == 0 && losoweDzialanie2 == 1) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "-" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba + drugaLiczba - trzeciaLiczba;

        }

        if (losoweDzialanie1 == 0 && losoweDzialanie2 == 2) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "*" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba + drugaLiczba * trzeciaLiczba;

        }

        if (losoweDzialanie1 == 0 && losoweDzialanie2 == 3) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + ":" + trzeciaLiczba + "(w przyblizeniu) =";
            rozwiazanie = pierwszaLiczba + Math.floor(drugaLiczba / trzeciaLiczba);

        }

        //1

        if (losoweDzialanie1 == 1 && losoweDzialanie2 == 0) {
            dzialanieHTML.textContent = pierwszaLiczba + "-" + drugaLiczba + "+" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba - drugaLiczba + trzeciaLiczba;
        }

        if (losoweDzialanie1 == 1 && losoweDzialanie2 == 1) {
            dzialanieHTML.textContent = pierwszaLiczba + "-" + drugaLiczba + "-" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba - drugaLiczba - trzeciaLiczba;
        }


        if (losoweDzialanie1 == 1 && losoweDzialanie2 == 2) {
            dzialanieHTML.textContent = pierwszaLiczba + "-" + drugaLiczba + "*" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba - drugaLiczba * trzeciaLiczba;
        }

        if (losoweDzialanie1 == 1 && losoweDzialanie2 == 3) {
            dzialanieHTML.textContent = pierwszaLiczba + "-" + drugaLiczba + ":" + trzeciaLiczba + "(w przyblizeniu) =";
            rozwiazanie = pierwszaLiczba - Math.floor(drugaLiczba / trzeciaLiczba);
        }

        //2

        if (losoweDzialanie1 == 2 && losoweDzialanie2 == 0) {
            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + "+" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba * drugaLiczba + trzeciaLiczba;
        }

        if (losoweDzialanie1 == 2 && losoweDzialanie2 == 1) {
            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + "-" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba * drugaLiczba - trzeciaLiczba;
        }


        if (losoweDzialanie1 == 2 && losoweDzialanie2 == 2) {
            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + "*" + trzeciaLiczba + "=";
            rozwiazanie = pierwszaLiczba * drugaLiczba * trzeciaLiczba;
        }

        if (losoweDzialanie1 == 2 && losoweDzialanie2 == 3) {
            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + ":" + trzeciaLiczba + "(w przyblizeniu) =";
            rozwiazanie = pierwszaLiczba * Math.floor(drugaLiczba / trzeciaLiczba);
        }


        if (losoweDzialanie1 == 3) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "+" + trzeciaLiczba + "(w przyblizeniu) =";
            rozwiazanie = pierwszaLiczba + drugaLiczba + trzeciaLiczba;
        }








    }





    if (iloscLiczb === 4) {
        let pierwszaLiczba = randomLiczba();
        let drugaLiczba = randomLiczba();
        let trzeciaLiczba = randomLiczba();
        let czwartaLiczba = randomLiczba();

        let losoweDzialanie1 = randomDzialanie();

        if (losoweDzialanie1 == 0) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "+" + trzeciaLiczba + "+" + czwartaLiczba;
            rozwiazanie = pierwszaLiczba + drugaLiczba + trzeciaLiczba + czwartaLiczba;
        }

        else if (losoweDzialanie1 == 1) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "-" + trzeciaLiczba + "*" + czwartaLiczba;
            rozwiazanie = pierwszaLiczba + drugaLiczba - trzeciaLiczba * czwartaLiczba;

        }

        else if (losoweDzialanie1 == 2) {
            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + "-" + trzeciaLiczba + "+" + czwartaLiczba;
            rozwiazanie = pierwszaLiczba * drugaLiczba - trzeciaLiczba + czwartaLiczba;

        }

        else if (losoweDzialanie1 == 3) {
            dzialanieHTML.textContent = pierwszaLiczba + "+" + drugaLiczba + "*" + trzeciaLiczba + "+" + czwartaLiczba;
            rozwiazanie = pierwszaLiczba + drugaLiczba * trzeciaLiczba + czwartaLiczba;

        }

        else {
            dzialanieHTML.textContent = pierwszaLiczba + "*" + drugaLiczba + "-" + trzeciaLiczba + "-" + czwartaLiczba;
            rozwiazanie = pierwszaLiczba * drugaLiczba - trzeciaLiczba - czwartaLiczba;
        }

    }


}


function sprawdz() {
    if (odpowiedzUzytkownikaHTML.value == rozwiazanie) {
        czyDobrze.textContent = "DOBRZE";
        i = 10;
        rownanie();
        punkt++;
        twojePunkty.textContent = "TWOJE PUNKTY: " + punkt;
        odpowiedzUzytkownikaHTML.value ="";

    }
    else {
        czyDobrze.textContent = "ZLE, prawidlowa odp to " + rozwiazanie + ", -2sek";
        odpowiedzUzytkownikaHTML.value ="";
        i = i-2;
        rownanie();
    }

}

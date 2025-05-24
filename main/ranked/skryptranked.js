
const dzialanie = ['dodawanie', 'odejmowanie', 'mnozenie', 'dzielenie'];
const dlugoscTabeli = dzialanie.length;
const dzialanieHTML = document.getElementById("dzialanie");
const odpowiedzUzytkownikaHTML = document.getElementById("odpowiedz");
const czyDobrze = document.getElementById("czyDobrze");

let rozwiazanie = null;

function randomLiczba() {

    let losowaLiczba = Math.floor(Math.random() * 10) + 1;

    return losowaLiczba;
}

function randomDzialanie(){
    let losoweDzialanie = Math.floor(Math.random() * dlugoscTabeli);
    return losoweDzialanie;
}


function rownanie() {

    

    //let iloscLiczb = Math.floor(Math.random() * 4) + 2;


    let iloscLiczb = 2; //pozniej usunac



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

    if(iloscLiczb == 3){
        let pierwszaLiczba = randomLiczba();
        let drugaLiczba = randomLiczba();
        let trzeciaLiczba = randomLiczba();

        let losoweDzialanie1 = randomDzialanie();
        let losoweDzialanie2 = randomDzialanie();

        dzialanieHTML.textContent = losoweDzialanie1 + " " + losoweDzialanie2;


    }



}


function sprawdz() {
    if (odpowiedzUzytkownikaHTML.value == rozwiazanie) {
        czyDobrze.textContent = "DOBRZE";

    }
    else {
        czyDobrze.textContent = "ZLE, prawidlowa odp to " + rozwiazanie;
    }

}



let seconds = 1;

function updateTimer() {
  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const sec = seconds % 60;

  const formatted = 
    String(hours).padStart(2, '0') + ':' + 
    String(minutes).padStart(2, '0') + ':' + 
    String(sec).padStart(2, '0');

  document.getElementById('timer').textContent = formatted;
  seconds++;
}

setInterval(updateTimer, 1000);

function czasDoBazy(){
    let czasTimer = document.getElementById("timer").textContent;
    console.log(czasTimer);
    fetch('update_czas.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({czas: czasTimer})
    })
    .then(response => response.json())
    .then(data=>{
        if(data.status === 'success'){
            console.log('dodano czas');
            window.location.href='../../index.php';
        }
        else{
             console.error("blad ", data.message);
            
        }
    })
    .catch(error => {
        console.error("blad wysylaniua", error);
    })
}















function aktualizujPoziom() {
    fetch('update_poziom.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            console.log("zaktualizowano");
            window.location.href = "../../index.php";
        } else {
            console.error("blad:", data.message);
        }
    })
    .catch(error => {
        console.error("blad wysylania:", error);
    });
}


//1
function sprawdzOdp() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 10 + 10;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom(); 
         czasDoBazy()

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 10 + 10;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}













//2

function sprawdzOdp2() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 5 * 5;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez2(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 5 * 5;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}


//3


function sprawdzOdp3() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 16;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez3(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 16;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}


//4


function sprawdzOdp4() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 16;

   if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez4(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 16;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}











//5


function sprawdzOdp5() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 40;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez5(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 40;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}

//6


function sprawdzOdp6() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 26;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez6(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 26;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}



//7


function sprawdzOdp7() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 35;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez7(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 35;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}


//8

function sprawdzOdp8() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 7;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        aktualizujPoziom();
         czasDoBazy();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez8(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 7;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

        console.log('prawidlowa odp to: ' + answer);

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }


}



//9

function sprawdzOdp9() {
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 21;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        
         czasDoBazy();
        aktualizujPoziom();
    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";

        console.log('prawidlowa odp to: ' + zad);
    }
}


function sprawdzOdpBez9(){
    let odp = parseInt(document.getElementById("wynik").value);
    let zad = 21;

    if (odp === zad) {
        document.getElementById("czydobrze").innerText = "super!";
        window.location.href = "../../index.php";

    } else {
        document.getElementById("czydobrze").innerText = "wrong answer";
        console.log('prawidlowa odp to: ' + zad);
    }


}
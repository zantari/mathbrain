





const komunikat = document.getElementById("komunikat");
const trescKomunikat = document.getElementById("trescKomunikat")


function zamknij(){
    komunikat.style.display='none';
}
function komunikatNoLoggedShow(){
    komunikat.style.display='block';
    trescKomunikat.innerText = 'you need to be looged in to play this mode';
}


function komunikatPreviousShow(){
    komunikat.style.display='block';
    trescKomunikat.innerText = 'First complete the previous level.';
}

const twojaOcena = document.getElementById("twojaOcena");
const komunikatDel = document.getElementById("czyDelete");

twojaOcena.addEventListener('click', function(){
    komunikatDel.style.display="block";

});

function zamknijDel(){
    komunikatDel.style.display='none';
}




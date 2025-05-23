





const komunikat = document.getElementById("komunikat");
function zamknij(){
    komunikat.style.display='none';
}
function komunikatShow(){
    komunikat.style.display='block';
}

const twojaOcena = document.getElementById("twojaOcena");
const komunikatDel = document.getElementById("czyDelete");

twojaOcena.addEventListener('click', function(){
    komunikatDel.style.display="block";

});

function zamknijDel(){
    komunikatDel.style.display='none';
}




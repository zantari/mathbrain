const input = document.getElementById('haslo');

const przyciskUkryj = document.getElementById("show");

przyciskUkryj.addEventListener("click", (e) => {
    if(input.type == "text"){
        input.type = "password";
    }
    else{
        input.type = "text";
    }
})
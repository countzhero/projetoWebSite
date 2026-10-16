let segundos = 0;
let limiteMin = 10;
let timer;

function iniciarUso(aparelho, limite){

limiteMin = limite;

alert(
"Uso iniciado em " + aparelho
);

timer = setInterval(contador,1000);
}

function contador(){

segundos++;

let min =
Math.floor(segundos/60);

let seg =
segundos%60;

document.getElementById(
"cronometro"
).innerHTML =
min + ":" +
(seg < 10 ? "0"+seg : seg);

let faltam =
(limiteMin*60)-segundos;

if(faltam === 120){

alert(
"⚠ Restam 2 minutos!"
);

navigator.vibrate(1000);

}

if(segundos >= limiteMin*60){

alert(
"⛔ Tempo esgotado!"
);

clearInterval(timer);

}

}

function liberarAparelho(){

clearInterval(timer);

segundos = 0;

alert(
"✅ Equipamento liberado"
);

}

function solicitarRevezamento(){

alert(
"Pedido de revezamento enviado"
);

}

function checkinQr(){

alert(
"QR Code reconhecido!"
);

}
const botaoPlayPause = document.getElementById("play-pause");
const audio = document.getElementById("audio-capitulo");
const botaoVoltar = document.getElementById("anterior");
const botaoAvancar = document.getElementById("proximo");
const nomeCapitulo = document.getElementById("capitulo");

const quantCapitulos = 10;
let taTocando = 0;
let capitulo = 1;

function tocarFaixa() {
  botaoPlayPause.classList.remove("bi-play-circle-fill");
  botaoPlayPause.classList.add("bi-pause-circle-fill");
  audio.play();
  taTocando = 1;
}

function pausarFaixa() {
  botaoPlayPause.classList.add("bi-play-circle-fill");
  botaoPlayPause.classList.remove("bi-pause-circle-fill");
  audio.pause();
  taTocando = 0;
}

function tocarOuPausarFaixa() {
  if (taTocando === 1) {
    pausarFaixa();
  } else {
    tocarFaixa();
  }
}

function voltarFaixa() {
    if (capitulo === 1) {
        capitulo = quantCapitulos;
    }else{
        capitulo = capitulo - 1;
    }
    audio.src = "books/dom-casmurro/"+ capitulo +".mp3";
    nomeCapitulo.innerText = "Capítulo " + capitulo; 
    audio.play();
}

function avancarFaixa() {
    if (capitulo === 10) {
        capitulo = 1;
    }else{
        capitulo = capitulo + 1;
    }
    audio.src = "books/dom-casmurro/"+ capitulo +".mp3";
    nomeCapitulo.innerText = "Capítulo " + capitulo; 
    audio.play();
}

botaoPlayPause.addEventListener("click", tocarOuPausarFaixa);
botaoVoltar.addEventListener("click", voltarFaixa);
botaoAvancar.addEventListener("click", avancarFaixa);
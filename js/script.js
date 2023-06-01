// RELÓGIO
const getHours = () => {
    const clock = document.getElementsByClassName('clock')[0]
    const date = new Date()
    const hours = date.getHours()
    const minutes = date.getMinutes()
    const seconds = date.getSeconds()
    const hour = hours < 10 ? `0${hours}` : hours
    const minute = minutes < 10 ? `0${minutes}` : minutes
    const second = seconds < 10 ? `0${seconds}` : seconds
    clock.innerHTML = `${hour}:${minute}:${second}`
}
setInterval(() => {
    getHours()
}, 1000)

// CONTADOR DE CAIXA DE TEXTO
textarea = document.querySelector("#mensagem");
textarea.addEventListener('input', autoResize, false);
function autoResize() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
}                                
var textarea=document.getElementById("mensagem");
var caracteresRestantes=document.getElementById("caracteres_restantes");
textarea.oninput=function(e){
    caracteresRestantes.innerHTML=(255-this.value.length);
}
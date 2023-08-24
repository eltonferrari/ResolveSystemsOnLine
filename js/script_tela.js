$(document).ready(function() {
    var windowWidth
    function sizeOfThings(){
        windowWidth = window.innerWidth;												
    };
    sizeOfThings();
    window.addEventListener('resize', function(){
        sizeOfThings();
        console.log(windowWidth)
    });
    
    if (windowWidth >= 576 && windowWidth <= 767) {
        
        
        
        
        $('div#posicao-1').addClass('order-1')
        $('div#posicao-2').addClass('order-3')
        $('div#posicao-3').addClass('order-2')        
    }
})

/*
// Verifica se a class existe
$('textarea').hasClass('padrao') // console - resposta = 'true' ou 'false'

// Removendo class
$('textarea').removeClass('padrao') // console
$('textarea').removeClass('erro') // console

function sizeOfThings(){
	var windowWidth = window.innerWidth;												
};
sizeOfThings();
window.addEventListener('resize', function(){
	sizeOfThings();
});
*/

/*
Para mudar a ordem dos elementos de um grid col-md-4 dinamicamente, você pode usar o método sort() do JavaScript,
 que ordena um array de acordo com uma função de comparação. Por exemplo, se você tem um array de objetos que
  representam os elementos do grid, e cada objeto tem uma propriedade chamada order que indica a ordem desejada,
   você pode fazer algo assim:
*/
// Cria um array de objetos com os elementos do grid
var gridElements = document.querySelectorAll(".col-md-4");
var gridArray = [];
for (var i = 0; i < gridElements.length; i++) {
  var element = gridElements[i];
  // Adiciona o elemento e a sua ordem ao array
  gridArray.push({
    element: element,
    order: element.getAttribute("data-order")
  });
}

// Ordena o array de acordo com a ordem
gridArray.sort(function(a, b) {
  return a.order - b.order;
});

// Altera a ordem dos elementos no DOM usando o método setAttribute
for (var i = 0; i < gridArray.length; i++) {
  var element = gridArray[i].element;
  // Define o atributo order do elemento com o índice do array
  element.setAttribute("order", i);
}
//alert('Lucina Linda!')

let num1 = parseFloat(window.prompt('Digite um número:'))
let num2 = parseFloat(window.prompt('Digite outro número:'))
let operacao = window.prompt('Qual operação deseja realizar: adição digite: '+
'+ \n subtação digite: - \n multiplicação digite: * \n divisão digite: /' +
'\n módulo digite: %')
let resultado = num1 + num2
console.log(resultado)
if(operacao =='+'){
    let result = num1+num2
    alert(result)
}else if(operacao =='-'){
    let result = num1-num2
    alert(result)
}else if(operacao =='*'){
    let result = num1*num2
    alert(result)
}else if(operacao =="/"){
    let result = num1/num2
    alert(result)
}else if(operacao =='%'){
    let result = num1%num2
    alert(result)
}else{
    alert('opção inválida')
}

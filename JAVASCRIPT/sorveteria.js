let sabor = window.prompt('Qual sabor do sorvete:\n m = morango' +
    '\n b = baunilha \n c = chocolate \n u = uva').toLowerCase()
//FUNÇÃO PARA CONVERTER O TEXTO PARA MINUSCULO
//toUpperCase() FUNÇÃO PARA CONVERTER O TEXTO PARA MAIUSCULO

switch (sabor) {
    case 'm':
        alert('valor R$12,00 o Kilo')
        break
    case 'b':
        alert('valor R$11,00 o Kilo')
        break
    case 'c':
        alert('valor R$18,00 Kilo')
        break
    case 'u':
        alert('valor R$15,00 Kilo')
        break
    default:
        alert('Opção inválida')
}

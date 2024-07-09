let idade = parseFloat(window.prompt('Digite sua idade:'))

if(idade <16 && idade >0){
    alert('Não vota!')

}else if((idade >=18 && idade <80)){
    alert('Vota!')

}else if(idade<0){
    alert('Voto inválido')
    
}else {
    alert('Opcional!')
}

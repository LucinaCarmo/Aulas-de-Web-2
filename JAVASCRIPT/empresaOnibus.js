let idade = parseFloat(window.prompt('Digite sua idade.'))


if(idade <= 6){
    let result= 'Não paga passagem'
    alert(result)  
}else if((idade >6 && idade <61)){
    let result= 'Paga passagem.'
    alert(result)
}else{
    alert('Não paga passagem.')
}
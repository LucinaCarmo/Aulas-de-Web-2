let passeio = window.prompt('Escolha seu pacote de viagem: \n l: litoral' +
    '\n g: gramado \n n: noronha \n m: monte seu pacote').toLowerCase()
    function showAlert(message, callback){
     if(confirm(message)){
        callback()
     }
    }
    function bodyInfo(hotel, checkout){
        let infoDiv = document.getElementById('info')
        infoDiv.innerHTML = `<p>Hotel: ${hotel} </p><p>Horario do checkout: ${checkout}</p>`
    }
switch (passeio) {
    case 'l':
        showAlert('5 dias no litoral R$850,00', function () {
            bodyInfo('Hotel Do Mar', '12:00')
        })
        break
    case 'g':
        showAlert('5 dias em Gramado R$7850,00', function () {
            bodyInfo('Hotel Grama', '11:30')
        })
        break
    case 'n':
        showAlert('5 dias em Noronha R$11000,00', function () {
            bodyInfo('Hotel Do Nora', '13:00')
        })
        break
    case 'm':
        alert('O valor será decidido de acordo com suas escolhas')
        break
    default:
        alert('Opção inválida')
}

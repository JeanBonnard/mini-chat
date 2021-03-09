let id = document.querySelector('#idUser').value
let boxMessage = document.querySelector(".message-content")
let sendMessage = document.querySelector('.sendMessage')
let message = document.querySelector('#message')

sendMessage.addEventListener('click',function (e){
    e.preventDefault()

    let formData = new FormData()
    formData.append('message', message.value)

    fetch('traitement-envoi.php?id='+id,{
        method: 'post',
        body: formData
    }).then(()=> {
        message.value = ''
        refresh()
    })
})

function refresh(){
    fetch('display_message.php').then((response)=>{
        return response.text()
    }).then((data)=>{
        boxMessage.innerHTML = data
    })
}

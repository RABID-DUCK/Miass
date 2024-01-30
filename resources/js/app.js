window.sendApplication = function(){
    let name = document.getElementById('name_user');
    let email = document.getElementById('email');
    let message = document.getElementById('message');

    if(!name || !email || !message){
        alert('Заполните все поля!');
        return;
    }

    fetch('/api/create-application', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name: name.value,
            email: email.value,
            message: message.value
        })
    })
        .then(response => response.json())
        .then(data => {
            name.value = "";
            email.value = "";
            message.value = "";
            if(data.message) alert(data.message)
        })
        .catch(err => {
            console.log(err);
            alert('Произошла ошибка на сервере, попробуйте позже!')
        })
}

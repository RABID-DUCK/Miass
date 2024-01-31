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

window.sortApp = function (action){
    fetch('/api/filter-app', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            action: action,
        })
    })
        .then(response => response.json())
        .then(data => {
            let main = document.getElementById('applications');
            main.innerHTML = '';
            data.apps.forEach(item => {
                main.insertAdjacentHTML('beforeend', `
                <tr>
                    <th scope="row">${item.id}</th>
                    <td>${item.name}</td>
                    <td><a href="/backend/application/${item.id}">${item.email}</a></td>
                    <td>${item.status}</td>
                    <td>${item.message}</td>
                    <td>${item.comment}</td>
                    <td>${item.created_at}</td>
                </tr>
            `)
            })

        })
        .catch(err => {
            console.log(err);
        })
}

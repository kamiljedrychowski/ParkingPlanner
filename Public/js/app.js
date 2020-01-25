function getPoints(mail) {
    const apiUrl = "http://localhost:8008";
    $.ajax({
        url: apiUrl + '/?page=getpoints', method: "POST",
        data: {
            mail: mail
        },
        dataType: 'json',
        success: function (points) {
            $('#bonuspoints').text(points[0]);
            $('#Aparking').text(points[1]);
            $('#Aticket').text(points[2]);
            $('#Asticker').text(points[3]);
        }
    })
}

function getBonus(mail, bonusName) {
    const apiUrl = "http://localhost:8008";
    $.ajax({
        url: apiUrl + '/?page=getbonus', method: "POST",
        data: {
            mail: mail,
            bonusName: bonusName,
        },
        dataType: 'json',
        success: function (points) {
            if (points.length > 0) {
                $('#bonuspoints').text(points[0]);
                $('#Aparking').text(points[1]);
                $('#Aticket').text(points[2]);
                $('#Asticker').text(points[3]);
            } else
                alert("Not enought bonus points :(");
        }
    })
}

function deleteUser(id) {
    if (!confirm('Do you want to delete this user?')) {
        return;
    }
    const apiUrl = "http://localhost:8008";
    $.ajax({
        url : apiUrl + '/?page=admin_delete_user',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            getUsers();
            alert('Selected user successfully deleted from database!');
        }
    });
}


function getUsers() {
    const apiUrl = "http://localhost:8008";
    const $list = $('.users-list');
    $.ajax({
        url: apiUrl + '/?page=admin_users',
        dataType: 'json'
    })
        .done((res) => {
            $list.empty();
            res.forEach(el => {
                $list.append(`<tr>
                    <td>${el.id_user_data}</td>
                    <td>${el.email}</td>
                    <td>${el.name}</td>
                    <td>${el.surname}</td>
                    <td>${el.points}</td>
                    <td>${el.plate_number}</td>
                    <td>${el.role}</td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick='deleteUser(${el.id_user_data})'>
                            <i class="material-icons">delete_forever</i>
                        </button>
                    </td>
                    </tr>`);
            })
        });
}


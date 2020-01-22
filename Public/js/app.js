function getPoints(mail) {
    const apiUrl = "http://localhost:8008";
    $.ajax({
        url: apiUrl + '/?page=getpoints', method: "POST",
        data: {
            mail: mail
        },
        dataType: 'text',
        success: function (points) {
            $('#bonuspoints').text(points);
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
        dataType: 'text',
        success: function (points) {
            if(points)
                $('#bonuspoints').text(points);
            else
                alert("Not enought bonus points :(");
        }
    })
}


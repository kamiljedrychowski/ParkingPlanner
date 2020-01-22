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
            if(points.length>0){
                $('#bonuspoints').text(points[0]);
                $('#Aparking').text(points[1]);
                $('#Aticket').text(points[2]);
                $('#Asticker').text(points[3]);
            }
            else
                alert("Not enought bonus points :(");
        }
    })
}


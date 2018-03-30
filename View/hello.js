
debugger;
var ajax = new XMLHttpRequest();
var method = "GET";
var url = "../Model/helloData.php";
var asynchronous = true;
ajax.open(method, url, asynchronous);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        console.log(data);
        var html = "";
        for (var a = 0; a < data.length; a++) {
            var username = data[a].username;
            html += "<tr>";
            html += "<td>" + username + "</td>";
            html += "<td>" + ', Вашият избор от Vimar.bg е:' + "</td>";
            html += "</tr>";
        }

        document.getElementById("user").innerHTML = html;
    }

}

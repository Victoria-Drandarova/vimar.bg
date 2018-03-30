function getCountry(pole) {
    var div = document.getElementById("searchmod1");
    div.innerHTML = "";
    if (pole.value === "") {
        div.style.visibility = "visibility";
        div.innerHTML = "";
        return;
    }
    var request = new XMLHttpRequest();
    request.open("get", "../Controller/searchController.php?search=" + pole.value);
    request.onreadystatechange = function (ev) {
        if (this.readyState === 4) {
            if (this.status === 200) {

                var response = JSON.parse(this.responseText);

                var ul = document.createElement("ul");
                for (var item in response) {
                    var li = document.createElement("li");
                    var flag = document.createElement("img");
                    var span = document.createElement("span");
                    span.setAttribute("class","Cname");
                    flag.src=response[item]["flag"];
                    flag.style.height="18px";
                    span.innerText = response[item]["name"];

                    li.appendChild(span);
                    li.appendChild(flag);
                    ul.appendChild(li);
                    li.onclick = function (ev2) {
                        var div2 = document.getElementById("search-info");
                        div2.innerHTML = "";
                        //var content = this.innerHTML;
                        var content = this.getElementsByClassName("Cname")[0].textContent;

                        var request2 = new XMLHttpRequest();
                        request2.open("get", "../Controller/searchController.php?name=" + content);
                        request2.onreadystatechange = function () {
                            if (this.readyState === 4) {
                                if (this.status === 200) {
                                    var response2 = JSON.parse(this.responseText);

                                    var ul2 = document.createElement("ul");

                                    for (var item2 in response2) {
                                        var li2 = document.createElement("li");

                                        if (item2 === "flag") {
                                            var img = document.createElement("img");
                                            img.src = response2[item2];
                                            img.style.height = "50px";
                                            li2.appendChild(img);
                                            ul2.appendChild(li2);
                                        } else {

                                            li2.innerHTML = item2 + " : " + response2[item2];
                                            ul2.appendChild(li2);
                                        }

                                    }
                                    div2.appendChild(ul2);

                                    div2.style.visibility = "visible";
                                }
                            }
                        };
                        request2.send();
                    }
                }
                div.appendChild(ul);
                div.style.visibility = "visible";


            }
        }
    };

    request.send();
}

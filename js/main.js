var searchBox = document.getElementById("searchBox");
var searchCountry = document.getElementById("searchCountry");
var btnSearch = document.getElementById("btnSearch");
var userContainer = document.getElementById("userContainer");

btnSearch.addEventListener("click",function() {
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            userContainer.innerHTML = this.responseText;
        }
    };
    xml.open("GET", "controller/search.php?search=" + searchBox.value + "&country=" + searchCountry.value, true);
    xml.send();
});

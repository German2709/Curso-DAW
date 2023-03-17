function verpass() {
    var cambio = document.getElementById("txtPassword");
    let txtchange = document.querySelector(".eye > span");
    if (cambio.type == "password") {
        cambio.type = "text";
        txtchange.innerHTML = "visibility_off";
        return;
    } else {
        cambio.type = "password";
        txtchange.innerHTML = "visibility";
        return;
    }
}
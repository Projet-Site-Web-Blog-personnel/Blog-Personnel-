function checkPassword() {
    var password1 = document.getElementById("mot_de_passe1").value;
    var password2 = document.getElementById("mot_de_passe2").value;
    if (password1 != password2) {
        alert("Les deux mots de passe ne correspondent pas");
        return false;
    }
}
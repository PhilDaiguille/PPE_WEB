document.addEventListener("DOMContentLoaded", () => {
    console.log("charged");
	let btn = document.querySelector("main section input[type=submit]");
    let msg = document.querySelector("main section:nth-child(1)");
    let main = document.querySelector("main div");

    btn.addEventListener("click", (e) => {
        e.preventDefault();
        if (confirm("Vous êtes sûr de vouloir supprimer votre compte ?")) {
            console.log("oui");
            /* main.innerHTML += `<?php include_once("./page/SupprimerProfil.php"); ?>`;  */
            msg.innerHTML += `<h3 class="success"> Votre compte a été supprimé </h3>`;
            console.log("supprimé");
        }
        else {
            alert("Votre compte n'a pas été supprimé.");
        } 
    });
});

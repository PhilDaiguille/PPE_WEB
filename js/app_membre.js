document.addEventListener("DOMContentLoaded", () => {
	window.history.pushState(1, "PPE_WEB", "/PPE_WEB/Accueil_membre.php");

    let el, modal, closed, open_modal, closed_all;

	el = document.querySelectorAll(".grid-picture-large li");
	modal = document.querySelector(".parent-modale");
	closed = document.querySelector(".modale button");
	closed_all = document.querySelector(".modale img");
	
	/* property elements */

	open_modal = function () {
		/* les variables */
		let image = this.dataset.image;
		let title = this.dataset.title;
		let desc = this.dataset.description;
		let dates = this.dataset.dates;
		let id = this.dataset.id;
		
		modal.classList.add("modale-active"); /* ajouter la classe active */
		/* sélectionner les sélecteurs html*/
		document.querySelector(".modale img").setAttribute("src", image);
		document.querySelector(".modale .desc h3").innerText = title;
		document.querySelector(".modale .desc p").innerHTML = `<strong>Description : </strong>${desc}`;
		document.querySelector(".modale .desc time").innerText = `Année : ${dates}`;
		document.querySelector(".modale .desc time").setAttribute("datetime", dates);
        let btn = document.querySelector("main .grid-picture-large");
		btn.addEventListener("click", (e) => {
			e.preventDefault();
			window.history.pushState(1, "PPE_WEB", "/PPE_WEB/Accueil_membre.php?id_event=" + id);
		});
		

	};
	
	for (rows of el) {
		rows.addEventListener("click", open_modal);
	}

	closed.addEventListener("click", () => {
		window.history.pushState(1, "PPE_WEB", "/PPE_WEB/Accueil_membre.php");
		modal.classList.remove("modale-active");
	});

	closed_all.addEventListener("click", () => {
		window.history.pushState(1, "PPE_WEB", "/PPE_WEB/Accueil_membre.php");
		modal.classList.remove("modale-active");
	});
    

});
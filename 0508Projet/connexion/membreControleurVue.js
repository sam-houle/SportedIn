function afficherHome(reponse){
	var rep="<div class=\"container\"><div class=\"row\"> <div class=\"col s12 m12 l12\" > <div class=\"row\"> <div class=\"card horizontal\"> <div class=\"card-image\"> <img src=\"PhotoMembre/"+reponse.u_photo+"\" width=\"250px\" height=\"250px\"> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <h5 class=\"header\">"+reponse.u_prenom + " "+reponse.u_nom+"</h5> <b>"+reponse.u_ville+"</b> <p>"+reponse.u_texte+"</p> </div> <div class=\"card-action\"> <a class=\"btn-floating btn waves-effect waves-light grey right\"><i class=\"material-icons\">edit</i></a> </div> </div> </div> <div class=\"row\"> <div class=\"col s12 m12\"> <div class=\"card-panel\" id=\"divSuggestions\"> <div class=\"row\"> <h4 class=\"header sugg\">Suggestions</h4> <div class=\"col s12 m4\"> <div class=\"card horizontal\"> <div class=\"card-image\"> <img src=\"http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png\" height=\"70px\" width=\"70px\"> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <p>Nom</p> </div> </div> </div> </div> <div class=\"col s12 m4\"> <div class=\"card horizontal\"> <div class=\"card-image\"> <img src=\"http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png\" height=\"70px\" width=\"70px\"> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <p>Nom</p> </div> </div> </div> </div> <div class=\"col s12 m4\"> <div class=\"card horizontal\"> <div class=\"card-image\"> <img src=\"http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png\" height=\"70px\" width=\"70px\"> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <p>Nom</p> </div> </div> </div> </div> </div> </div> </div> </div> </div> </div> </div> <div class=\"row\" id=\"rechercheAvance\"> </div></div>";
	var nav="<nav class=\"green\" role=\"navigation\"> <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"#\" class=\"brand-logo\">Sported In</a> <ul class=\"right hide-on-med-and-down\"> <li><input type=\"search\" placeholder=\"Recherche\" class=\"white-text\"></li> <li><a class=\"btn waves-effect waves-light gray\" onClick=\"\">Logout</a></li> </ul> <ul id=\"nav-mobile\" class=\"sidenav\"> <li><a href=\"#\">Navbar Link</a></li> </ul> <a href=\"#\" data-target=\"nav-mobile\" class=\"sidenav-trigger\"><i class=\"material-icons\">menu</i></a> </div> </nav> <nav class=\"green darken-4\" role=\"navigation\" id=\"membrenav\"> <div class=\"nav-wrapper container\"> <ul class=\"hide-on-med-and-down\"> <li><i class=\"fas fa-home fa-2x\" onClick=\"rendreVisible('divHome'); rendreInvisible('divProfil'); rendreInvisible('divReseau')\"></i></li> <li><i class=\"fas fa-users fa-2x\" onClick=\"rendreVisible('divReseau'); rendreInvisible('divProfil'); rendreInvisible('divHome');\"></i></li> <li><i class=\"fas fa-envelope fa-2x\"></i></li> <li><i class=\"fas fa-bell fa-2x\"></i></li> <li><i class=\"fas fa-calendar fa-2x\"></i></li> <li><i class=\"fas fa-user fa-2x\" onClick=\"rendreVisible('divProfil'); rendreInvisible('divHome'); rendreInvisible('divReseau');\"></i></li> </ul> </div> </nav>";
	var rechercheAv="<div class=\"card-panel green\"> <h5 class=\"white-text\">Recherche avancé</h5> <div class=\"row card-panel\" > <div class=\"col s4\"> <label>Sport</label> <select class=\"browser-default\" id=\"sport\" name=\"sport\"> <option value=\"alpinisme\">Alpinisme</option> <option value=\"aviron\">Aviron</option> <option value=\"badminton\">Badminton</option> <option value=\"baseball\">Baseball</option> <option value=\"basketball\">Basketball</option> <option value=\"boxe\">Boxe</option> <option value=\"chasseetpeche\">Chasse et pêche</option> <option value=\"courseauto\">Course auto</option> <option value=\"danse\">Danse</option> <option value=\"escalade\">Escalade</option> <option value=\"golf\">Golf</option> <option value=\"gym\">Gym</option> <option value=\"soccer\">Jogging</option> <option value=\"hockey\">Hockey</option> <option value=\"martiaux\">Arts martiaux</option> <option value=\"tennis\">Tennis</option> <option value=\"tennisdetable\">Tennis de table</option> <option value=\"soccer\">Soccer</option> <option value=\"velo\">Vélo</option> <option value=\"volleyball\">Volleyball</option> </select> </div> <div class=\"col s4\"> <label>Niveau</label> <select class=\"browser-default\" id=\"niveau\" name=\"niveau\"> <option value=\"Debutant\">Débutant</option> <option value=\"Intermediaire\">Intermediaire</option> <option value=\"Expert\">Expert</option> </select> </div> <div class=\"col s4\"> <label>Age</label><br> <input class=\"age\" type=\"number\" min=\"18\" max=\"99\" placeholder=\"25\" style=\"width: 4em\"> <input class=\"age\" type=\"number\" min=\"18\" max=\"99\" placeholder=\"30\" style=\"width: 4em\"> </div> <div class=\"col s6\"> <label>Domaine profession</label> <select class=\"browser-default\" id=\"profession\" name=\"profession\"> <option value=\"Administration\">Affaires, finances et administration</option> <option value=\"Arts\">Arts, culture et communication </option> <option value=\"Construction\">Construction, production et manutention </option> <option value=\"Droit\">Droit et protection du public </option> <option value=\"Gestion\">Gestion </option> <option value=\"Droit\">Droit et protection du public </option> <option value=\"Gestion\">Gestion </option> <option value=\"Hebergement\">Hébergement, restauration et services alimentaires </option> <option value=\"Informatique\">Informatique, génie et autres sciences naturelles et appliquées</option> <option value=\"Sante\">Santé</option> <option value= \"Autre\">Autre</option> </select> </div> <div class=\"col s2\"> <label>Distance</label> <select id=\"distance\" name=\"distance\" class=\"browser-default\"> <option value=\"5\">5 km</option> <option value=\"10\">10 km</option> <option value=\"25\">25 km</option> </select> </div> <div class=\"col s4\"> <label>Sexe</label> <select id=\"sexe\" name=\"sexe\" class=\"browser-default\"> <option value=\"Femme\">Femme</option> <option value=\"Homme\">Homme</option> <option value=\"Autre\">Autre</option> </select> </div> <div class=\"input-field col s12\"> <button class=\"btn orange waves-effect waves-light right\" type=\"submit\" name=\"action\">Rechercher <i class=\"mdi-content-send right\"></i> </button> </div> </div> </div> </div>";
	$('#content').html(rep);
	$('#nav').html(nav);
	$('#rechercheAvance').html(rechercheAv);
}
//function afficherfilmAcceuil
var ConnexionVue=function(reponse){
	var action=reponse.action;
	switch(action){
		case "inscript" :
		case "connecter" :
			afficherHome(reponse);
		break;
		case "cannotConnecter" :
			$('#divAlert').html(reponse.msg);
			setTimeout(function(){ $('#divAlert').html(""); }, 5000);
		break;
	}
}
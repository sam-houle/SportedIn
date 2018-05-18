function afficherHome(reponse){
	var listSport = reponse.listSport;
	taille=listSport.length;
	var rep="<div class=\"container\"><div class=\"row\"> <div class=\"col s12 m12 l12\" > <div class=\"row\"> <div class=\"card horizontal\"> <div class=\"card-image\"> <img src=\"PhotoMembre/"+reponse.u_photo+"\" width=\"250px\" height=\"250px\"> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <h5 class=\"header\">"+reponse.u_prenom + " "+reponse.u_nom+"</h5> <b>"+reponse.u_ville+"</b> <p>"+reponse.u_texte+"</p> </div> <div class=\"card-action\"> <a class=\"btn-floating btn waves-effect waves-light grey right\"><i class=\"material-icons\">edit</i></a> </div> </div> </div> <div class=\"row\"> <div class=\"col s12 m12\"> <div class=\"card-panel\" id=\"divSuggestions\">  </div> </div> </div> </div> </div> <div class=\"row\" id=\"rechercheAvance\"> </div></div>";
	var nav="<nav class=\"white\" role=\"navigation\"> <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"#\" class=\"brand-logo green-text\">Sported In</a> <ul class=\"right hide-on-med-and-down\"> <li><a class=\"btn waves-effect waves-light grey\" onClick=\"logout()\">Logout</a></li> </ul> <ul id=\"nav-mobile\" class=\"sidenav\"> <li><a href=\"#\">Connexion</a></li><li><a href=\"#\">S'inscire</a></li></ul> <a href=\"#\" data-target=\"nav-mobile\" class=\"sidenav-trigger\"><i class=\"material-icons\">menu</i></a></div></nav> <nav class=\"green darken-4\" role=\"navigation\" id=\"membrenav\"> <div class=\"nav-wrapper container\"> <ul class=\"hide-on-med-and-down\"> <li><i class=\"fas fa-home fa-2x\" style=\"cursor: pointer;\" onClick=\" homeButton();\"></i></li> <li><i class=\"fas fa-users fa-2x\" style=\"cursor: pointer;\" onClick=\"affMyNetwork()\"></i></li> <li><i class=\"fas fa-envelope fa-2x\" style=\"cursor: pointer;\" onClick=\"afficherMsg();\"></i></li> <li><i class=\"fas fa-bell fa-2x\" style=\"cursor: pointer;\"></i></li> <li><i class=\"fas fa-calendar fa-2x\" style=\"cursor: pointer;\" onClick=\"afficherEvent()\"></i></li> <li><i class=\"fas fa-user fa-2x\" style=\"cursor: pointer;\" onClick=\"afficherProfileMoi()\"></i></li> </ul> </div> </nav>";
	var rechercheAv="<div class=\"row card-panel\" id=\"secRechercheA\"><h4>Recherche avancé</h4><form id=\"formRechercheAv\"> <div class=\"col s4\"><label>Sport</label> <select class=\"browser-default\" id=\"sport\" name=\"sport\"> ";
	for(var i=0; i<taille; i++){
		rechercheAv+="<option value=\""+listSport[i].id_sport+"\">"+listSport[i].nom+"</option>";
	}
	rechercheAv+="</select> </div> <div class=\"col s4\"> <label>Niveau</label> <select class=\"browser-default\" id=\"niveau\" name=\"niveau\"> <option value=\"default\">Tous les Niveaux</option> <option value=\"1\">Débutant</option> <option value=\"2\">Intermediaire</option> <option value=\"3\">Expert</option> </select> </div> <div class=\"col s4\"> <label>Age</label><br> <input class=\"age\" name=\"ageMin\" id=\"ageMin\"type=\"number\" min=\"18\" max=\"99\" placeholder=\"25\" style=\"width: 4em\"> <input class=\"age\" name=\"ageMax\" id=\"ageMax\" type=\"number\" min=\"18\" max=\"99\" placeholder=\"30\" style=\"width: 4em\"> </div> <div class=\"col s6\"> <label>Domaine profession</label> <select class=\"browser-default\" id=\"profession\" name=\"profession\"> <option value=\"default\">Tout type de profession</option> <option value=\"Administration\">Affaires, finances et administration</option> <option value=\"Arts\">Arts, culture et communication </option> <option value=\"Construction\">Construction, production et manutention </option> <option value=\"Droit\">Droit et protection du public </option> <option value=\"Gestion\">Gestion </option> <option value=\"Droit\">Droit et protection du public </option> <option value=\"Gestion\">Gestion </option> <option value=\"Hebergement\">Hébergement, restauration et services alimentaires </option> <option value=\"Informatique\">Informatique, génie et autres sciences naturelles et appliquées</option> <option value=\"Sante\">Santé</option> <option value= \"Autre\">Autre</option> </select> </div> <div class=\"col s2\"> <label>Distance</label> <select id=\"distance\" name=\"distance\" class=\"browser-default\"> <option value=\"Quartier\">Quartier</option> <option value=\"Ville\">Ville</option> <option value=\"Province\">Province</option> </select> </div> <div class=\"col s4\"> <label>Sexe</label> <select id=\"sexe\" name=\"sexe\" class=\"browser-default\"> <option value=\"default\">Tous les sexe</option> <option value=\"Femme\">Femme</option> <option value=\"Homme\">Homme</option> <option value=\"Autre\">Autre</option> </select> </div> <div class=\"input-field col s12\"> <button class=\"btn green waves-effect waves-light right\" type=\"button\" name=\"recherche\" onClick=\"rechercheAvance();\">Rechercher <i class=\"mdi-content-send right\"></i> </button> </div> </div> </div>";
	$('#content').html(rep);
	$('#nav').html(nav);
	$('#rechercheAvance').html(rechercheAv);
	afficherDemandeAmi(reponse);
	var repDemande = "<h4 class=\"header sugg\">Suggestions</h4> ";
	if(reponse.OK == "false"){
		repDemande+= "<div class=\"row\">Aucune Demande</div>";
	}else{
		var listAmi = reponse.listAmi;
		taille2=listAmi.length;
		for(var y=0; y<taille2; y++){
			if(y%3==0){
				repDemande+="<div class=\"row\">";
			}
			repDemande+="<div class=\"col s12 m4\"> <div class=\"card horizontal\"> <div class=\"card-image\"> <a onclick=\"afficherProfileAutre("+listAmi[y].id_membre+")\"><img src=\"PhotoMembre/"+listAmi[y].photo+"\" height=\"70px\" width=\"70px\"></a> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <p>"+listAmi[y].prenom+" "+listAmi[y].nom+"</p> <a class=\"btn-floating btn waves-effect waves-light bottom blue\" style=\"margin-top : 20px;\" id=\"ajoutAmiCouleur\" onclick=\"accepterDemande("+listAmi[y].id_membre+")\"><i class=\"material-icons\" id=\"ajoutAmiIcone\">group_add</i></a></div> </div> </div> </div>" 
			if(y%3==0){
				repDemande+="</div>";
			}
		}
		repDemande+="</div></div>";
	}
	$('#divSuggestions').html(repDemande);
}
function afficherDemandeAmi(reponse){

}
//function afficherfilmAcceuil
var ConnexionVue=function(reponse){
	var action=reponse.action;
	switch(action){
		case "homeButton" :
		case "inscript" :
		case "connecter" :
		case "afficherRechercheAv" :
			afficherHome(reponse);
		break;
		case "cannotConnecter" :
			$('#divAlert').html(reponse.msg);
			setTimeout(function(){ $('#divAlert').html(""); }, 5000);
		break;
	}
}
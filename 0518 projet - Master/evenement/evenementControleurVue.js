function afficherEventV(reponse){
	var listeEvent = reponse.listeEvent;
	var taille=listeEvent.length;
	var rep="<div class=\"container\"> <div class=\"col s12 m9\" id=\"cardEvent\"><br>";
	
	for(var i=0; i<taille; i++){
		rep+="<br><div class=\"card horizontal\"> <div class=\"card-image\"><iframe frameborder=\"0\" width=\"250\" height=\"250\"  style=\"border:0\" src=\"https://www.google.com/maps/embed/v1/search?q="+listeEvent[i].endroit+",+QC&key=AIzaSyCI2zdHiA-TNQxNNgeWZ9mfcLWPKP5UGCY\" allowfullscreen></iframe> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <h4 class=\"header\">"+listeEvent[i].date_ev+"</h4> <b>"+listeEvent[i].endroit+" "+listeEvent[i].heure_debut+ "</b> <p>" +listeEvent[i].prenom + " " +listeEvent[i].nom +"</p> </div> <div class=\"card-action\"> <a class=\"btn-floating waves-effect waves-light green darker-2\"><i class=\"material-icons\"><img src=\"images/sports/"+listeEvent[i].icone+"\" class=\"recherche\"></i></a></div> </div> </div>";
	}
	rep+="</div></div>";
	$('#content').html(rep);
	
}

function ajouterEventV(reponse){
	var listeEvent = reponse.listeEvent;
	var taille=listeEvent.length;
	var rep="<div class=\"container\"> <div class=\"col s12 m9\" id=\"cardAjoutEvent\"><br>";
	rep+="<div class=\"card-panel\"> <h2>Création événement</h2> <h4><img height=\"50px\" width=\"50px\" class=\"responsive-img circle\" src=\"PhotoMembre/"+listeEvent[0].photo+"\"> "+listeEvent[0].prenom + " " + listeEvent[0].nom+"</h4><br><div class=\"row\"> <form class=\"col s12\" id=\"formEvent\" name=\"formEvent\"> <div class=\"row\"> <div class=\"col s6\"> <label>Sport</label> <select class=\"browser-default\" id=\"sport\" name=\"sport\"> <option value=\"12\">Alpinisme</option> <option value=\"6\">Aviron</option> <option value=\"2\">Badminton</option> <option value=\"1\">Baseball</option> <option value=\"3\">Basketball</option> <option value=\"5\">Boxe</option> <option value=\"10\">Chasse et pêche</option> <option value=\"20\">Course auto</option> <option value=\"8\">Danse</option> <option value=\"7\">Escalade</option> <option value=\"11\">Golf</option> <option value=\"9\">Gym</option> <option value=\"14\">Jogging</option> <option value=\"13\">Hockey</option> <option value=\"15\">Arts martiaux</option> <option value=\"18\">Tennis</option> <option value=\"16\">Tennis de table</option> <option value=\"17\">Soccer</option> <option value=\"4\">Vélo</option> <option value=\"19\">Volleyball</option> </select> </div> <div class=\"input-field col s6\"> <input id=\"endroit\" name=\"endroit\" type=\"text\" required=\"required\"> <label for=\"endroit\">Lieu</label> </div> </div> <div class=\"row\"> <div class=\"col s4\"> <label>Date</label> <input id=\"dateEvent\" name=\"dateEvent\" type=\"date\" class=\"datepicker\" required=\"required\"> </div> <div class=\"col s4\"> <label>Heure de début</label> <input id=\"heuredebut\" name=\"heuredebut\" type=\"time\" class=\"timepicker\" required=\"required\"> </div> <div class=\"col s4\"> <label>Heure de fin</label> <input id=\"heurefin\" name=\"heurefin\" type=\"time\" class=\"timepicker\" required=\"required\"><br></div>";
	rep+="<div class=\"input-field col s12\"><button class=\"btn waves-effect waves-light green right\" type=\"button\" name=\"action\" onClick=\"creerEvent("+ listeEvent[0].id_membre + ");\">Créer</button></form></div></div></div>";
	$('#content').html(rep);
}

var evenementVue=function(reponse){
	var action=reponse.action;
	var action2=reponse.action2; 
	switch(action){
		case "afficherEvent":
			afficherEventV(reponse);
		break;
		case "ajouterEvent":
			ajouterEventV(reponse);
		break;
		case "creerEvent":
			ajouterEventV(reponse);
		break;
	}
}
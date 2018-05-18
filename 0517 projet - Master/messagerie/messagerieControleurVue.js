function afficherMsgV(reponse){
	var listeMsg = reponse.listeMsg;
	var taille=listeMsg.length;
	var rep="<div class=\"container\" id=\"divMessagerie\"> <div class=\"col s12 m9\" > <div class=\"row\"> <div class=\"col s12\"> <nav class=\"orange\"> <div class=\"nav-wrapper\"> <div class=\"left col s12 m5 l5\"> <ul> <li><h5>Messagerie</h5> </ul> </div> </div> </nav> </div> <div class=\"col s12\"> <div id=\"email-list\" class=\"col s10 m4 l4 card-panel z-depth-1\"> <ul class=\"collection\">";
	
	for(var i=0; i<taille; i++){
		rep+="<li class=\"collection-item avatar email-unread\" onclick=\"afficherMsgAmi("+listeMsg[i].membre_deux+");\"> <span class=\"circle green lighten-1\"></span> <span class=\"email-title\">"+listeMsg[i].prenom + " " + listeMsg[i].nom + "</span> <p class=\"blue-text ultra-small\">" + listeMsg[i].temps+ "</p></li>";
		}
	rep+="</ul></div><div id=\"email-details\" class=\"col s12 m8 l8 card-panel\"></div></div></div></div>";
	$('#content').html(rep);
	
}

function afficherMsgAmiV(reponse){
	var listeMsg = reponse.listeMsg;
	var taille=listeMsg.length;
	var rep="<h6 class=\"email-subject truncate\"><i class=\"mdi-action-star-rate yellow-text text-darken-3 right\"></i></h6>";
	for(var i=0; i<taille; i++){
		rep+="<p class=\"ultra-small\">" + listeMsg[i].prenom + " a écrit le " + listeMsg[i].stamp +"</p> <div class=\"email-content-wrap\"> <div class=\"row\"> <div class=\"email-content col s12 m8 l8\"> <p>" + listeMsg[i].contenu + "</p></div></div><hr class=\"grey-text text-lighten-2\"></div>";
	}
	rep+="<br><div class=\"input-field col s12\"><form id=\"formAjoutMsg\" name=\"formAjoutMsg\" method=\"post\" enctype=\"multipart/form-data\"><textarea id=\"textAjoutMsg\" name=\"textAjoutMsg\" class=\"materialize-textarea\" length=\"1000\"></textarea> <label for=\"compose\">Composez votre message</label></div><div class=\"input-field col s12\"><button class=\"btn waves-effect waves-light right\" type=\"submit\" name=\"action\" onClick=\"ajouterMsg("+ listeMsg[0].id + ");\">Envoyer<i class=\"material-icons right\">send</i> </button></form> </div> ";
	$('#email-details').html(rep);
}
		
var messagerieVue=function(reponse){
	var action=reponse.action;
	var action2=reponse.action2; 
	switch(action){
		case "afficherMsg" :
			afficherMsgV(reponse);
		break;
		case "afficherMsgAmi" :
			afficherMsgAmiV(reponse);
		break;
		case "ajouterMsg" :
			afficherMsgAmiV(reponse);
		break;
	}
}
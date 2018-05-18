/*function afficherResultAv(reponse){
	var taille=reponse.listRecherche.length;
	var listRecherche=reponse.listRecherche;
	var rep="<div class=\"container\"> <div class=\"row\"> <div class=\"col s12 m12 l12\"> <div class=\"card-panel green\" id=\"secRecherche\"> <h4 class=\"white-text\"><a class=\"btn-floating waves-effect waves-light orange\"><i class=\"material-icons\"><img src=\"images/sports/"+reponse.icone+"\" class=\"recherche\"></i></a>"+reponse.sport+"</h4> <p class=\"white-text\">"+reponse.msg+"</p> </div> <div class=\"col s12 m12\">";
	for(i=0;i<taille;i++){
	rep+="<div class=\"card horizontal\"><div class=\"card-image\"><img src=\"photoMembre/"+listRecherche[i].photo+"\" width=\"250px\" height=\"250px\">";
			  rep+="</div><div class=\"card-stacked\"><div class=\"card-content\"><h5 class=\"header\">"+listRecherche[i].prenom+" "+listRecherche[i].nomMembre+"</h5>";
				rep+="<b>"+listRecherche[i].ville+"</b><p>"+listRecherche[i].texte+"</p></div><div class=\"card-action\"><a style=\"cursor: pointer;\" onclick=\"afficherProfileAutre("+listRecherche[i].id_membre+")\">Fiche complete</a>";
				rep+="</div></div></div>";
	}
	rep+="</div></div></div></div>";
	$('#content').html(rep);
}
function afficherProfileAutreVue(reponse){
	var autreMembre=reponse.autreMembre;
	var profile="<div class=\"container\" id=\"divProfil\"><div class=\"row\"><div class=\"col s12 m9\" id=\"divMesInfos\"><div class=\"card horizontal\"><div class=\"card-image\">";
	profile+="<img src=\"photoMembre/"+autreMembre[0].photo+"\" width=\"250px\" height=\"250px\"></img></div><div class=\"card-stacked\"><div class=\"card-content\" id=\"infoProfil\">";
	profile+="<h5 class=\"header\">"+autreMembre[0].prenom+" "+autreMembre[0].nom+"</h5><b>"+autreMembre[0].province+", "+autreMembre[0].ville+", "+autreMembre[0].quartier+"</b><p>"+autreMembre[0].profession+"</p><p>"+autreMembre[0].age+" ans</p><p>"+autreMembre[0].sexe+"</p><a class=\"btn-floating btn waves-effect waves-light grey bottom\" style=\"margin-top : 20px;\" id=\"ajoutAmiCouleur\" onclick=\"DemandeAmi("+autreMembre[0].id_membre+");\"><i class=\"material-icons\" id=\"ajoutAmiIcone\">exposure_plus_1</i></a><b><p id=\"messageDemande\" style=\"display: inline-block;\"></p></b>";
	profile+="</div></div></div></div><div class=\"col s12 m3\" id=\"divSports\"></div></div><div class=\"row\" id=\"divTexteA\"></div></div><div class=\"row\" id=\"divAddSport\"></div>";
	$('#content').html(profile);
	var repText="<div class=\"row\"> <div class=\"card-panel green\" id=\"secDescription\"> <h5 class=\"white-text\">À propos de moi</h5> <div class=\"row card-panel\" >"+autreMembre[0].texte+"</div> <h5 class=\"white-text\">Recentes activités</h5> <div class=\"row card-panel\"> <div class=\"col s12 m6\"> <div class=\"card horizontal\"> <div class=\"card-image \"> <h5 class=\"center middle ph5\">15<br> Avril</h5> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <a class=\"waves-effect waves-light orange accent-2 btn-small\">Basketball</a></i> </div> </div> </div> </div> <div class=\"col s12 m6\"> <div class=\"card horizontal\"> <div class=\"card-image \"> <h5 class=\"center middle ph5\">12<br> Avril</h5> </div> <div class=\"card-stacked\"> <div class=\"card-content\"> <a class=\"waves-effect waves-light orange accent-2 btn-small\">Basketball</a></i> </div> </div> </div> </div> </div> </div> </div>";
	$('#divTexteA').html(repText);
	if(reponse.msgDemande == "demandeDejaEnvoyez"){
		$('#ajoutAmiCouleur').removeAttr("onclick");
		$('#ajoutAmiCouleur').off("click");
		document.getElementById("ajoutAmiCouleur").classList.remove('grey');
		document.getElementById("ajoutAmiCouleur").classList.add('green');
		$('#ajoutAmiIcone').html("check");
	}else if(reponse.msgDemande == "dejaAmi"){
		$('#ajoutAmiCouleur').removeAttr("onclick");
		$('#ajoutAmiCouleur').off("click");
		document.getElementById("ajoutAmiCouleur").classList.remove('grey');
		document.getElementById("ajoutAmiCouleur").classList.add('green');
		$('#ajoutAmiIcone').html("account_box");
	}else if(reponse.msgDemande == "demandeRecu"){
		document.getElementById("ajoutAmiCouleur").classList.remove('grey');
		document.getElementById("ajoutAmiCouleur").classList.add('blue');
		$('#ajoutAmiIcone').html("group_add");
		$('#ajoutAmiCouleur').removeAttr("onclick");
		$('#ajoutAmiCouleur').off("click");
		$('#ajoutAmiCouleur').attr("onclick","accepterDemande()");
	}
}
function afficherSportProfAutre(reponse){
	var taille=reponse.sportAutreMembre.length;
	var sportAutreMembre=reponse.sportAutreMembre;
	var repSport ="<div class=\"card\"><div class=\"card-stacked\"><div class=\"card-content\" id=\"divSportsMonProfil\"><ul class=\"listeSports\">";
	for(i=0;i<taille;i++){
		var couleur="";
		var niveau = sportAutreMembre[i].niveau;
		switch(niveau){
			case '1':
				couleur ="green";
			break;
			case '2' :
				couleur="yellow";
			break;
			case '3' :
				couleur="red";
			break;
		}
		repSport+="<li><a class=\"waves-effect waves-light "+couleur+" accent-2 btn-small black-text\" style=\"margin-bottom : 6px;\">"+sportAutreMembre[i].nom+"</a></i></li>";
	}
	//repSport +=	"<a class=\"btn-floating btn waves-effect waves-light grey bottom\"><i class=\"material-icons\" onClick=\"afficherListeSportAjout();\">add</i></a>";
	repSport+="</ul></div></div></div>";
	$('#divSports').html(repSport);
}*/
/*function afficherSelectAdd(reponse){
	var listSport = reponse.listSport;
	taille=listSport.length;
	var rechercheAv="<div class=\"col s12 m12\" id=\"divAjoutSports\" style=\"display:none\"><div class=\"card-panel\"><div class = \"row\"><div class=\"col s5\"><form id=\"formAddSport\" name=\"formAddSport\"><label>Sports</label><select class=\"browser-default\" id=\"sportSel\" name=\"sportSel\"> ";
	for(var i=0; i<taille; i++){
		rechercheAv+="<option value=\""+listSport[i].id_sport+"\">"+listSport[i].nom+"</option>";
	}
	rechercheAv+="</select>";
}*/
function afficherMyNetwork(reponse){
	var taille=reponse.listAmi.length;
	var listAmi=reponse.listAmi;
	var rep= "<div class=\"container\"><input type=\"search\" placeholder=\"Recherche\" >";
	for(var i=0; i<taille; i++){
		rep+="<div class=\"col s4 m3\" id=\"divInfos\" id=\"infoProfil\"> <div class=\"card horizontal\"> <div class=\"card-image\">";
		rep+="<a onclick=\"afficherProfileAutre("+listAmi[i].id_membre+")\"><img src=\"PhotoMembre/"+listAmi[i].photo+"\" height=\"250px\" width=\"250px\"></a></div><div class=\"card-stacked\"><div class=\"card-content\">";
		rep+="<h6 class=\"header\">"+listAmi[i].prenom+" "+listAmi[i].nom+"</h6><b>"+listAmi[i].province+", "+listAmi[i].ville+", "+listAmi[i].quartier+"</b><p>"+listAmi[i].profession+"</p><p>"+listAmi[i].age+"</p><p>"+listAmi[i].sexe+"</p></div><div class=\"card-action\">";
	    rep+="<a class=\"btn-floating btn waves-effect waves-light blue right\"><i class=\"material-icons\">message</i></a></div>";
	    rep+="</div></div></div>";
	}
	rep+="<div>";
	$('#content').html(rep);
}
var myNetworkVue=function(reponse){
	var action=reponse.action;
	switch(action){
		case "affMyNetwork" :
			afficherMyNetwork(reponse);
		break;
		/*case "afficherSelectAdd":
			afficherSelectAdd(reponse);
		break;*/
	}
}
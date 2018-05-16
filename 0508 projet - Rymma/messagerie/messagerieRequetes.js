function afficherMsg(){
	var formAfficherMsg = new FormData();
	formAfficherMsg.append('action','afficherMsg');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messagerie/messagerieControleur.php',
		data : formAfficherMsg,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){ //alert(reponse);
			messagerieVue(reponse);
		},
		fail : function (err){
		}
	});
}

function afficherMsgAmi(id_destinataire){
	var formAfficherMsg = new FormData();
	formAfficherMsg.append('id_destinataire',id_destinataire);
	formAfficherMsg.append('action','afficherMsgAmi');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messagerie/messagerieControleur.php',
		data : formAfficherMsg,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){ //alert(reponse);
			messagerieVue(reponse);
		},
		fail : function (err){
			window.alert(err);
		}
	});
}

function ajouterMsg(id_destinataire,id_destinateur){
	var formAfficherMsg = new FormData(document.getElementById('formAjoutMsg'));
	formAfficherMsg.append('id_destinataire',id_destinataire);
	formAfficherMsg.append('id_destinateur',id_destinateur);
	formAfficherMsg.append('action','ajouterMsg');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messagerie/messagerieControleur.php',
		data : formAfficherMsg,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
			messagerieVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function supprimez(){
		var formFilm = new FormData(document.getElementById('formSup'));
	formFilm.append('action','supprimez');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function obtenirFiche(){
	var leForm=document.getElementById('formModId');
	var formFilm = new FormData(leForm);
	formFilm.append('action','fiche');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}
function modifiezFilm(){
	var leForm=document.getElementById('formMod');
	var formFilm = new FormData(leForm);
	formFilm.append('action','modifier');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}
function pageCategorie(categorie){
	var formFilm = new FormData();
	formFilm.append('action','categorie');//alert(formFilm.get("action"));
	formFilm.append('categorie', categorie);
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}
//requêtes films


function lister(){
	var formFilm = new FormData();
	formFilm.append('action','lister');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}


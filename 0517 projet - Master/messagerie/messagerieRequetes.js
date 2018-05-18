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
		success : function (reponse){// alert(reponse);
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

function ajouterMsg(id){
	var formAfficherMsg = new FormData(document.getElementById('formAjoutMsg'));
	formAfficherMsg.append('id', id);
	formAfficherMsg.append('action','ajouterMsg');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'messagerie/messagerieControleur.php',
		data : formAfficherMsg,
		dataType : 'json', //text pour le voir en format de string
		contentType : false,
		processData : false,
		success : function (reponse){ //alert(reponse);
			messagerieVue(reponse);
		},
		fail : function (err){  
		}
	});
	document.getElementById('textAjoutMsg').value="";
}
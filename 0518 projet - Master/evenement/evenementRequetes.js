function afficherEvent(){
	var formAfficherEvent = new FormData();
	formAfficherEvent.append('action','afficherEvent');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'evenement/evenementControleur.php',
		data : formAfficherEvent,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
			evenementVue(reponse);
		},
		fail : function (err){
			//alert(err);
		}
	});
}

function ajouterEvent(id){
	var formAjouterEvent = new FormData();
	formAjouterEvent.append('id',id);
	formAjouterEvent.append('action','ajouterEvent');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'evenement/evenementControleur.php',
		data : formAjouterEvent,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){ //alert(reponse);
			evenementVue(reponse);
		},
		fail : function (err){
			//alert(err);
		}
	});
}

function creerEvent(destinataire){
	var formCreerEvent = new FormData(document.getElementById('formEvent'));
	formCreerEvent.append('destinataire',destinataire);
	formCreerEvent.append('action','creerEvent');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'evenement/evenementControleur.php',
		data : formCreerEvent,
		contentType : false,
		processData : false,
		dataType : 'text', //text pour le voir en format de string
		success : function (reponse){ alert(reponse);
			//evenementVue(reponse);
		},
		fail : function (err){
			//alert(err);
		}
	});
}
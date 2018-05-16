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


function afficherAcceuil(){
	var formAcc = new FormData();
	formAcc.append('action','afficherAcceuil');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'acceuil/acceuilControleur.php',
		data : formAcc,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					acceuilVue(reponse);
		},
		fail : function (err){
			alert("marche pas");
		}
	});
}
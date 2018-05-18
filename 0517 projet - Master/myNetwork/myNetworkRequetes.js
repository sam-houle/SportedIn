function affMyNetwork(){
	var formaffMyNetwork = new FormData();
	formaffMyNetwork.append('action','affMyNetwork');
	$.ajax({
		type : 'POST',
		url : 'myNetwork/myNetworkControleur.php',
		data : formaffMyNetwork,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					myNetworkVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
/*function afficherListeSportAjout(){
	var formafficherListeSportAjout = new FormData();
	formafficherListeSportAjout.append('action','afficherListeSportAjout');
	formafficherListeSportAjout.append('noAction','true');
	$.ajax({
		type : 'POST',
		url : 'connexion/membreControleur.php',
		data : formafficherListeSportAjout,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					rechercheVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}
function DemandeAmi(id_membre,isAdded){
		var formDemandeAmi = new FormData();
		formDemandeAmi.append('action','DemandeAmi');
		formDemandeAmi.append('id_membre',id_membre);
		$.ajax({
			type : 'POST',
			url : 'Recherche/rechercheControleur.php',
			data : formDemandeAmi,
			dataType : 'json', //text pour le voir en format de string
			//async : false,
			//cache : false,
			contentType : false,
			processData : false,
			success : function (reponse){//alert(reponse);
						//rechercheVue(reponse);
						$('#messageDemande').html(reponse.msgDemande);
						setTimeout(function(){ $('#messageDemande').html(""); }, 5000);
						document.getElementById("ajoutAmiCouleur").classList.remove('grey');
						document.getElementById("ajoutAmiCouleur").classList.add('green');
						$('#ajoutAmiIcone').html("check");
						$('#ajoutAmiCouleur').removeAttr("onclick");
						$('#ajoutAmiCouleur').off("click");
			},
			fail : function (err){
			   
			}
		});
}*/
//function aff
/*function affrechercheAvance(){
	var formFilm = new FormData();
	formFilm.append('action','affrechercheAvance');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Recherche/rechercheControleur.php',
		data : formRechercheAvance,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					rechercheVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}*/
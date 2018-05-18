<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Sported In</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
  <!-- js  -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>       
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  <script language="javascript" src="js/global.js"></script>
  <script language="javascript" src="js/Content.js"></script>


  <script language="javascript" src="connexion/MembreRequetes.js"></script>
  <script language="javascript" src="connexion/membreControleurVue.js"></script>
  	  <script language="javascript" src="acceuil/acceuilRequetes.js"></script>
	  <script language="javascript" src="acceuil/acceuilControleurVue.js"></script>
  	  <script language="javascript" src="Recherche/rechercheRequetes.js"></script>
	  <script language="javascript" src="Recherche/rechercheControleurVue.js"></script>
	  <script language="javascript" src="messagerie/messagerieControleurVue.js"></script>
	  <script language="javascript" src="messagerie/messagerieRequetes.js"></script>
	  <script language="javascript" src="evenement/evenementControleurVue.js"></script>
	  <script language="javascript" src="evenement/evenementRequetes.js"></script>
    
</head>
<body> 
<main>
<div id="nav">
  <nav class="white" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo green-text">Sported In</a>
	  <ul class="right hide-on-med-and-down">
	  	<li>
			<a class='btn waves-effect waves-light green waves-effect' onClick="rendreVisible('divConnexion')">Connexion</a>
		</li>
		<li>
			<!--<form>
				<button class='btn cyan waves-effect waves-light' type='submit' name='submit'>Logout</button>
			</form> -->
		</li>
	<li><button onclick="afficherAcceuil();">salut</button></li>
        
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Connexion</a></li>
		<li><a href="#">S'inscire</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons green-text">menu</i></a>
    </div>
  </nav>
</div>
  <div class="card-panel orange" id="divAlert" style="display:none"></div>  
  <div id="content">
    <div class="container" id="banniere">
	<br>
      <h1 class="header center orange-text">Réseau sportif</h1>
      <div class="row center">
        <h5 class="header col s12 light">Rencontrez des gens qui partagent les mêmes carrières et sports que vous</h5>
      </div>
      <div class="row center">
        <a class="btn-large waves-effect waves-light green" onClick="rendreVisible('divInscription'); rendreInvisible('divConnexion');">S'inscrire</a>
      </div>
      <br><br>
	</div>	
	
	<div class="container">
		<div class="row"> 
		 <div class="col s12 m12 l12" style="display:none" id="divConnexion">
			<div class="card-panel">
				<div class="row">
					<form id="formConnexion" class="col s12">
						<h4 class="header2">Connexion
							<a class="btn-floating grey right" onClick="rendreInvisible('divConnexion');">
							<i class="material-icons">close</i></a>
						</h4>
						<div class="row">
							<div class="input-field col s5">
							  <i class="material-icons prefix">account_circle</i>
							  <input id="compte" name="compte" type="text" class="validate">
							  <label for="compte" class="compte">Courriel</label>
							</div>
							<div class="input-field col s5">
								<i class="material-icons prefix">lockoutline</i>
								<input id="connexion_motdepasse" name="connexion_motdepasse" type="password" class="validate">
								<label for="icon_password">Mot de passe</label> 
							</div>
							<div class="input-field col s2">
							  <button class="btn green waves-effect waves-light right" onClick="connexionMembre();" type="button" name="connexion">Connexion
								<i class="mdi-content-send right"></i>
							  </button>
							</div>
						  </div>
					</form>
				</div>
			 </div>
		  </div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
		<div class="col s12 m12 l12" style="display:none" id="divInscription">
		  <div class="card-panel">
			<h4 class="header2">Inscription
				<a class="btn-floating grey right" onClick="rendreInvisible('divInscription');">
				<i class="material-icons">close</i></a>
			</h4>
			
			<div class="row">
			  <form class="col s12" id="formInscrip" name="formInscrip">
				<div class="row">
				  <div class="input-field col s6">
					<input id="nom" name="nom" type="text" required="required">
					<label for="nom">Nom</label>
				  </div>
				
				  <div class="input-field col s6">
					<input id="prenom" name="prenom" type="text" required="required">
					<label for="prenom">Prénom</label>
				  </div>
				</div>
				<div class="row">
				  <div class="input-field col s6">
					<input id="courriel" name="courriel" type="email" required="required">
					<label for="courriel">Courriel</label>
				  </div>
					<div class="input-field col s6">
					<input id="confirmCourriel" name="confirmCourriel" type="email" required="required">
					<label for="confirmCourriel">Confirmez le courriel</label>
				  </div>
				</div>
				<div class="row">
				  <div class="input-field col s6">
					<input id="motdepasse" name="motdepasse" type="password" required="required">
					<label for="motdepasse">Mot de passe</label>
				  </div>
				  <div class="input-field col s6">
					<input id="confirmMotdepasse" name="confirmMotdepasse" type="password" required="required">
					<label for="confirmMotdepasse">Confirmez mot de passe</label>
				  </div>
				</div>
				<div class="row">
					<div class="file-field input-field">
					  <div class="btn orange waves-effect">
						<span>Photo</span>
						<input id="photo" name="photo" type="file">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					  </div>
					</div>                      
				</div>
				
				<div class = "row">
					<div class="col s5">					
					 <label>Domaine profession</label>             
						 <select class="browser-default" id="profession" name="profession">
						  <option value="Administration">Affaires, finances et administration</option>
						  <option value="Arts">Arts, culture et communication </option>
						  <option value="Construction">Construction, production et manutention </option>
						  <option value="Droit">Droit et protection du public </option>
						  <option value="Gestion">Gestion </option>
						  <option value="Droit">Droit et protection du public </option>
						  <option value="Gestion">Gestion </option>
						  <option value="Hebergement">Hébergement, restauration et services alimentaires </option>
						  <option value="Informatique">Informatique, génie et autres sciences naturelles et appliquées</option>
						  <option value="Sante">Santé</option>
						  <option value="Autre">Autre</option>
					   </select>
					</div>     
					<div class="col s3">
					<label>Sexe</label> 
					   <select id="sexe" name="sexe" class="browser-default">
						  <option value="Femme">Femme</option>
						  <option value="Homme">Homme</option>
						  <option value="Autre">Autre</option>
					   </select>
					</div>	
			
					<div class="col s4">
						<label>Date de naissance</label>             
						<input id="naissance" name="naissance" type="date" class="datepicker" required="required">    
					</div>     
				</div>     
			</div>
			
				<div class = "row">
					<div class="col s3">
						<label>Code postal</label> 
					   <input id="codepostal" name="codepostal" type="text" required="required">
					</div>	
					<div class="col s4">
						<label>Ville</label> 
					   <input id="ville" name="ville" type="text" required="required">
					</div>	
					<div class="col s2">
						<label>Province</label> 
						   <select id="province" name="province" class="browser-default">
							  <option value="AB">AB</option>
							  <option value="BC">CB</option>
							  <option value="PE">IPE</option>
							  <option value="MB">MB</option>
							  <option value="NB">NB</option>
							  <option value="NE">NE</option>
							  <option value="NU">NU</option>
							  <option value="ON">ON</option>
							  <option value="QC">QC</option>
							  <option value="SK">SK</option>
							  <option value="NT">TN</option>
							  <option value="NO">TNO</option>
							  <option value="YT">YN</option>
						   </select>
					</div>
					<div class="col s3">
						<label>Pays</label> 
					   <input id="pays" name="pays" type="text" value="Canada" disabled>
					</div>
				</div> 
				<div class="row">
				  <div class="input-field col s12">
					<textarea id="texte" name="texte" class="materialize-textarea" length="500" required="required"></textarea>
					<label for="texte">Message</label>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					  <button type="button" class="btn cyan waves-effect waves-light right" onClick="inscription();" name="buttonformInscrip">S'inscrire
						<i class="mdi-content-send right"></i>
					  </button>
					</div>
				  </div>
				</form> 
				  </div>
			</div>
		  </div>
		</div>
	</div>
	<br>
  
   <div class="container"> 
	  <div class="row">
            <div class="col s12 m12 l12">
            
			  
				<div class="row card-panel" id="secRecherche">
			    
				<div class="row center-align">
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/hiking.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/canoe.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/badminton.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/baseball.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/basketball.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/boxing.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/fishing.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/racing.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/dancer.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/climbing.png" class="recherche"></i></a>
				</div>
				<div class="row center-align">
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/golf.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/dumbbell.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/running.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/hockey.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/kimono.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/pingpong.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/tennis.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/soccer.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/bicycle.png" class="recherche"></i></a>
					<a class="btn-floating waves-effect waves-light green darker-2"><i class="material-icons"><img src="images/sports/volleyball.png" class="recherche"></i></a>
				</div>
				<br><hr>
				<h4>Recherche</h4><br>
				<div class="row">
					<div class="col s6">					
						<label>Sport</label>             
						<select class="browser-default" id="sport" name="sport">
							<option value="12">Alpinisme</option>
							<option value="6">Aviron</option>
							<option value="2">Badminton</option>
							<option value="1">Baseball</option>
							<option value="3">Basketball</option>
							<option value="5">Boxe</option>
							<option value="10">Chasse et pêche</option>
							<option value="20">Course auto</option>
							<option value="8">Danse</option>
							<option value="7">Escalade</option>
							<option value="11">Golf</option>
							<option value="9">Gym</option>
							<option value="14">Jogging</option>
							<option value="13">Hockey</option>
							<option value="15">Arts martiaux</option>
							<option value="18">Tennis</option>
							<option value="16">Tennis de table</option>
							<option value="17">Soccer</option>
							<option value="4">Vélo</option>
							<option value="19">Volleyball</option>
						</select>	
					</div>					
					
					<div class="col s3">
						<label>Distance</label> 
						  <select id="distance" name="distance" class="browser-default">
							  <option value="5">5 km</option>
							  <option value="10">10 km</option>
							  <option value="25">25 km</option>
						   </select>
					</div>						
					
					<div class="col s3">
						<label>Sexe</label> 
						   <select id="sexe" name="sexe" class="browser-default">
							  <option value="Femme">Femme</option>
							  <option value="Homme">Homme</option>
							  <option value="Autre">Autre</option>
						   </select>
					</div>	
				</div>
				<div class="row" >
					<div class="col s6">					
						<label>Domaine profession</label>             
						<select class="browser-default" id="profession" name="profession">
							<option value="Administration">Affaires, finances et administration</option>
							<option value="Arts">Arts, culture et communication </option>
							<option value="Construction">Construction, production et manutention </option>
							<option value="Droit">Droit et protection du public </option>
							<option value="Gestion">Gestion </option>
							<option value="Droit">Droit et protection du public </option>
							<option value="Gestion">Gestion </option>
							<option value="Hebergement">Hébergement, restauration et services alimentaires </option>
							<option value="Informatique">Informatique, génie et autres sciences naturelles et appliquées</option>
							<option value="Sante">Santé</option>
							<option value= "Autre">Autre</option>
						</select>
					</div> 
					<div class="input-field col s6">
                          <button class="btn green waves-effect waves-light right" type="submit" name="action">Rechercher
                            <i class="mdi-content-send right"></i>
                          </button>
                      </div>
			
			  </div>
		  </div>
		 </div>
		</div>
		
		<div class="row">
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="images/profil1.jpg">
				</div>
				<div class="card-content">
				<span class="card-title">Anna Jean</span>
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
	
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="images/profil2.jpg">
				  
				</div>
				<div class="card-content">
				<span class="card-title">Amine Rais</span>
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
		
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="images/profil3.jpg">				  
				</div>
				<div class="card-content">
				<span class="card-title">Ellen Page</span>
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
		
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="images/profil4.jpg">
				</div>
				<div class="card-content">
				  <span class="card-title">Kevin Blais</span>
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
		</div>
	</div>
	</div>
</main>
  <footer class="page-footer green darken-2">
    
    <div class="footer-copyright">
      <div class="container">
        © 2018
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

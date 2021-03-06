<?php 
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
// echo "andré";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Réseau sportif</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  
  <script language="javascript" src="js/global.js"></script>
        <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
      
      <script>
         $(document).ready(function() {
            $('select').material_select();
         });
		 
      </script>
</head>
<body> 
  <nav class="green" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Sported In</a>
	  <ul class="right hide-on-med-and-down">
	  	<li>
	  		<?php 
			if (!isset($_SESSION['u_id'])) {
	  echo "<a class='btn waves-effect waves-light cyan waves-effect' onClick='rendreVisible(\"divConnexion\");'>Connexion</a>";
	}
	  ?>
	</li>
	<li>
		
			
		
		<?php 
			if (isset($_SESSION['u_id'])) {
				echo "<form action='includes/logout.inc.php' method='POST'>";
				echo "<button class='btn cyan waves-effect waves-light' type='submit' name='submit'>
				Logout</button>";
				echo "</form>";
			}
		?>
	</li>
        
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    
	</form>
  
    <div class="container" id="banniere">
      <h1 class="header center orange-text">Réseau sportif</h1>
      <div class="row center">
        <h5 class="header col s12 light">Rencontrez des gens qui partagent les mêmes carrières et sports que vous</h5>
      </div>
      <div class="row center">
        <a class="btn-large waves-effect waves-light orange" onClick="rendreVisible('divInscription');">S'inscrire</a>
      </div>
      <br><br>

	<div class="row"> 
	 <div class="col s12 m12 l12" style="display:none" id="divConnexion">
	    <div class="card-panel">
            <div class="row">
                <form action="includes/login.inc.php" method="POST" class="col s12">
					<h4 class="header2">Connexion</h4>
					<div class="row">
						<div class="input-field col s4">
						  <i class="material-icons prefix">account_circle</i>
						  <input id="courriel_conn" name="courriel_conn" type="text" class="validate">
						  <label for="courriel_conn" class="">Courriel</label>
						</div>
						<div class="input-field col s4">
							<i class="material-icons prefix">lockoutline</i>
							<input id="motdepasse_conn" name="motdepasse_conn" type="text" class="validate">
							<label for="motdepasse_conn">Mot de passe</label> 
						</div>
						<div class="input-field col s4">
							<div class="input-field col s12">
								<button class="btn cyan waves-effect waves-light" type="submit" name="submit"><i class="mdi-action-lock-open"></i>Login</button>
								
							</div>
						</div>
					</div>
                </form>
            </div>
         </div>
	  </div>
	</div>
  
	<div class="row">
            <div class="col s12 m12 l12" style="display:none" id="divInscription">
              <div class="card-panel">
                <h4 class="header2">Inscription</h4>
                <div class="row">
                  <form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data" class="col s12" id="formInscription" name="formInscription">
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
						<div class="col s6">
						<label>Sexe</label> 
						   <select id="sexe" name="sexe" class="browser-default">
							  <option value="Femme">Femme</option>
							  <option value="Homme">Homme</option>
							  <option value="Autre">Autre</option>
						   </select>
						</div>	
				
						<div class="col s6">					
							<label>Date de naissance</label>             
							<input id="naissance" name="naissance" type="date" class="datepicker" required="required">    
						</div>     
					</div>     
                </div>
					<div class = "row">
						<div class="col s6">
						<label>Code postal</label> 
						   <input id="codepostal" name="codepostal" type="text" required="required">
						</div>	
					
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
					</div> 
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="texte" name="texte" class="materialize-textarea" length="500"></textarea required="required">
                        <label for="texte">Message</label>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="submit">S'inscrire
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
            <div class="col s12 m12 l12">
              <div class="card-panel green" id="secRecherche"> 
				<h5 class="white-text">Recherche sports</h5>
				
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/basketball.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/soccer.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/tennis.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/golf.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/pingpong.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/badminton.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/volleyball.png" class="recherche"></i></a>
				<a class="btn-floating waves-effect waves-light orange"><i class="material-icons"><img src="images/bicycle.png" class="recherche"></i></a>
				<br><br>
				<div class="row card-panel" >
										
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

					<div class="col s2">
						<label>Distance</label> 
						  <select id="distance" name="distance" class="browser-default">
							  <option value="5">5 km</option>
							  <option value="10">10 km</option>
							  <option value="25">25 km</option>
						   </select>
					</div>						
					
					<div class="col s4">
						<label>Sexe</label> 
						   <select id="sexe" name="sexe" class="browser-default">
							  <option value="Femme">Femme</option>
							  <option value="Homme">Homme</option>
							  <option value="Autre">Autre</option>
						   </select>
					</div>	
				</div> 
			
		  </div>
		 </div>
		</div>
		
		<div class="row">
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
				  <span class="card-title">Card Title</span>
				</div>
				<div class="card-content">
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
	
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
				  <span class="card-title">Card Title</span>
				</div>
				<div class="card-content">
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
		
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
				  <span class="card-title">Card Title</span>
				</div>
				<div class="card-content">
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
		
			<div class="col s12 m3">
			  <div class="card">
				<div class="card-image">
				  <img src="http://www.mstrafo.de/fileadmin/_processed_/b/1/csm_person-placeholder-male_5602d73d5e.png">
				  <span class="card-title">Card Title</span>
				</div>
				<div class="card-content">
				  <p>I am a very simple card. I am good at containing small bits of information.
				  I am convenient because I require little markup to use effectively.</p>
				</div>
			  </div>
			</div>
		</div>
	</div>	 

  <footer class="page-footer green">
    
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

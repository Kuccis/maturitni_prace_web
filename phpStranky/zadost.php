<?php
	session_start();
	include_once '../skripty/dtb.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../Bootstrap/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src='https://www.google.com/recaptcha/api.js?hl=cs'></script>

  <link rel="shortcut icon" href="../foto/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../foto/favicon.ico" type="image/x-icon">

<title>Unit Roleplay</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#c3cdd7;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" id="menuUvodLogo" href="../index.php"><img src="../foto/UNIT_PNG.png" class="logoNavbar"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menuUvod">
          <li class="nav-item">
            <a class="nav-link" href="oprojektu.php"><i class="fas fa-clipboard-list" style="margin-right:7px;"></i>O projektu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ateam.php"><i class="fas fa-address-book" style="margin-right:7px;"></i>A-team</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-info-circle" style="margin-right:7px;"></i>
              Pravidla
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="zakprav.php">Základní pravidla</a>
              <a class="dropdown-item" href="frakprav.php">Frakční pravidla</a>
							<a class="dropdown-item" href="police.php">Police Department</a>
							<a class="dropdown-item" href="zakony.php">Zákony</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="twitch.php"><i class="fab fa-twitch" style="margin-right:7px;"></i>Twitch</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php"><i class="fas fa-book" style="margin-right:7px;"></i>Fórum</a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="donate.php"><i class="fas fa-donate" style="margin-right:7px;"></i>Donate</a>
          </li>
        </ul>
        <div class="ml-auto" id="profilLinky">
					<a href="https://www.youtube.com/channel/UCMqicaPkmGkEmu9b4QvciJA" target="_blank"><i class="fab fa-youtube" id="youtubeLogo"></i></a>
          <a href="https://discord.gg/CQp2HRT" target="_blank"><i class="fab fa-discord" id="discordLogo"></i></a>
          <a href="https://www.instagram.com/unitrp_/" target="_blank"><i class="fab fa-instagram" id="instagramLogo"></i></a>
					<?php

						if(!isset($_SESSION['idUzivatele'])){
          		echo '<button type="submit" class="btn btn-light btn-lg" data-toggle="modal" data-target="#modalLogin" style="margin-top: -5px;float:right;">Login</button>';
						}
						else{
							echo '<form action="../skripty/odhlaseni.php" method="post" style="float:right;">
								  		 <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
											 if(isset($_SESSION['idUzivatele'])){
		 									 		if($_SESSION['statusUzivatele'] == 0){
														$filename="../profilovka/profile".$_SESSION['idUzivatele']."*";
														$fileinfo=glob($filename);
														$fileext=explode(".",$fileinfo[0]);
														echo '<img src="../profilovka/profile'.$_SESSION['idUzivatele'].'.'.$fileext[3].'" id="profilFoto" width="50" height="45" alt="Profilová fotka"></a>';
											 		}
													else{
														echo '<img src="../profilovka/default.jpg" id="profilFoto" width="50" height="48" alt="Profilová fotka"></a>';
													}
											}
							echo	  '<a id="jmenoUzivateleNavbar" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['jmenoUzivatele'].'</a>

											 <!--DROPDOWN MENU PROFILOVKA-->
		 											<div class="dropdown-menu" id="dropMenu">';
														if($_SESSION['stavBan'] == 0 && $_SESSION['whitelist']== 0)
														{
															echo '<button class="dropdown-item" style="cursor:pointer;text-align: center; background-color: #fcdf9f;font-weight: bold;color:black;font-size: 20px;" disabled>Non-Whitelisted</button>';
														}
														else if($_SESSION['stavBan'] == 1)
														{
															echo '<button class="dropdown-item" style="cursor:pointer; text-align: center; background-color: #e8a49b;font-weight: bold;color:black;font-size: 20px;" disabled>Banned</button>';
														}
														else if($_SESSION['stavBan'] == 2)
														{
															echo '<button class="dropdown-item" style="cursor:pointer; text-align: center; background-color: #f58273;font-weight: bold;color:black;font-size: 20px;" disabled>Blacklisted</button>';
														}
														else if($_SESSION['whitelist']==1)
														{
															echo '<button class="dropdown-item" style="cursor:pointer; text-align: center; background-color: #a5cc9f;font-weight: bold;color:black;font-size: 20px;" disabled>Whitelisted</button>';
														}
		 								echo	 '<a class="dropdown-item" href="nastaveni.php">Nastavení</a>
		 										    <a class="dropdown-item" href="mojeZadosti.php">Moje žádosti</a>';
														$emailU=$_SESSION['emailUzivatele'];
														$sql= "SELECT * FROM zadostwhitelist WHERE email='$emailU' ORDER BY id DESC";
						            	  $vys= mysqli_query($pripojeni,$sql);
														$row = mysqli_fetch_assoc($vys);
														$pocetZadosti=mysqli_num_rows ($vys);
														if($pocetZadosti >= 0 && $pocetZadosti <= 3){
															if($_SESSION['whitelist']==0 && $_SESSION['stavBan'] == 0){
																	if($row['schvaleno']==1 || $pocetZadosti == 0){
							 											echo	'<a class="dropdown-item" href="zadost.php">Žádost o Whitelist</a>';
																	}
															}
														}
														if($_SESSION['adminStav'] > 3){
				 											echo	'<a class="dropdown-item" href="zadostiWhitelist.php">Žadatelé o whitelist</a>';
															echo	'<a class="dropdown-item" href="editorPravidel.php">[EDIT] základní pravidla</a>';
                              echo	'<a class="dropdown-item" href="editorFrakPravidel.php">[EDIT] frakční pravidla</a>';
															echo	'<a class="dropdown-item" href="editorPolice.php">[EDIT] Police Department</a>';
															echo	'<a class="dropdown-item" href="editorZakonu.php">[EDIT] zákony</a>';
															echo	'<a class="dropdown-item" href="amenu.php"><i class="fas fa-user-cog" style="margin-right:5px;"></i>Admin list<i class="fas fa-user-cog" style="margin-left:5px;"></i></a>';
														}
														else if($_SESSION['adminStav'] == 1){
															echo	'<a class="dropdown-item" href="zadostiWhitelist.php">Žadatelé o whitelist</a>';
														}
				 							echo			   '<div class="dropdown-divider"></div>
				 										    <button class="dropdown-item" type="submit" style="cursor:pointer;">Odhlásit se</button>
				 										  </div>
			 										<!--KONEC DROPDOWN MENU PROFILOVKA-->
												</form>';
						}
					?>
      </div>
    </div>
  </nav>
  <!--MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL MODAL-->


			<div class="modal fade seminor-login-modal" data-backdrop="static" id="modalRegistr">
		      <div class="modal-dialog modal-dialog-centered modal-lg">
		        <div class="modal-content">
		          <div class="modal-header">
		           <h5 class="modal-title">Zaregistrujte se</h5>
		          </div>
		          <br>
		          <form class="modal-body seminor-login-form" method="post" action="../skripty/registrace.php">
		            <div class="form-group">
		              <input type="text" class="form-control" name="jmeno">
		              <label class="form-control-placeholder">Uživatelské jméno</label>
		            </div>
		            <div class="form-group">
		              <input type="email" class="form-control" name="email">
		              <label class="form-control-placeholder">E-mail</label>
		            </div>
		            <div class="form-group">
		              <input type="password" class="form-control" name="heslo1">
		              <label class="form-control-placeholder">Heslo (min. 8 znaků)</label>
		            </div>
		            <div class="form-group">
		              <input type="password" class="form-control" name="heslo2">
		              <label class="form-control-placeholder">Potvrzení hesla</label>
		            </div>
								<div class="form-group" style="background-color:unset!important;border:unset!important;height:unset!important;width: 308px;">
								  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="souhlasim_se_zpracovanim_udaju" name="gdprCheck">
								  <label class="form-check-label" for="inlineCheckbox1">Seznámil/a jsem se s <a href="gdpr.php">informacemi o zpracování osobních údajů</a></label>
								</div>
								<div class="g-recaptcha" data-sitekey="6Ldd7fwUAAAAAPCU09wt00lbvnBU6cJxbFoAIdbu" style="display: table;margin-left:auto;margin-right:auto;"></div>
		            <br>
		            <input type="submit" name="registrace" class="loginButton" value="Registrovat se">
		          </form>
		          <br>
		          <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
		            </div>
		        </div>
		      </div>
		    </div>

		  <div class="modal fade seminor-login-modal" id="modalLogin" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Přihlásit se</h5>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		        </div>
		        <div class="modal-body">
							<form class="modal-body" method="post" action="../skripty/login.php">
		                <div class="form-group">
		                  <input type="email" class="form-control" name="email">
		                  <label class="form-control-placeholder">E-mail</label>
		                </div>
		                <div class="form-group">
		                  <input type="password" class="form-control" name="heslo1">
		                  <label class="form-control-placeholder">Heslo</label>
		                </div>
										<div class="create-new-fau text-center pt-3">
											<a href="zapomenuteHeslo.php" class="text-primary-fau">Zapomenuté heslo</a>
		                </div>
		                <input type="submit" name="login" class="loginButton" value="Login">
		                <div class="create-new-fau text-center pt-3">
		                    <a href="#" class="text-primary-fau"><span data-toggle="modal" data-target="#modalRegistr" data-dismiss="modal">Nejste zaregistrovaný? Zaregistrujte se zde!</span></a>
		                </div>
		                <br>
		          </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
		        </div>
		      </div>
		    </div>
		  </div>

  <!--KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL KONEC MODAL-->
	<?php
	  $celaURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(strpos($celaURL,"zadost=odeslana") == true){
			echo	'<div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Úspěšně jste odeslal/a žádost o whitelist!</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot1=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil jste pole s Discord jménem!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot4=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil/a jste pole s popisem odkud jste se o nás dozvěděl/a!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot5=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil/a jste pole s popisem proč u nás chcete RPit!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot6=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil/a jste pole s odpovědí kolik hodin jste na roleplayi odehráli!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot7=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Neodpověděl/a jste na otázku o co vše Vás může zloděj obrat!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot8=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Neodpověděl/a jste na otázku jak vyřešíte situaci v případě, že do Vás někdo nabourá!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot9=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Neodpověděl/a jste na otázku co je to KOS!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot10=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Neodpověděl/a jste na otázku co plánujete RPit!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot11=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Nevyplnil/a jste pole s životopisem Vaší postavy!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"ot12=error") == true){
			echo	'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Pozor!</strong> Neodpověděl/a jste na otázku za jakých podmínek můžete vstoupit do cizí budovy!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
		else if(strpos($celaURL,"error=sqlerror") == true){
			echo	'<div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMess">
							  <strong>Chyba!</strong> Někde vznikl problém!! Kontaktuj administrátora webu (MarravinCZ)!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
		}
	  ?>


		<?php
				$emailU=$_SESSION['emailUzivatele'];
				$sql= "SELECT * FROM zadostwhitelist WHERE email='$emailU' ORDER BY id DESC";
				$vys= mysqli_query($pripojeni,$sql);
				$row = mysqli_fetch_assoc($vys);
				$pocetZadosti=mysqli_num_rows ($vys);
				if(isset($_SESSION['idUzivatele'])){
					if($_SESSION['whitelist']==0 && $_SESSION['stavBan'] == 0 && $row['schvaleno'] != 2 && $row['schvaleno'] != 0 || $pocetZadosti==0 && $pocetZadosti <= 3){
						echo '
						<div class="container" id="textUvod">
					    <div class="row">
					      <h1 class="uvodVety" style="font-size: 70px;font-weight: bold;">Žádost o whitelist</h1>
					    </div>
					    <div class="row">
					      <h2 class="uvodVety" style="font-style: italic;">Roleplay is yours…</h2>
					    </div>
					    <br>
						<div class="row" style="background-color: rgba(103, 103, 103, 0.74);border-radius: 5px;">
							<form class="formularZadost" method="post" action="../skripty/ulozitZadost.php">
									<label for="otazka1">Jméno (Discord)</label>
							    <input type="text" class="form-control" id="otazka1" placeholder="Zadejte vaše jméno na aplikaci Discord" name="otazka1" value="'.$_SESSION['otazka1'].'">
									<br>
									<label for="otazka1">Splňuješ hranici věku? (16 let)</label>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="otazka2" id="exampleRadios1" value="Ano, splňuji." checked>
									  <label class="form-check-label" for="exampleRadios1">
									    Ano, splňuji.
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="otazka2" id="exampleRadios2" value="Ne, nesplňuji.">
									  <label class="form-check-label" for="exampleRadios2">
									    Ne, nesplňuji.
									  </label>
									</div>
									<br>
									<label for="otazka3">Pokud nesplňuješ hranici, řekni nám, v čem vynikáš a v čem naopak ne</label>
							    <textarea class="form-control" name="otazka3" id="otazka3" rows="2">'.$_SESSION['otazka3'].'</textarea>
									<br>
									<label for="otazka4">Jak ses o nás dozvěděl?</label>
							    <textarea class="form-control" name="otazka4" id="otazka4" rows="2">'.$_SESSION['otazka4'].'</textarea>
									<br>
									<label for="otazka5">Proč bys chtěl RPit u nás?</label>
									<textarea class="form-control" name="otazka5" id="otazka5" rows="2">'.$_SESSION['otazka5'].'</textarea>
									<br>
									<label for="otazka6">Kolik máš nahraných hodin na RP serverech?</label>
									<textarea class="form-control" name="otazka6" id="otazka6" rows="2">'.$_SESSION['otazka6'].'</textarea>
									<br>
									<label for="otazka7">O co vše tě může zloděj okrást?</label>
									<textarea class="form-control" name="otazka7" id="otazka7" rows="2">'.$_SESSION['otazka7'].'</textarea>
									<br>
									<label for="otazka8">Nabourá do tebe na křižovatce jiný hráč. Jak budeš celkově tuto situaci rpit?</label>
									<textarea class="form-control" name="otazka8" id="otazka8" rows="2">'.$_SESSION['otazka8'].'</textarea>
									<br>
									<label for="otazka9">Co je to KOS a zkus ho stručně popsat</label>
									<textarea class="form-control" name="otazka9" id="otazka9" rows="2">'.$_SESSION['otazka9'].'</textarea>
									<br>
									<label for="otazka10">Co máš v plánu rpit</label>
									<textarea class="form-control" name="otazka10" id="otazka10" rows="2">'.$_SESSION['otazka10'].'</textarea>
									<br>
									<label for="otazka11">Životopis tvé plánované postavy</label>
									<textarea class="form-control" name="otazka11" id="otazka11" rows="2">'.$_SESSION['otazka11'].'</textarea>
									<br>
									<label for="otazka12">Za jakých podmínek můžeš vstoupit do frakční budovy, když se vlastník nenachází na serveru?</label>
									<textarea class="form-control" name="otazka12" id="otazka12" rows="2">'.$_SESSION['otazka12'].'</textarea>
									<br>
									<label for="otazka13">Rozuměl si komunitním pravidlům?</label>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="otazka13" id="ot13ano" value="Ano, rozuměl." checked>
									  <label class="form-check-label" for="ot13ano">
									    Ano, rozuměl.
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="otazka13" id="ot13ne" value="Ne, nerozuměl.">
									  <label class="form-check-label" for="ot13ne">
									    Ne, nerozuměl.
									  </label>
									</div>
									<input type="submit" name="odeslatZadost" class="loginButton" value="Odeslat žádost">
						</form>
				    </div>
				  </div>';
				}
				else{
					echo '<div class="container" id="textUvod">
									<div class="row">
										<h1 class="uvodVety" style="font-size: 70px;font-weight: bold;color:white;">Něco se nepovedlo! Vrať se na úvodní stránku!</h1>
									</div>
								</div>';
				}
			}
			else{
				echo '<div class="container" id="textUvod">
								<div class="row">
									<h1 class="uvodVety" style="font-size: 70px;font-weight: bold;color:white;">Něco se nepovedlo! Vrať se na úvodní stránku!</h1>
								</div>
							</div>';
			}
		?>


</body>
</html>

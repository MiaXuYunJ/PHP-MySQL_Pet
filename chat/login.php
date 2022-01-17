<html>
	<head>
		<title>Login CHAT</title>
		<style type="text/css">
			label{
				font-size:30px;
				padding-left: 800px;
			}

        </style>
	</head>

<body background="background.jpg"  style=" background-repeat:no-repeat ;
            background-size:100%;background-attachment: fixed;">
		<form  method="post">
		<br/><br/>
			<h1 style="padding-left: 650px;font-size:50px;">S'il vous plait Connectez-vous d'abord !</h1>
			
			<?php 
			include ("connexion.php");
			
			$link=connexion();
			
			echo"<label>Nom de utilisateur：<input type='text' name='nom'  /><span></span></label>";
			echo"<br/><br/>";
			echo"<label>Mot de Passe：<input type='password' name='pass'  /><span></span></label>";
			if(isset($_POST['submit'])){
			    echo "<script type='text/javascript'>var msg=confirm('Allez vous inscrire');
                    if (msg) {window.location.href = 'inscrire.php'; } 
                    </script>";
			}
			if(isset($_POST['submit1'])){
			    if(empty($_POST['nom'])){
			        echo "<script type='text/javascript'>alert('Le nom d\'utilisateur ne peut pas être vide !');</script>";
			    }
			    if(empty($_POST['pass'])){
			        echo "<script type='text/javascript'>alert('Le mot de passe ne peut pas être vide ! ');</script>";
			    }

			    $_POST=escape($link,$_POST);
			    $query="SELECT * FROM utilisateur WHERE NomdeUtilisateur='{$_POST['nom']}' and MotdePasse='{$_POST['pass']}'";
			    $result=execute($link, $query);
			    if(mysqli_num_rows($result)==1){
			        echo "<script type='text/javascript'>var msg=confirm('Login réussie! '+'\u000dBienvenue/ welcome/ 欢迎'+'{$_POST['nom']}');
                    if (msg) {window.location.href = 'index.php'; }
                    </script>";
			    }
			    else{
			        echo "<script type='text/javascript'>alert('La saisie est incorrecte ou vous n\'êtes pas encore inscrit, veuillez réessayer ou cliquez sur le bouton d\'inscription !  ');</script>";
			    }
			}
			?>
			<br/><br/>
			<input class="btn" type="submit" name="submit1" value="Login" style="width:100px;height:40px;margin-left: 900px;"/>
			<br/>
			<font size="7" style="padding-left: 800px;">Pas de compte? </font>		
			<input class="btn" type="submit" name="submit" value="Inscrire" style="width:100px;height:40px;margin-bottom: 100px;margin-left: 3px;"/>
			
		</form>
	</body>
</html>

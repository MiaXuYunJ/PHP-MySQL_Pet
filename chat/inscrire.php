<html>
	<head>
		<title>Inscrire CHAT</title>
		<style type="text/css">
			label{
				font-size:30px;
				padding-left: 650px;
			}

        </style>
	</head>

<body background="background.jpg"  style=" background-repeat:no-repeat ;
            background-size:100%;background-attachment: fixed;">
		<form  method="post">
		<br/><br/>
			<h1 style="padding-left: 650px;font-size:50px;">Enregistrer un nouveau compte  !</h1>
			
			<?php 
			include ("connexion.php");
			
			$link=connexion();
			
			echo"<label>Nom de utilisateur：<input type='text' name='nom' maxlength='45' /><span>*Le nom d'utilisateur ne peut pas être vide ！</span></label>";
			echo"<br/><br/>";
			echo"<label>Mot de Passe：<input type='password' name='pass' maxlength='45' /><span>*Le mot de passe ne peut pas être vide !</span></label>";
			if(is_login($link)){
			    echo "<script type='text/javascript'>var msg=confirm('Vous êtes déjà inscrit, s\'il vous plaît ne pas vous inscrire à nouveau!');
                    if (msg) {window.location.href = 'login.php'; }
                    </script>";
			}
			if(isset($_POST['submit'])){
			    echo "<script type='text/javascript'>var msg=confirm('Sur le point de revenir à la page de connexion!');
                    if (msg) {window.location.href = 'login.php'; } 
                    </script>";
			}
			if(isset($_POST['submit1'])){
			    if(empty($_POST['nom'])){
			        echo "<script type='text/javascript'>alert('Le nom d\'utilisateur ne peut pas être vide !');</script>";
			    }
			    if(empty($_POST['pass'])){
			        echo "<script type='text/javascript'>alert('Le mot de passe ne peut pas être vide ! ');</script>";
			    }
			    if(mb_strlen($_POST['nom'])>32){
			        echo "<script type='text/javascript'>alert('La longueur du nom d'utilisateur ne doit pas dépasser 45 caractères !  ');</script>";
			    }
			    if(mb_strlen($_POST['pass'])>32){
			        echo "<script type='text/javascript'>alert('La longueur du mot de passe ne doit pas dépasser 45 caractères !  ');</script>";
			    }

			    $query="INSERT INTO utilisateur (IdUtilisateur,NomdeUtilisateur,MotdePasse) VALUES (' ' , '{$_POST['nom']}','{$_POST['pass']}')";
			    $result=execute($link, $query);
			    if(mysqli_affected_rows($link)==1){
			        setcookie('chat[nom]',$_POST['nom']);
			        setcookie('chat[pass]',$_POST['pass']);
			        echo "<script type='text/javascript'>var msg=confirm('Inscrire réussie! '+'\u000dBienvenue/ welcome/ 欢迎'+'{$_POST['nom']}');
                    if (msg) {window.location.href = 'index.php'; }
                    </script>";
			    }
			    else{
			        echo "<script type='text/javascript'>alert('L/'enregistrement a échoué, veuillez réessayer ! ');</script>";
			    }
			}
			?>
			<br/><br/>
			<input class="btn" type="submit" name="submit1" value=" Inscrire" style="width:100px;height:40px;margin-left: 900px;"/>	&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="btn" type="submit" name="submit" value="Annuler" style="width:100px;height:40px;"/>
			
		</form>
	</body>
</html>

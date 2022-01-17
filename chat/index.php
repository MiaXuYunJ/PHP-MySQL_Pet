<!DOCTYPE html>
<html>
	<head>
		<title>CHAT</title>
		
		<style type="text/css">
			td{
				font-size:30px;
			}
			h1{
				padding-left: 750px;
				font-size:50px;
			}
			
        </style>	
	</head>

<body background="background.jpg"  style=" background-repeat:no-repeat ;
            background-size:100%;background-attachment: fixed;">
            <?php
                include ("connexion.php");
                if(isset($_POST['submit1'])){
                    skip('login.php','Aller à la page de Login ');
                }
                if(isset($_POST['submit'])){
                    skip('inscrire.php','Aller à la page d\'inscription');
                }
            ?>
            
		<form method="post">
			<h1>Bienvenue au Pays des Chats !</h1>

			<input  class="btn" type="submit" name="submit1" value="Login" style="width:100px;height:40px;margin-left: 1500px;"/>&nbsp;&nbsp;&nbsp;&nbsp;
			<label >Pas de compte? 	<input class="btn" type="submit" name="submit" value="Inscrire" style="width:100px;height:40px;"/><span></span></label>


			<?php 				
			
				$link=connexion();
				
				$page=isset($_GET['p'])? $_GET['p']:1;
				$sql = "SELECT * FROM Races_de_chat ";
				$result=execute($link, $sql);

				echo "<table border=3 cellpadding=5 cellspacing=0 width='75%' align='center'>";
				echo "<tr> <td>IdRaces</td> <td>Image</td> <td>Variete</td> <td>Chat Domestique</td> 
                            <td>Celebre_Indigene</td> <td>Information</td> <td>Habitudes</td> <td>Merite</td> <td>Defaut</td> </tr> ";
				while ($rows=mysqli_fetch_assoc($result)){
				    echo"<tr>";
				    echo "<td>{$rows['IdRaces']}</td>";
				    echo '<td><img  src="data:image/jpg; base64,'.base64_encode($rows['image']).'"/>' . "<br/></td>";
				    echo "<td>{$rows['Variete']}</td>";
				    echo "<td>{$rows['ChatDomestique']}</td>";
				    echo "<td>{$rows['Celebre_Indigene']}</td>";
				    echo "<td>{$rows['Information']}</td>";
				    echo "<td>{$rows['Habitudes']}</td>";
				    echo "<td>{$rows['Merite']}</td>";
				    echo "<td>{$rows['Defaut']}</td>";
				    echo "</tr>";
				}
				echo "</table>";//Donn��es de sortie de boucle 
	       ?>	
		</form>
	</body>
</html>

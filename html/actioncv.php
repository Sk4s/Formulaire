<?php

echo "</br>Vous venez de remplir mon formulaire de contact ... Et maintenant ?</br>";
$image = "https://zippy.gfycat.com/UntidyPlumpDore.gif";
print '<img src="https://zippy.gfycat.com/UntidyPlumpDore.gif" />'

?>

<?php

echo "<a href='formcv.html'>Retour au formulaire</a>";

?>

<?php

// Récupérer les données dans des variables :

//$_POST['gender'];
//$_POST['nom'];
//$_POST['prenom'];
//$_POST['adresse'];
//$_POST['codepostal'];
//$_POST['ville'];
//$_POST['country'];
//$_POST['telephone'];
//$_POST['email']; 
//$_POST['homepage'];
//$_POST['sujet'];
//$_POST['priority'];
//$_POST['message'];

/*
echo "</br></br>Vos Informations :</br>";
echo $_POST['gender'];
echo $_POST['nom'];
echo $_POST['prenom'];
echo $_POST['adresse'];
echo $_POST['codepostal'];
echo $_POST['ville'];
echo $_POST['country'];
echo $_POST['telephone'];
echo $_POST['email'];
echo $_POST['homepage'];
echo $_POST['sujet'];
echo $_POST['priority'];
echo $_POST['message'];
*/

// Créer un fichier dans le répertoire qui va contenir les données (BONUS ! AUCUN LIEN AVEC LA BDD !) :


//$myfile = fopen("data.txt", "w") or die("Unable to open file ! Go back to sleep !");

//$txt = $_POST['gender'];
//fwrite($myfile, $txt);
//$txt = $_POST['nom'];
//fwrite($myfile, $txt);
//$txt = $_POST['prenom'];
//fwrite($myfile, $txt);
//$txt = $_POST['adresse'];
//fwrite($myfile, $txt);
//$txt = $_POST['codepostal'];
//fwrite($myfile, $txt);
//$txt = $_POST['ville'];
//fwrite($myfile, $txt);
//$txt = $_POST['country'];
//fwrite($myfile, $txt);
//$txt = $_POST['telephone'];
//fwrite($myfile, $txt);
//$txt = $_POST['email'];
//fwrite($myfile, $txt);
//$txt = $_POST['homepage'];
//fwrite($myfile, $txt);
//$txt = $_POST['sujet'];
//fwrite($myfile, $txt);
//$txt = $_POST['priority'];
//fwrite($myfile, $txt);
//$txt = $_POST['message'];
//fwrite($myfile, $txt);

?>

<?php

// Connexion à la base de données :

/*
try
{
	$objetPdo = new PDO('mysql:host=localhost;dbname=;charset=utf8','','');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
*/

$objetPdo = new PDO('mysql:host=localhost;dbname=','','');

#_______________________________________________ 
#												|
# dbname = nom de votre BDD 					|
# '' = votre mot de passe 						|
#_______________________________________________|

// Création de la requête d'insertion :

#INSERT INTO `doonées`(`ID`, `Gender`, `Nom`, `Prénom`, `Adresse`, `Code Postal`, `Ville`, `Country`, `Téléphone`, `Email`, `Homepage`, `Sujet`, `Priority`, `Message`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])

/*
$pdoStat = $objetPdo->prepare('INSERT INTO doonées (`ID`, `Gender`, `Nom`, `Prénom`, `Adresse`, `Code Postal`, `Ville`, `Country`, `Téléphone`, `Email`, `Homepage`, `Sujet`, `Priority`, `Message`) VALUES (NULL, :gender, :nom, :prenom, :adresse, :codepostal, :ville, :pays, :telephone, :email, :siteweb, :sujet, :priority, :message)');
*/

#$pdoStat = $objetPdo->prepare('INSERT INTO doonées(Gender, Nom, Prénom, Adresse, Code Postal, Ville, Country, Téléphone, #Email, Homepage, Sujet, Priority, Message) VALUES (:ge, :no, :pru, :ad, :co, :vi, :pa, :te, :em, :si, :su, :prd, :me)');

#$pdoStat = $objetPdo->prepare('INSERT INTO doonées(Gender, Nom, Prénom, Adresse, Code Postal, Ville, Country, Téléphone, #Email, Homepage, Sujet, Priority, Message) VALUES ('$_POST['gender']', '$_POST['nom']', '$_POST['prenom']', #'$_POST['adresse']', '$_POST['codepostal']', '$_POST['ville']', '$_POST['country']', '$_POST['telephone']', #'$_POST['email']', '$_POST['homepage']', '$_POST['sujet']', '$_POST['priority']', '$_POST['message']')');

#$pdoStat = $objetPdo->prepare('INSERT INTO doonées(Gender, Nom, Prénom, Adresse, Code Postal, Ville, Country, Téléphone, #Email, Homepage, Sujet, Priority, Message) VALUES ('$gender', '$nom', '$prenom', '$adresse', '$codepostal', '$ville', #'$country', '$telephone', '$email', '$homepage', '$sujet', '$priority', '$message')');

$pdoStat = $objetPdo->prepare('INSERT INTO doonees VALUES(NULL, :ge, :no, :pru, :ad, :co, :vi, :pa, :te, :em, :si, :su, :prd, :me)');

#_______________________________________________ 
#												|
# INSERT INTO nomDeVotreTable VALUES 			|
#_______________________________________________|

#________________________________________________________________________________________________________________________
#																														 |
# !!!! ATTENTION !!!! 																									 |
#																									 					 |
# Le nom de votre BDD et de votre Table ne doivent pas contenir d'accents ou autres caractères what the fuck sinon ... 	 |
# ça marche pas -_-' (mon cas, merci Ali !)                                                                                |
#																														 |
# !!!! ATTENTION !!!!                                                                                                    |
#________________________________________________________________________________________________________________________|


#___________________________________________________________________________________________________________________________ 
#																															|
# On crée des marqueurs avec le nom de notre choix (exemple = :ge, :gender, :rienavoir ...).								|
#																															|
# On assigne "NULL" en premier afin que la base de données assigne elle même une valeur à la première entrée 				|
# qui correspond à l'ID !																									|
#___________________________________________________________________________________________________________________________|
 


// Lier les marqueurs aux valeurs :

$pdoStat->bindValue(':ge',$_POST['gender'], PDO::PARAM_STR); 
$pdoStat->bindValue(':no',$_POST['nom'], PDO::PARAM_STR);
$pdoStat->bindValue(':pru',$_POST['prenom'], PDO::PARAM_STR);
$pdoStat->bindValue(':ad',$_POST['adresse'], PDO::PARAM_STR);
$pdoStat->bindValue(':co',$_POST['codepostal'], PDO::PARAM_STR);
$pdoStat->bindValue(':vi',$_POST['ville'], PDO::PARAM_STR);
$pdoStat->bindValue(':pa',$_POST['country'], PDO::PARAM_STR);
$pdoStat->bindValue(':te',$_POST['telephone'], PDO::PARAM_STR);
$pdoStat->bindValue(':em',$_POST['email'], PDO::PARAM_STR);
$pdoStat->bindValue(':si',$_POST['homepage'], PDO::PARAM_STR);
$pdoStat->bindValue(':su',$_POST['sujet'], PDO::PARAM_STR);
$pdoStat->bindValue(':prd',$_POST['priority'], PDO::PARAM_STR);
$pdoStat->bindValue(':me',$_POST['message'], PDO::PARAM_STR);


#______________________________________________________________________________________________________________________ 
#																													   |
# PDO::PARAM_STR = Troisième argument du "bindValue" permettant de préciser que la valeur est une chaîne de caractère. |
#______________________________________________________________________________________________________________________|
# 

// Exécuter la requête :

$insertIsOk = $pdoStat->execute();

/*
	print_r($objetPdo->errorInfo());
	
	/*
	if ($insertIsOk) {
		$message = "Les données sont linkées !";
	} else {
		$message = "Fatal Error ! Run ! Run for your life !";
	}
*/

?>
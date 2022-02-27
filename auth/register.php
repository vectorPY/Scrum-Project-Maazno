<HTML>
<HEAD>
<TITLE>Maazno</TITLE>
</HEAD>
<BODY>
    
<?php 

session_start();

include("../inc.php");
print_r($_POST);

$username = $_POST['username'];
$vorname = $_POST['vorname'];
$name = $_POST['name'];
$telefon = $_POST['telefon'];
$ort_id = $_POST['ort_id'];
$straße = $_POST['straße'];
$hausnummer = $_POST['hausnummer'];
$email = $_POST['email'];
$passwort = $_POST['passwort'];
$passwort_wiederholen = $_POST['passwort_wiederholen'];

$hash_passwort = hash("sha512", $passwort);

$con = mysqli_connect($host,$user,$passwd,$datenbank) or die("Die Datenbank ist momentan nicht erreichbar!");


$sql = "INSERT INTO nutzer (username, vorname, name, telefon, ort_id, straße, hausnummer, email, passwort) VALUES ('$username', '$vorname', '$name', '$telefon', '$ort_id', '$straße', '$hausnummer', '$email', '$hash_passwort')";
  //echo $sql;

$sql2 = "SELECT username FROM nutzer WHERE username='$username'";

$user_vergeben = (mysqli_query($con, $sql2));
$count = mysqli_num_rows($user_vergeben);

# Rueckmeldungen zu den Eingaben bei der Registrierung

if($count !== 0)
  {
    echo "<br>";
    echo "<br>";
    echo "Der Benutzername ist bereits vergeben!";
    echo "<br>";
  } 

  if ($username != "")
   {
   echo "<br>";
   echo "<br>";
   echo "Sie haben einen username eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie einen username ein!";
   echo "<br>";
   }

   if ($vorname != "")
   {
   echo "<br>";
   echo "Sie haben einen vornamen eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie einen vornamen ein!";
   echo "<br>";
   }

   if ($name != "")
   {
   echo "<br>";
   echo "Sie haben einen namen eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie einen namen ein!";
   echo "<br>";
   }

   if ($telefon != "")
   {
   echo "<br>";
   echo "<br>";
   echo "Sie haben eine Telefonnummer eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie eine Telefonnummer ein!";
   echo "<br>";
   }

   if ($ort_id != "")
   {
   echo "<br>";
   echo "<br>";
   echo "Sie haben einen ort eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie einen ort ein!";
   echo "<br>";
   }


   if ($straße != "")
   {
   echo "<br>";
   echo "Sie haben eine strasse eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie einen strasse ein!";
   echo "<br>";
   }

  
   if ($hausnummer != "")
   {
   echo "<br>";
   echo "<br>";
   echo "Sie haben eine Hausnummer eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie eine Hausnummer ein!";
   echo "<br>";
   }

   if ($email != "")
   {
   echo "<br>";
   echo "Sie haben eine E-Mail eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie eine E-Mail ein!";
   echo "<br>";
   }

   if ($passwort != "")
   {
   echo "<br>";
   echo "Sie haben ein passwort eingegeben!";
   echo "<br>";
   }
  else
   {
   echo "<br>";
   echo "Bitte geben Sie ein passwort ein!";
   echo "<br>";
   }


    if ($passwort === $passwort_wiederholen)
      (mysqli_query($con, $sql));

      else
      {
        echo "Die Passwörter stimmen nicht überein! Wiederhohlen sie ihre eingabe!";
      }


?>


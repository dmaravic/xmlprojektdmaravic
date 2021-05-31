<?php
$Korisnickoime="";
$Lozinka="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Odgovor=$_POST;
	if (empty($Odgovor["Korisnickoime"]))  {
        	echo "Niste unijeli korisničko ime.";
    		}
	else if (empty($Odgovor["Lozinka"]))  {
        	echo "Niste unijeli lozinku.";
    		}
	else {
		$Korisnickoime= $Odgovor["Korisnickoime"];
		$Lozinka= $Odgovor["Lozinka"];
		test($Korisnickoime,$Lozinka);
	}
}
function test($Korisnickoime, $Lozinka) {
	$XML=simplexml_load_file("korisnici.xml");
	foreach ($XML->Korisnik as $Kor) {
  	 	$Kori = $Kor->Korisnickoime;
		$Korl = $Kor->Lozinka;
		$KorIme=$Kor->Ime;
		$KorPrezime=$Kor->Prezime;
		if($Kori==$Korisnickoime){
			if($Korl == $Lozinka){
				echo "Dobro došli, $KorIme $KorPrezime!";
				return;
				}
			else{
				echo "Unijeli ste pogrešnu lozinku.";
				return;
				}
			}
		}
	echo "Korisnik nije registriran.";
	return;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login forma Dario Maravić</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Login forma Dario Maravić 0246081490</h1>
        <img src="login.jpg" width=15%/>
            <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <h2>Korisničko ime:</h2>
                    </td>
                    <td>
                        <input id="Korisnickoime" name="Korisnickoime" placeholder="Korisnik" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Lozinka:</h2>
                    </td>
                    <td>
                        <input id="Lozinka" name="Lozinka" placeholder="*****" type="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="Prijava" type="submit" value="Prijava">
                    </td>
                </tr>
            </table>
            </form>
    </body>
</html>
<?php
session_start();
include ("dbh.inc.php");


function dodaj_korisnika ($ime, $prezime,$kor_ime, $email, $lozinka, $konekcija){
    $sql = "INSERT INTO korisnici VALUES (null,?,?, ?, ?, ?)";
    $upit = $konekcija->prepare($sql);
    
    return $upit->execute([$ime, $prezime,$kor_ime, $email, md5($lozinka)]);
}

function prijavi_korisnika ($kor_ime, $lozinka, $konekcija) {
    $sql = "SELECT * FROM korisnici WHERE kor_ime=? AND lozinka=?";
    $upit = $konekcija->prepare($sql);
    $upit->execute([$kor_ime, md5($lozinka)]);
    $korisnik = $upit->fetch();
    if(!isset($korisnik["kor_ime"])) return false;
    $_SESSION["kor_ime"] = $kor_ime;
    $_SESSION["lozinka"] = md5($lozinka);
   
    return true;
}

function provjeri_korisnika($konekcija){
    $sql = "SELECT * FROM korisnici WHERE kor_ime=? AND lozinka=?";
    $upit = $konekcija->prepare($sql);
    if (!isset($_SESSION["lozinka"])) return false;
    $upit->execute(
        [$_SESSION["kor_ime"], $_SESSION["lozinka"]]
    );
    $korisnik = $upit->fetch();
    if(!isset($korisnik["kor_ime"])) return false;
    return $korisnik;
}

function korisničko_ime(){
   echo($_SESSION['kor_ime']);
   
}


?>




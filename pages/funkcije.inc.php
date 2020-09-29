<?php 

include("../backend/includes/dbh.inc.php");


function add_koktelID ($kor_ime, $koktel_id, $konekcija){
    $sql = "INSERT INTO kokteli_id VALUES (null, ?, ?)";
    $upit = $konekcija->prepare($sql);
    return $upit->execute([$kor_ime, $koktel_id]);
}

function update_koktelID ( $koktel_id,$kor_ime, $konekcija){
    $sql = "UPDATE kokteli_id SET koktel_id= ? WHERE kor_ime = ?";
    $upit = $konekcija->prepare($sql);
    return $upit->execute([ $koktel_id,$kor_ime]);
}


function provjeri_korisnikID($konekcija){
    $sql = "SELECT id FROM kokteli_id WHERE kor_ime =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['kor_ime']]);
    $korisnik = $upit->fetch();
    return $korisnik;
    
}

function provjeri_id($konekcija){
    $checkID = provjeri_korisnikID($konekcija);
    if($checkID >= 1){
    $sql = "SELECT koktel_id FROM kokteli_id WHERE kor_ime =?" ;
    $upit = $konekcija->prepare($sql);
    $upit->execute([$_SESSION['kor_ime']]);
    $id = $upit->fetch();
    
   return $id[0];
    }else{
        return 'noID';
    }
   
    
    
}

function provjeriDuplikat($id,$str){
    
    return $pos=strpos($str,$id);

    
}

?>
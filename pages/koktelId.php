<?php
    session_start();
    include ("funkcije.inc.php");
    
        
    
    $checkID = provjeri_korisnikID($konekcija);
    
    if($checkID < 1){   //provjeri pomocu ID da li je korisnik u bazi

        $ids = array();
        array_push($ids,$_POST["favId"]);
        $strIds = implode(",",$ids);
        

        add_koktelID(
            $_SESSION['kor_ime'],
            $strIds,
            $konekcija
            );

    }else{
        
        $lastIDs = (provjeri_id($konekcija)); 

        //provjera dali je korisnik ima trenutni id u bazi
        if(!provjeriDuplikat($_POST["favId"],$lastIDs)){
            //pretvori string u array 
            $ids = explode(",",$lastIDs);
            array_push($ids,$_POST["favId"]);
            //arr -> str
            $strIds = implode(",",$ids);
            
            update_koktelID(
            $strIds,
            $_SESSION['kor_ime'],
            $konekcija
            );

        }

    }
?>

  
    <?php include ('./tags/header/top-header.php')?>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
   
    <?php include ('./tags/header/bottom-header.php');?>

    
    <?php 
      $korisnik = provjeri_korisnika($konekcija);

      if (!$korisnik) {
          header("Location: ../backend/login/index.php");
      }
    
    ?>

    <section >
      <div class="container">
        

      </div>
    </section>
    
    

    <?php include ('./tags/footer.php') ?>
    

   

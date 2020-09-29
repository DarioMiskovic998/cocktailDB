<?php include ("funkcije.inc.php"); ?>
<?php 
      $favIds = array();
      array_push($favIds,provjeri_id($konekcija));
?>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../scripts/view.js"></script>
    <script src="../scripts/model.js"></script>
    <script src="../scripts/controller.js"></script>
    
    <script type="text/javascript">
       
      document.addEventListener("click", e=> {
        

        if(e.target.id === 'posterInfo'){
         
          const arrayFromPHP = (<?php echo json_encode($favIds); ?>)[0].split(",");

          Ctrl.cardInfo(arrayFromPHP);

        }else if (e.target.classList.contains("unliked")) {

          //add liked class and update db
          e.target.classList = "liked";
          let infoID = View.loadinfoID();
         
          $.ajax({
            url:'koktelId.php',
            method:'post',
            data:{favId:infoID},
            success: function(data){
              console.log(data);
            }          
          });

          
        } else if (e.target.classList.contains("liked")) {
          //add unliked class and update db
          e.target.classList = "unliked";
          const infoID = View.loadinfoID();

          $.ajax({
            url:'delete.php',
            method:'post',
            data:{favId:infoID},
            success: function(data){
              console.log(data);
            }          
          });
          
        }
      });
    
    </script>
  </body>
</html>
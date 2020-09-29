
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
<?php  include ("../backend/includes/funkcije.inc.php"); 
?>

    <script
      src="https://kit.fontawesome.com/ad2a351d60.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <!--Header-->
    <header class="header">
      <div class="logo">
        <a href="index.php"><img src="../img/logo.png"/></a>
      </div>

      <form action="#" class="form" id="form">
        <input type="text" placeholder="Traži..." id="naziv-koktela" />
        <button class="btn"><i class="fas fa-search  search"></i></button>
      </form>

      <nav class="navigation">
        <ul class="nav-ul">
          <li class="user-list">
            <div class="acc-info">
            
              <a href="#" class="user"><?php korisničko_ime(); ?></a>
              
            </div>
            <ul>
              
              <li>
                <a href="favorite.php"
                  >Moji kokteli</a
                >
              </li>
              <li>
                <a href="../backend/login/logout.php">Odjava</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--Header End-->

   
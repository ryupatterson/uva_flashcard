<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UVA Flashcard</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ryu Patterson">
    <meta name="keywords" content="Learning">
    <link rel="stylesheet" href="<?=$this->base_url?>/styles/styles.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/0604459c37.js"></script>
  </head>
  <body>
  <!--Top Navigation / Header bar-->
    <header id="main-header">
      <div class="container">
        <div class="row">
          <div class="col-3" id="header-text">
            <p>Welcome, <?=$_SESSION["username"]?></p>
          </div>
          <div class="col-2">
            <p>My Decks</p>
          </div>
          <div class="col-2">
            <p>Create Deck</p>
          </div>
          <div class="col-2">
            <a href="<?=$this->base_url?>/account/logout"><p>Logout</p></a>
          </div>
          <div class="col-3">
            <input type="text" name="search" value="">
          </div>
        </div>
      </div>
    </header>
    <!--Main Content-->

    <!--Footer-->
    <footer>
      <div>
        <small>
          © 2021 Ryu Patterson
        </small>
      </div>
    </footer>
  </body>
</html>

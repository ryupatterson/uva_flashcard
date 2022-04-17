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
    <?php include "header.php" ?>
    <!--Main Content-->
    <div class="container">
      <h1>Your Decks</h1>
      <table>
        <?php
        foreach ($my_decks as $deck):?>
        <tr>
          <td><a href="<?=$this->base_url?>/deck/creation/?deck_id=<?=$deck['deck_id']?>"><?= $deck["title"]?></a></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
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

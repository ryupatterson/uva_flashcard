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
      <h1>Working on <?=$_SESSION['title']?></h1>
      <table>
        <?php
        $entries = $this->db->query("select * FROM f_entry WHERE deck_id=?;","s",$_SESSION['deck_id']);
        foreach ($entries as $entry):?>
        <tr>
          <td><?= $entry["entry_def"]?></td>
          <td><?= $entry["entry_answer"]?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <form id="deck_form" name='deck_creation' action="<?=$this->base_url?>/deck/add_entry/" method="get">
        <div>
          <label for="entry_def">Word</label>
          <input type="text" id="entry_def" name="entry_def"/>
        </div>
        <div>
          <label for="entry_answer">Definition</label>
          <input type="text" id="entry_answer" name="entry_answer"/>
        </div>
        <div>
          <button type="submit">add</button>
        </div>
      </form>
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

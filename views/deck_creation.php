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
      <h1>Create Deck</h1>
      <?php
        $query = $this->db->query('select max(deck_id) from f_deck;')[0]["max(deck_id)"];
        $deck_id = intval($query) + 1;

       ?>
      <form class="form" autocomplete="off" id="deck_form" name='deck_creation' action="<?=$this->base_url?>/deck/create_deck/?deck_id=<?=$deck_id?>" method="post">
        <div>
          <label for="deck_title">Title</label>
          <input type="text" id="deck_title" name="deck_title" required>
        </div>
        <div>
          <label for="public">Make public?</label>
          <input type="checkbox" id="make_public" name='make_public'>
        </div>
        <div class="autocomplete" style="width:300px;">
          <label for="uva_course">Associated Course?</label>
          <input id="myInput" type="text" name="uva_course" placeholder="Search classes...">
        </div>
        <br></br>
        <div class="form-group">
          <button style="background-color: rgb(255, 102, 102); border-color: rgb(255, 102, 102)" class="btn btn-primary" type="submit">Create Deck</button>
        </div>
      </form>
    </div>
    <?php
      $course_array = $this->db->query("select course_pn, course_nbr from uva_course;");
      $output = [];
      foreach($course_array as $course){
        $string = $course["course_pn"]." ".$course['course_nbr'];
        array_push($output, $string);
      }
     ?>
     <script type="text/javascript" src="<?=$this->base_url?>/views/js/searchbar_script.js"></script>
     <script type="text/javascript">
      let searchable = <?php echo json_encode($output);?>;
      console.log(searchable);
      autocomplete(document.getElementById("myInput"), searchable);
     </script>
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

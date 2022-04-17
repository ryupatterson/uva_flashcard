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
      <div class="container" style="margin:auto; margin-top: 20px;">
          <h2>Recently used: </h2>
          <div class="row">
              <?php
                  foreach ($my_decks as $deck):?>
                  <div class="col-4">
                      <div class="card mb-4; shadow-sm mb-4 bg-white rounded">
                          <div class="card-body">
                              <h5 class="card-title"><?=$deck["title"]?></h5>
                              <p class="card-text">Course:
                                  <?php
                                    $course = $this->db->query("select course_pn,course_nbr from assigned_to_course where deck_id = ?;","s",$deck["deck_id"]);
                                    if($course){
                                      $string = $course[0]["course_pn"].$course[0]["course_nbr"];
                                    } else{
                                      $string = "N/A";
                                    }
                                 ?><?=$string?></p>
                              <p class="card-text">Number of Cards:
                                  <?php
                                  $num_cards =  $this->db->query("select count(*) from f_entry where deck_id = ?;","s",$deck["deck_id"]);
                                  $string = $num_cards[0]["count(*)"];
                                  ?><?=$string?></p>
                              <a style="background-color: rgb(255, 102, 102); border-color: rgb(255, 102, 102)" href="<?=$this->base_url?>/deck/creation/?deck_id=<?=$deck['deck_id']?>"
                                 class="btn btn-primary">
                                  See More
                              </a>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>

      <p></p>
      <div class="container">
          <h2>Your favorites:</h2>
          <div class="row">
              <?php
                  foreach ($fav_decks as $deck):?>
                  <div class="col-4">
                      <div class="card mb-4; shadow-sm mb-4 bg-white rounded">
                          <div class="card-body">
                              <h5 class="card-title"><?=$deck["title"]?></h5>
                              <p class="card-text">Course:
                                  <?php
                                    $course = $this->db->query("select course_pn,course_nbr from assigned_to_course where deck_id = ?;","s",$deck["deck_id"]);
                                    if($course){
                                      $string = $course[0]["course_pn"].$course[0]["course_nbr"];
                                    } else{
                                      $string = "N/A";
                                    }
                                 ?><?=$string?></p>
                              <p class="card-text">Number of Cards:
                                  <?php
                                  $num_cards =  $this->db->query("select count(*) from f_entry where deck_id = ?;","s",$deck["deck_id"]);
                                  $string = $num_cards[0]["count(*)"];
                                  ?><?=$string?></p>
                              <a style="background-color: rgb(255, 102, 102); border-color: rgb(255, 102, 102)" href="<?=$this->base_url?>/deck/creation/?deck_id=<?=$deck['deck_id']?>"
                                 class="btn btn-primary">
                                  See More
                              </a>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>
    </div>



    </div>

    <!--Footer-->
    <br></br>
    <footer>
      <div>
        <small>
          © 2021 Ryu Patterson
        </small>
      </div>
    </footer>
  </body>
</html>

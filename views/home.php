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
    <style>
        .form-popup {
        display: none;
        position: fixed;
        left: 50%;
        bottom: 40%;
        transform: translate(-50%, 0);
        border: 3px solid #f1f1f1;
        z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
        background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        }
    </style>
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

      <div class="container" style="margin:auto; margin-top: 20px;">
        <h2>Your Folders:</h2>
        <div>
            <div class="row">
                <div class="col-4">
                    <div class="card mb-4; shadow-sm mb-4 bg-white rounded">
                        <div class="card-body">
                            <h5 class="card-title">Create Folder</h5>
                            <p class="card-text"> <br>    </p>
                            <a style="background-color: rgb(255, 102, 102); border-color: rgb(255, 102, 102)" onclick="openForm()"
                               class="btn btn-primary">
                                Make Folder
                            </a>
                            <div class="form-popup" id="myForm">
                              <form action="<?=$this->base_url?>/deck/make_folder/" class="form-container" method="POST">
                                <h1>Create Folder</h1>

                                <label for="Title"><b>Title</b></label>
                                <input type="text" placeholder="Enter Title" name="folder_title" required>

                                <button type="submit" class="btn">Create</button>
                                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  function openForm() {
                    document.getElementById("myForm").style.display = "block";
                  }

                  function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                  }
                </script>
                <?php
                    foreach ($folders as $folder):?>
                    <div class="col-4">
                        <div class="card mb-4; shadow-sm mb-4 bg-white rounded">
                            <div class="card-body">
                                <h5 class="card-title"><?=$folder["title"]?></h5>
                                <p class="card-text">Number of Decks:
                                    <?php
                                    $num_cards =  $this->db->query("select count(*) from assigned_to_folder where folder_id = ?;","s",$folder["folder_id"]);
                                    $string = $num_cards[0]["count(*)"];
                                    ?><?=$string?></p>
                                <a style="background-color: rgb(255, 102, 102); border-color: rgb(255, 102, 102)" href="<?=$this->base_url?>/deck/view_folder/?folder_id=<?=$folder['folder_id']?>"
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

      <div class="container" style="margin:auto; margin-top: 20px; margin-bottom: 75px;">
        <h2>Your favorites:</h2>
        <div >
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

    </div>



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

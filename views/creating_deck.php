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

    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

  </head>
  <body>
  <!--Top Navigation / Header bar-->
    <?php include "header.php" ?>
    <!--Main Content-->
    <div class="container">
      <?php
        $course = $this->db->query("select course_pn,course_nbr from assigned_to_course where deck_id = ?;","s",$_SESSION['deck_id']);
        if($course){
          $string = "(".$course[0]["course_pn"].$course[0]["course_nbr"].")";
        } else{
          $string = "";
        }
       ?>
       <div class="row" style="margin-top: 25px;">
         <div class="col-10" style="margin-bottom: 50px;">
           <h1>Working on <?=$_SESSION['title']?> <?=$string?></h1>
         </div>
         <div class="col-2">
           <button onClick="to_open();" class="btn btn-primary" name="share" value="Share">Share</button>
           <a href="<?=$this->base_url?>/deck/quiz/?deck_id=<?=$_SESSION['deck_id']?>">
             <button class="btn btn-secondary" name="quiz">Quiz</button>
           </a>
         </div>
         <script type="text/javascript">

         </script>
       </div>
       <script type="text/javascript">
        function to_open(){
          window.open('\<?=$this->base_url?>/deck/share/?deck_id=<?=$_SESSION['deck_id']?>','_blank','location=yes,height=200,width=520,scrollbars=yes,status=yes');
        }
       </script>
        <?php
        $entries = $this->db->query("select * FROM f_entry WHERE deck_id=?;","s",$_SESSION['deck_id']);
        foreach ($entries as $entry):?>

        <div class="card mt-2; shadow-sm p-3 mb-2 bg-white rounded">
            <div class="row" id="complete">
              <div class="col-4" id='word'>
                <p name="word"><?=$entry['entry_def']?></p>
              </div>
              <div class="col-8">
                <div class="row">
                  <div class="col-8" id="answer">
                    <p name="answer" ><?=$entry['entry_answer']?></p>
                  </div>
                  <div class="col-2">
                      <button type="submit" class='btn btn-primary' onclick="edit_entry();">Edit</button>
                  </div>
                  <div class="col-2">
                    <form id="entry_remove" name="remove_entry" action="<?=$this->base_url?>/deck/remove_entry/" method="get">
                      <input type="hidden" name="entry_id" value="<?=$entry['entry_id']?>">
                      <button type="submit" class='btn btn-danger' name="button">Remove</button>
                    </form>
                  </div>
                </div>
                </div>
              </div>

              </div>
            <script type="text/javascript">
              function edit_entry(){
                const word = document.getElementById("complete");

                word.innerHTML = `
                <form id="entry_edit" name='edit_entry' action="<?=$this->base_url?>/deck/edit_entry/" method="POST" >
                <div class="row">
                  <input type="hidden" name="entry_id" value="<?=$entry['entry_id']?>">
                  <div class='col-4'>
                    <input type="text" name="edited_word" style='' value="<?=$entry['entry_def']?>">
                  </div>
                  <div class='col-8'>
                    <div class="row">
                      <div class="col-8" id="answer">
                        <input type="text" name="edited_def" style=''value="<?=$entry['entry_answer']?>">
                      </div>
                      <div class='col-2'>
                        <button type="submit" class='btn btn-primary' name="button">Submit</button>
                      </div>
                      <div class='col-2'>
                        <button type="reset" class='btn btn-danger' name="button" onclick="cancel();">Cancel</button>
                      </div>
                    </div>
                  </div>
                  </div>
                </form>
                `;
              }

              function cancel(){
                const word = document.getElementById("complete");

                word.innerHTML = `
                <div class="col-4" id='word'>
                  <p name="word"><?=$entry['entry_def']?></p>
                </div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-8" id="answer">
                      <p name="answer"><?=$entry['entry_answer']?></p>
                    </div>
                    <div class="col-2">
                        <button type="submit" class='btn btn-primary' onclick="edit_entry();">Edit</button>
                    </div>
                    <div class="col-2">
                      <form id="entry_remove" name="remove_entry" action="<?=$this->base_url?>/deck/remove_entry/" method="get">
                        <input type="hidden" name="entry_id" value="<?=$entry['entry_id']?>">
                        <button type="submit" class='btn btn-danger' name="button">Remove</button>
                      </form>
                    </div>
                  </div>
                  </div>
                `;
              }
            </script>
        <?php endforeach; ?>

      <br></br>
      <form id="deck_form" name='deck_creation' action="<?=$this->base_url?>/deck/add_entry/" method="get">
        <div class style="width:300px;">
          <label for="entry_def">Word: </label>
          <input type="text" id="entry_def" name="entry_def"/>
        </div>
        <div class>
          <label for="entry_answer">Definition: </label>
          <input type="text" id="entry_answer" name="entry_answer"/>
        </div>
        <br></br>
        <div class>
          <button style="background-color: rgb(255, 102, 102); border-color: rgb(255, 102, 102)" type="submit" class='btn btn-primary mb-3'>Add Entry</button>
        </div>
      </form>
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

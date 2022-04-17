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
         <div class="col-9" style="margin-bottom: 50px;">
           <h1><?=$_SESSION['title']?> <?=$string?></h1>
           <a target="_blank" href="<?=$this->base_url?>/deck/export/?deck_id=<?=$_SESSION['deck_id']?>"><button class="btn btn-secondary" onclick="downloadJSON()" name="download">Download as JSON</button></a>
         </div>
         <div class="col-3">
           <?php if($fav) : ?>
           <a href="<?=$this->base_url?>/deck/unfavorite/">
            <button  class="btn btn-warning" name="fav">Favorited</button>
           </a>
           <?php else : ?>
          <a  href="<?=$this->base_url?>/deck/favorite/">
            <button class="btn btn-secondary" name="unfav">Unfavorited</button>
          </a>
           <?php endif; ?>
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
            <div class="row">
              <div class="col-4">
                <p><?=$entry['entry_def']?></p>
              </div>
              <div class="col-8">
                <div class="row">
                  <div class="col-8">
                    <p><?=$entry['entry_answer']?></p>
                  </div>
                  <!-- <div class="col-2">
                    <form id="entry_edit" name="edit_entry" action="<//?=$this->base_url?>/deck/edit_entry/" method="get">
                      <input type="hidden" name="entry_id" value="<//?=$entry['entry_id']?>">
                      <button type="submit" class='btn btn-primary' name="button">Edit</button>
                    </form>
                  </div>
                  <div class="col-2">
                    <form id="entry_remove" name="remove_entry" action="<//?=$this->base_url?>/deck/remove_entry/" method="get">
                      <input type="hidden" name="entry_id" value="<//?=$entry['entry_id']?>">
                      <button type="submit" class='btn btn-danger' name="button">Remove</button>
                    </form>
                  </div> -->
                </div>

              </div>
            </div>
        </div>

        <?php endforeach; ?>

      </table>
      <br></br>
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

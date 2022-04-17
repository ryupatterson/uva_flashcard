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
  <body onload="getTerm();">
  <!--Top Navigation / Header bar-->
    <?php include "header.php" ?>
    <!--Main Content-->
    <?php
      $course = $this->db->query("select course_pn,course_nbr from assigned_to_course where deck_id = ?;","s",$_SESSION['deck_id']);
      if($course){
        $string = "(".$course[0]["course_pn"].$course[0]["course_nbr"].")";
      } else{
        $string = "";
      }
     ?>
     <div class="title" style="text-align: center;margin-top: 100px;">
       <h1>Studying <?=$_SESSION['title']?> <?=$string?></h1>
     </div>
    <!--Footer-->
    <script type="text/javascript">
      let entries = <?php echo json_encode($entries);?>;
      console.log(entries);
    </script>
    <div class="flashcard" style="width: 500px;height:350px;line-height:350px;">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <span><h4><b>Term</b></h4></span>
        </div>
        <div class="flip-card-back">
          <span><h4>Definition</h4></span>
        </div>
      </div>
    </div>
    <div class="container" style="height: 100px;position:relative;">
      <div class="center">
        <button id="prev" class="btn btn-primary" name="button">Prev</button>
        <button id="next" class="btn btn-primary" name="button">Next</button>
      </div>
    </div>
    <div class="container" style="height: 50px;position:relative;margin-top: 0px;">
      <div class="center">
        <a href="<?=$this->base_url?>/deck/creation/?deck_id=<?=$_SESSION['deck_id']?>"><button id="stop" class="btn btn-secondary" name="button">Stop Quiz</button></a>
      </div>
    </div>
    <script src="<?=$this->base_url?>/views/js/flashcard_script.js">

    </script>
    <footer>
      <div>
        <small>
          © 2021 Ryu Patterson
        </small>
      </div>
    </footer>
  </body>
</html>

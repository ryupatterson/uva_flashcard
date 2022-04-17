<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: rgb(255, 102, 102);
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 20px 16px;
        text-decoration: none;
        font-size:20px
    }

    /* Change the link color to #111 (black) on hover */
    .top_link:hover {
        background-color: rgb(191, 77, 77);
        color: white;
    }

    a:link {
        text-decoration: none;
    }

    .active {
        background-color: rgb(191, 77, 77)
    }
    </style>

</head>
<?php
  $username = $this->db->query('select username from user where user_id =?;',"s",$_SESSION['user_id'])[0]['username'];

 ?>
<ul>
    <li><a class="top_link" href="<?=$this->base_url?>/"><i class="fa fa-home" style="font-size:25px"></i></a></li>
    <li><a class="top_link" href="<?=$this->base_url?>/account/my_decks/">My Decks</a></li>
    <li><a class="top_link" href="<?=$this->base_url?>/deck/redirect/">Create Deck</a></li>
    <li style="color:white;"><a>Signed in as "<?=$username?>"</a></li>
    <li style="float:right"><a href="<?=$this->base_url?>/account/logout">Logout</a></li>
</ul>

  <!--
  <header id="main-header">
    <div class="container">
    <div class="row">
      <div class="col-3" id="header-text">
        <p>Welcome, <//?=$_SESSION["username"]?></p>
      </div>
      <div class="col-2">
        <a href="<//?=$this->base_url?>/account/my_decks/"><p>My Decks</p></a>
      </div>
      <div class="col-2">
        <a href="<//?=$this->base_url?>/deck/redirect/"><p>Create Deck</p></a>
      </div>
      <div class="col-2">
        <a href="<//?=$this->base_url?>/account/logout/"><p>Logout</p></a>
      </div>
      <div class="col-3">
        <input type="text" name="search_bar" value="">
      </div>
    </div>
</div>
</header> -->
</html>

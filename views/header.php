<!DOCTYPE html>
<html lang="en" dir="ltr">
<header id="main-header">
    <div class="row">
      <div class="col-4" id="header-text">
        <!-- <p>Welcome, <?=$_SESSION["username"]?></p> -->
        <a href="<?=$this->base_url?>" style="text-decoration:none"><p><b>UVA FLASHCARDS</b></p></a>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <a href="<?=$this->base_url?>/account/my_decks/" style="text-decoration:none"><p>My Decks</p></a>
      </div>
      <div class="col-3">
        <a href="<?=$this->base_url?>/deck/redirect/" style="text-decoration:none"><p>Create Deck</p></a>
      </div>
      <div class="col-2">
        <a href="<?=$this->base_url?>/account/logout/" style="text-decoration:none"><p>Logout</p></a>
      </div>
      
      <div class="col-1">
        <input type="text" name="search" value="">
      </div> 
    </div>
    </div>
</header>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<header id="main-header">
  <div class="container">
    <div class="row">
      <div class="col-3" id="header-text">
        <p>Welcome, <?=$_SESSION["username"]?></p>
      </div>
      <div class="col-2">
        <a href="<?=$this->base_url?>/account/my_decks"><p>My Decks</p></a>
      </div>
      <div class="col-2">
        <a href="<?=$this->base_url?>/deck/redirect"><p>Create Deck</p></a>
      </div>
      <div class="col-2">
        <a href="<?=$this->base_url?>/account/logout"><p>Logout</p></a>
      </div>
      <div class="col-3">
        <input type="text" name="search" value="">
      </div>
    </div>
  </div>
</header>
</html>

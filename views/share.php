<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <input style='width: 450px;'type="text" id="url" value="https://uva-flashcard.herokuapp.com<?=$this->base_url?>/deck/view/?deck_id=<?=$_SESSION['deck_id']?>">
    <button type="button" onclick="copy_text()">Copy Text</button>
  </body>
  <script type="text/javascript">
    function copy_text() {
      /* Get the text field */
      var copyText = document.getElementById("url");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */

       /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);

      /* Alert the copied text */
    }
  </script>
</html>

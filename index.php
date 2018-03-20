<!doctype html>
<html lang="en">
  <head>
    <?php
        switch ($_GET['theme']) {
          case 'win2k':
            echo '<link rel="stylesheet" href="common/w2k-theme.css">';
            break;

          case 'winxp':
            echo '<link rel="stylesheet" href="common/wxp-theme.css">';
            break;

          case 'win7':
            echo '<link rel="stylesheet" href="common/w7-theme.css">';
            break;

          default:
            echo '<link rel="stylesheet" href="common/default-theme.css">';
            break;
    }
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="common/stylesheet.css">
    
    <title>Schedule Dash</title>
  </head>
  <body style="margin: 20px;">
    <center>
      <h1 id="digital-time">0:00</h1>

      <form>
        <input type="text" name="s1" placeholder="..."> <input style="width: 4.9rem;" type="text" name="s1t" placeholder="00:00"><br>
        <input type="text" name="s2" placeholder="..."> <input style="width: 4.9rem;" type="text" name="s2t" placeholder="00:00"><br>
        <input type="text" name="s3" placeholder="..."> <input style="width: 4.9rem;" type="text" name="s3t" placeholder="00:00">
      <form>
    </center>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scdash-time.js"></script>
  </body>
</html>


<!doctype html>
<html lang="en">
  <?php session_start(); ?>
  <head>
 <link rel="stylesheet" href="themes/lamps-theme.css">   
    <?php
    foreach( new DirectoryIterator('themes') as $t ){
      if(in_array( strtolower($t->getExtension()), ["jpg", "jpeg", "png", "svg"] )) $bg[] = $t->getFilename();
    }
            echo "<style>\r\n body {\r\n  background: #ffffff url(\"themes/".($bg[array_rand($bg)])."\") no-repeat right top fixed;\r\n    background-size: 100% 100%;\r\n }\r\n</style>";
    ?>  
      
    <!-- META TAGS, AND MORE... -->  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="common/stylesheet.css">
    
    <title>Schedule Dash</title>  
  </head>
  <body>
    <center>
      <h1 id="digital-time">...</h1>

        <!-- THIS SCHEDULES IS NOT-WORKING SAMPLES!!! -->
      <?php
			$rts = true;
			if( isset($_SESSION['shedules']) ){
				$tsks = @json_decode( $_SESSION['shedules'] );
    		if( (json_last_error()===JSON_ERROR_NONE) && is_array($tsks)){
					foreach( $tsks as $tsk)
						if( is_array($tsk) )
							if( isset($tsk['n']) && isset($tsk['t']) ){
								echo '<div class="alert alert-primary" style="width: 60%; text-align: left;" role="alert">
          <p>'.trim(strip_tags($tsk['n'])).' <b>in '.trim(strip_tags($tsk['t'])).'</b></p>
        </div>';
								$rts = false;
							}
				}
			}
			
			if($rts)
				echo '
        <div class="alert alert-primary" style="width: 60%; text-align: left;" role="alert">
          <p>Buy big potatos <b>in 12:20</b></p>
        </div>

        <div class="alert alert-primary" style="width: 60%; text-align: left;" role="alert">
          <p>Shopping &lt;3 <b>in 14:30</b></p>
        </div>

        <div class="alert alert-primary" style="width: 60%; text-align: left;" role="alert">
            <p>Go to meeting with friends <b>in 16:50</b></p>
        </div>';
							?>
      </center>
      
      
    <!-- NEEDED SCRIPTS -->  
      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="common/javascript.js"></script>
  </body>
</html>

<!--
    
    SCHEDULE DASH BY @vasilyokunevs
    github.com/vasilyokunevs/schedule-dash

-->

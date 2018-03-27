
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
  <body id="_body">
   <div class="dropdown">
  <button class="button-grey settings-button" onclick="toggleSettings()">⚙</button>
  <div class="dropdown-content">
    <p>Hello World!</p>
  </div>
</div>
    <center>
      <h1 id="digital-time">...</h1>

      <?php
	if(isset($_SESSION['schedules'])) $tsks = @json_decode( $_SESSION['schedules'] );
    	if( (json_last_error()!==JSON_ERROR_NONE) || !is_array($tsks) || !isset($_SESSION['schedules'])){
		$tsks = [
		["n"=>"Buy big potatoes", "t"=>"12:20"],
		["n"=>"Shopping", "t"=>"14:30"],
		["n"=>"Go to meeting with friends", "t"=>"16:50"] ];
		
		$_SESSION['schedules'] = json_encode($tsks);
	}
	    
	foreach( $tsks as $tsk=>$id ){
	 if( is_array($tsk) )	
	   if( isset($tsk['n']) && isset($tsk['t']) ){
		echo '<div class="alert alert-primary" role="alert" id="tsk'.$id.'">
          '.trim(strip_tags($tsk['n'])).' <b>in '.trim(strip_tags($tsk['t'])).'</b>
	  <button class="button-grey green" onclick="editTaskShow('.$id.')">✎</button>
	  <button class="button-grey red" onclick="deleteTask('.$id.')">✗</button>
        </div><div class="alert alert-editor" style="display: none;" role="alert" id="tsked'.$id.'">
          <input class="input-text" type="text" placeholder="Task Name" value="'.$tsk['n'].'"></input>
	  <input class="input-select" type="time" value="'.$tsk['t'].'"></input>
	  <button class="button-grey green" onclick="editTask('.$id.')">✓</button>
	  <button class="button-grey red" onclick="discardChanges('.$id.')">✗</button>
        </div>';
		   
	   }
		
	}
	
	?>
	    <div class="alert alert-add" id="add_box"><button class="button-grey" onclick="addTask()">Add a task...</button></div>
      </center>
      
      
    <!-- NEEDED SCRIPTS -->  
      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"/>
    <script src="common/javascript.js"/>
  </body>
</html>

<!--
    
    SCHEDULE DASH BY @vasilyokunevs
    github.com/vasilyokunevs/schedule-dash

-->

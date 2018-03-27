<?php
if( isset( $_POST['content'] ) ){
start_session();
$_SESSION['shedules'] = $_POST['content'];
}
?>

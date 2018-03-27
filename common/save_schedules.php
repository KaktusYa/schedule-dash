<?php
if( isset( $_POST['content'] ) ){
start_session();
$e = @json_decode( $_POST['content'] );
if( (json_last_error()===JSON_ERROR_NONE) && is_array($e) ){
  $_SESSION['schedules'] = $_POST['content'];
}
?>

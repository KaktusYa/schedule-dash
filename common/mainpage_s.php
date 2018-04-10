<?php

    session_start();

    function cssFileConnect($fileName) {
        echo '<link rel="stylesheet" href="' . $fileName . '">';
    }

    function htmlRedirect($url) {
        echo '<meta http-equiv="refresh" content="0;URL=' . $url . '" />';
    }
    
    if ($_SESSION['userLogin'] == 0 and $_SESSION['userPassword'] == 0) {
         htmlRedirect("http://dashbordium.tk/register.html");
    } else {
        //Passwd and login - have in data!
        if (is_file('accounts/' . $_SESSION['userLogin'] . '.json')) {
            //Account is correct! Checking password...
            $init = file_get_contents('accounts/' . $_SESSION['userLogin'] . '.json');
            $json = json_decode($init);
            if ($json->passwordMd5 == md5($_SESSION['userPassword']) {
                //Mother of God! All is ok!
                $isOK = true;  
            }
        }
    }
?>
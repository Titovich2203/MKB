<?php

require_once '../../src/model/chambreBd.php';

    if(isset($_GET['testTypeCh']))
    {
        if(isMeuble($_GET['testTypeCh']))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }
<?php 
       if (isset($_REQUEST['hopital_id']) && $_REQUEST['hopital_id'] > 0) {
        $hop_id = (int) htmlentities($_REQUEST['hopital_id']);
        del_hopital($hop_id,$db);
    }

       
?>
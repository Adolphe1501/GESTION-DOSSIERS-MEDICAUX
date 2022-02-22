<?php 
       if (isset($_REQUEST['personnel_id']) && $_REQUEST['personnel_id'] > 0) {
        $personnel_id = (int) htmlentities($_REQUEST['personnel_id']);
        del_personnel($personnel_id,$db);
    }

       
?>
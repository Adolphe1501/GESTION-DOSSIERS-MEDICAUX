<?php 
       if (isset($_REQUEST['stat']) ) {
        $stat = (int) htmlentities($_REQUEST['stat']);
        if($stat == 0):
         $stat =1;
        else:
            $stat=0;
        endif;
        set_status($stat, $_SESSION['user_dossier'],$db);
    }

       
?>
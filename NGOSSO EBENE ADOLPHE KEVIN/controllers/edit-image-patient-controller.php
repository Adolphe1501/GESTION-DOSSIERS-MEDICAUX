<?php

$error = false;

if (isset($_POST['submit_image'])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;
      if(isset($_SESSION["user_avatar"])){
          update_image_patient($data, $db);
        } else{
            add_image($data,$db); 
        }
}


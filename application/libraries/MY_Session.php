<?php
class MY_Session extends CI_Session{

    public function sess_update(){
        //Listen HTTP_X_REQUESTED_WITH
        if(isset($_SERVER[HTTP_X_REQUESTED_WITH])&&$_SERVER[HTTP_X_REQUESTED_WITH]!=='XMLHttpRequest'){
            ;
            //parent::sess_update();


        }
    }
}
?>


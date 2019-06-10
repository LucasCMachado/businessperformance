<?php
function inverteData($data_inverte){
    if(count(explode("/",$data_inverte)) > 1){
        return implode("-",array_reverse(explode("/",$data_inverte)));
    }elseif(count(explode("-",$data_inverte)) > 1){
        return implode("/",array_reverse(explode("-",$data_inverte)));
    }
}
?>
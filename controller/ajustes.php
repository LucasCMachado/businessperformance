<?php 
function clearId($id){
    $LetraProibi = Array(" ",",",".","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%");
    $special = Array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
    'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„');
    $clearspc = Array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
    'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','');
    $newId = str_replace($special, $clearspc, $id);
    $newId = str_replace($LetraProibi, "", trim($newId));
    return strtolower($newId);
}

function inverteData($data_inverte){

    if(count(explode("/",$data_inverte)) > 1){

        return implode("-",array_reverse(explode("/",$data_inverte)));

    }elseif(count(explode("-",$data_inverte)) > 1){

        return implode("/",array_reverse(explode("-",$data_inverte)));

    }

}
?>
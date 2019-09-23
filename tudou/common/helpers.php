<?php

function is_phone($val){
    return preg_match("/(^0\d{2,3}-?\d{7,8})|(^0?1[3|4|5|7|8][0-9]\d{8})$/",$val);
}


function is_email($val) {
    return preg_match('/^[\w-]+(\.[\w-]+)*\@[A-Za-z0-9]+((\.|-|_)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/', $val);
}

function is_username($val) {
    return preg_match('/^[a-zA-Z]+[a-zA-Z0-9_]+$/', $val);
}


function is_password($val){
    return preg_match('/^\w{6,20}$/i',$val);
}



    function ajaxReturn($status = 0, $msg = 'success', $data = '', $dialog = ''){
        $return_arr = array();
        if (is_array($status)) {
            $return_arr = $status;
        } else {
            $return_arr = array(
                'result' => $status,
                'message' => $msg,
                'des' => $data,
                'dialog' => $dialog
            );
        }
        ob_clean();
        echo json_encode($return_arr);
        exit;
    }

function cur_str($string, $sublen, $start = 0, $code = 'UTF-8')
{
    if($code == 'UTF-8')
    {
        $pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string); if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';
        for($i=0; $i<$strlen; $i++)
        {
            if($i>=$start && $i<($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
        return $tmpstr;
    }
}



function uploadImg($fileInfo,$uploadPath = '/public/uploads/',$allowExt=array('jpeg','jpg','png','gif'),$maxSize = 2097152, $flag=true) {  
   
    if($fileInfo['error'] > 0) {  
  
        switch($fileInfo['error']) {  
            case 1:  
                $mes = 'The upload file exceeds the value of the upload_max_filesize option in the PHP configuration file';  
                break;  
            case 2:  
                $mes = 'Size exceeding form MAX_FILE_SIZE limit';  
                break;  
            case 3:  
                $mes = 'File section Uploaded';  
                break;  
            case 4:  
                $mes = 'No upload file was selected';  
                break;  
            case 6:  
                $mes = 'No temporary directory found';  
                break;  
            case 7:  
            case 8:  
                $mes = 'System error';  
                break;  
        }  
        exit($mes);  
    }  
  
    $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);  
    //$allowExt = array('jpeg', 'jpg', 'png', 'gif');  
    if(!is_array($allowExt)) {  
        exit('System error');  
    }  
  
    if(!in_array($ext, $allowExt)) {  
        exit('Illegal file type');  
    }  
    
    if($fileInfo['size']>$maxSize) {  
        exit('Upload files too large');  
    }  
   
    if($flag) {  
        if(!getimagesize($fileInfo['tmp_name'])) {  
            exit('Not a real picture type');  
        }  
    }  
  

    if(!is_uploaded_file($fileInfo['tmp_name'])) {  
        exit('Files are not uploaded via HTTP POST');  
    }  

    if(!file_exists($uploadPath)) {  
        mkdir($uploadPath, 0777, true);  
        chmod($uploadPath, 0777);  
    }  
    $uniName = md5(uniqid(microtime(true), true)) . '.' . $ext;  
    $destination = $uploadPath . '/' . $uniName;  
  
    if(!@move_uploaded_file($fileInfo['tmp_name'], $destination)) {  
        exit('File upload failed');  
    }
    return '/public/uploads/'.$uniName;

}

 function redirect($url,$delay=''){ 
    if($delay == ''){ 
        echo "<script>window.location.href='$url'</script>"; 
    }else{ 
        echo "<meta http-equiv='refresh' content='$delay;URL=$url' />"; 
    } 
}

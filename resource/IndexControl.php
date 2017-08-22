<?php

function getFileType($filename)
{
    $tmp = explode('.', $filename);
    $f_type = end($tmp);
    return $f_type;
}

// 图片上传
// http://localhost/kingphp/hibuy/resoure/index.php
function showIndex()
{
    // 允许上传的文件格式
    $ims_arr = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];

    // 判断上传数组是否为空
    if(empty($_FILES['myImg'])) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }

// 取出文件
    $img = $_FILES['myImg'];

// 判断文件上传是否有错误
    if($img['error'] != 0) {
        rtMsg(ERR_UPLOAD_FILE);
        return;
    }

// 判断文件类型
    $fileType = $img['type'];
    if(!in_array($fileType, $ims_arr)) {
        rtMsg(ERR_UPLOAD_TYPE);
        return;
    }

    $f_type = getFileType($img['name']);

    $new_filename = time() . '.' . $f_type;

// 保存文件
    move_uploaded_file($img['tmp_name'], 'image/'.$new_filename);

    $request_url = $_SERVER['REQUEST_URI'];
    $filepath = dirname($request_url);

    $img_url = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] . '/' .$filepath. '/image/' . $new_filename;

    rtMsg(OK, ['url'=>$img_url]);
}
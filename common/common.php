<?php
include_once '../conf/rtcode.php';


/**
 * 返回客户端的数据 统一的出口
 * @param int $code
 * @param string $msg
 * @param array $data
 */
function rtMsg($code=OK, $data=[])
{
    $rt = [
        'code' => $code,
        'msg' => RT_MSG($code),
        'data' => $data
    ];
    echo json_encode($rt);
    return;
}

// 获取客户端的参数
function getClientParam($param, $defalut='')
{
    $requestParam = array_merge($_GET, $_POST);
    if(array_key_exists($param, $requestParam)) {
        return $requestParam[$param];
    }
    return $defalut;
}

function views($fileName)
{
    $file = $fileName . '.php';
    include 'views/' . $file;
}
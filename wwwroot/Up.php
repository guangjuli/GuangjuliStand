<?php

//ini_set('error_reporting',E_ALL);
ini_set('error_reporting',E_ALL ^ E_NOTICE);
header("Content-type: text/html; charset=utf-8");
$base = '../Pb/';

function getads($chr){
    $base = '../Pb/';
    $dir = $base.$chr.'/';
    $logfile = $dir.$chr.'.log';
    //=============================================================
    $ar0 = [];
    if (is_file($logfile)){
        $nr = trim(file_get_contents($logfile));
        $ar  = explode("\n",$nr);
        $ar0 = json_decode(array_pop($ar),true);
    }
    return $ar0;
}

if($_GET['type'] == 'show') {
    $res = getads($_GET['chr']);
    $zipfile = $base.$_GET['chr'].'/'.$res['file'];
    if(is_file($zipfile)){
        $zip = base64_encode(file_get_contents($zipfile));
        $strlen = strlen($zip);
        $res = [
           'zip' => $zip,
            'strlen'=> $strlen,
        ];
        echo json_encode($res);
        exit;
    }
    //echo $zip;
    exit;
}

if($_GET['type'] == 'list'){
    $dir = $base;
    $chrlist = [];
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh))!= false){
                if($file != '.' && $file != '..'){
                    if(is_dir($base.$file)){
                        $chrlist[] = $file;
                    }
                }
            }
            closedir($dh);
        }
    }
    foreach($chrlist as $ads){
        $res[] = getads($ads);
    }
    echo json_encode($res);
//    print_r($res);
    exit;
}


if(!empty($_POST)){
    $dir = $base.$_POST['adschr'].'/';
    !is_dir($dir) && mkdir($dir);
    //==============================================
    //上传文件
    //==============================================
    $filename = $_POST['adschr'].time().rand(10000,99999).'.zip';
    //echo $filename;
    $res = [
        'adschr'    => $_POST['adschr'],
        'strlen'    => $_POST['strlen'],
        'version'   => $_POST['version'],
        'depend'    => $_POST['depend'],
        'file'      => $filename,
    ];
    //存储zip
    file_put_contents($dir.$filename,base64_decode($_POST['zip']));

    //存储log
    $json = json_encode($res)."\n";
    file_put_contents($dir.$_POST['adschr'].'.log',$json,FILE_APPEND);
    exit;
}
exit;
//
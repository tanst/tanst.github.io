<?php
/**
* ���ܣ������ʾͼƬ
* Filename  : img.php
* Usage:
*             <img src=img.php>
*             <img src=img.php?folder=images2/>
**/
  if($_GET['folder']){
     $folder=$_GET['folder'];
  }else{
     $folder='/photo/';
  }
  //���ͼƬ�ļ���λ��
  $path = $_SERVER['DOCUMENT_ROOT']."/".$folder;
  $files=array();
  if ($handle=opendir("$path")) {
      while(false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                if(substr($file,-3)=='gif' || substr($file,-3)=='jpg') $files[count($files)] = $file;
                }
      }
  }
  closedir($handle); 

  $random=rand(0,count($files)-1);
  if(substr($files[$random],-3)=='gif') header("Content-type: image/gif");
  elseif(substr($files[$random],-3)=='jpg') header("Content-type: image/jpeg");
  readfile("$path/$files[$random]");
?>
<?php  //*连接数据库
 $file=$_FILES['upfile'];
 $dir="./upimages/";//文件上传目录
 $filename=$file['name'];//客户端原文件名称，用于数据库保存文件名称
 $file['name'] = iconv('UTF-8','GBK', $file['name']);//转换格式，以免出现中文乱码情况
 //上传目录是否存在同名文件，避免覆盖
 if(file_exists($dir.$file['name'])){
     echo "<script>parent.stopSend('上传失败!（该文件名已存在！）')</script>";//调用iframe父窗口的js 函数 
 }else{
 　　//另外可以对上传文件$file['size']、$file['type']分别对应文件类型、大小进行校验
 　　$sql="select imapath from comment";//查看数据库中是否存在该文件信息,如果存在请先删除以免数据库中垃圾数据堆积
 　　$query=mysqli_query($sql);
 　　if(mysqli_num_rows($query)>0){
    　　 echo "<script>parent.stopSend('上传失败!请先删除原文件！')</script>";//调用iframe父窗口的js 函数
 　　}else{
 　　　　//上传文件
 　　　　if(move_uploaded_file($file['tmp_name'],$dir.$file['name'])){
    　　　　 $sql="";//数据库保存修改等数据处理
     　　　　if(mysqli_query($sql)){
         　　　　echo "<script>parent.stopSend('上传成功！')</script>";
    　　　   }else{
        　　　　 echo "<script>parent.stopSend('上传成功！但数据处理失败！')</script>";
    　　　　 }
 　　　　}else{
     　　　　echo "<script>parent.stopSend('上传失败！')</script>";
 　　　　}
　　 }
 }
?>
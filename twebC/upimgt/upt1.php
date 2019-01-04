<?php
print "<h1>上传文件</h1>";
//HTML5 <input> multiple 一次上传多张图片，注意name="photo[]"的形式，name属性设置成数组的形式。
echo <<<_END
<form method="post" action="" enctype="multipart/form-data">
    上传文件：<input type="file" name="photo[]" size="2" multiple>
    <input type="submit" value="提交">
</form>
_END;
if($_FILES) {
    //遍历所有照片的类型，判断上传的类型是否是常用的照片类型
    foreach($_FILES['photo']['type'] as $key=>$value) {
        switch ($value) {
            case 'image/jpeg': $ext = 'jpg';
                break;
            case 'image/png': $ext = 'png';
                break;
            case 'image/gif': $ext = 'gif';
            default:
                $ext = '';
                break;
        }
        if($ext) {
            //设置照片的存放相对路径和命名。命名照片例：20161226_2.png，下划线后跟遍历的键值区分照片，可在此处自行设置规则！！
            $name = '../upimages/'.date('Ymd',time()).'_'."$key.$ext";
            //将上传的文件移动到新位置
            move_uploaded_file($_FILES['photo']['tmp_name'][$key], $name);
            //显示出上传的图片
echo <<<_END
    <img src ="$name">
_END;
        }
    }
}
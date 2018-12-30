<?php
    include'checklog.php';
    unset($_SESSION['id']);  

    unset($_SESSION['name']);  
    



    echo "<script>
alert('您已退出！');
setTimeout(function(){window.location.href='login.html';},3000);
</script>";
    

    exit;  

?>  

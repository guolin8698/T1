<?php
session_start();
include 'connect.php';
include 'checklog.php';
include 'Classes/PHPExcel.php';
include 'Classes/PHPExcel/IOFactory.php';
include 'Classes/PHPExcel/Reader/Excel5.php';





/*require $dir."/PHPExcel.php";
require $dir."/PHPExcel/IOFactory.php";
require $dir."/PHPExcel/Reader/Excel5.php";*/
//require_once(phpexcel_dir());	//引入PHPExcel 类

$objPHPExcel=new PHPExcel();
//获得数据  ---一般是从数据库中获得数据

//左连接连接三张表
/*$sql = "SELECT 
              a.id,a.order_sn,a.status,a.rev_name,a.rev_addr,a.rev_mail,a.rev_post,a.rev_mobile,b.account_name,c.brands_name,a.project 
            FROM ec_orders AS a 
            LEFT JOIN ec_account AS b ON a.account_id = b.id

            LEFT JOIN ec_goods_brands AS c ON a.brands_id = c.id
            WHERE a.is_del = 0 AND b.is_del = 0 AND c.is_del =0"; */



/*switch($_SESSION['limits']){
		case 2;
$sql = "SELECT createtime,address,username,pnumber from user ";
break;
	case 3;
		$sql = "SELECT createtime,address,username,pnumber from usera ";
		break;
		case 4;
		$sql = "SELECT createtime,address,username,pnumber from userb ";
}*/
if ($ulimits==1){$sql = "SELECT id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy from userdata";}else{
$sql = "SELECT id,createtime,qdname,username,pnumber,wechat,project,jdy,login,description,gzjd,limits,czy from userdata where limits = '$ulimits' ";}
		$result = mysqli_query($conn,$sql);
$data = array();
$i = 0;
while ($row = mysqli_fetch_array($result)){
    $sqdname=$row['qdname'];
    $sqdname=preg_replace('|[0-9a-zA-Z/<>=.:_"]+|','',$sqdname); 
	$data[$i]['id'] = $row['id'];
	$data[$i]['createtime'] = date('Y年m月d日', $row['createtime']) ;
	$data[$i]['qdname'] = $sqdname;
	$data[$i]['username'] = $row['username'];
	$data[$i]['pnumber'] = $row['pnumber'];
	$data[$i]['wechat'] = $row['wechat'];
	$data[$i]['project'] = $row['project'];
	$data[$i]['jdy'] = $row['jdy'];
	$data[$i]['login'] = $row['login'];
	$data[$i]['description'] = $row['description'];
	$data[$i]['gzjd'] = $row['gzjd'];
	$data[$i]['czy'] = $row['czy'];
 
 
   
 
   // $data[$i]['order_sn'] = $row['order_sn'];
    //订单的状态   0:待确认 1:已确认/待付款 2:已付款/待发货 3:发货中 4:已发货 5:买家收货确认 6:订单完成 7:买家取消订单 8:卖家取消订单
    /* switch ($row['status']){
        case 0:
            $row['status'] = '待确认';
            break;
        case 1:
            $row['status'] = '已确认/待付款';
            break;
        case 2:
            $row['status'] = '已付款/待发货';
            break;
        case 3:
            $row['status'] = '发货中';
            break;
        case 4:
            $row['status'] = '已发货';
            break;
        case 5:
            $row['status'] = '买家确认收货';
            break;
        case 6:
            $row['status'] = '订单完成';
            break;
        case 7:
            $row['status'] = '买家取消订单';
            break;
        case 8:
            $row['status'] = '卖家取消订单';
            break;
        default:
            $row['status'] = '其他未知错误';
            break;
    } */
	 //$data[$i]['createtime'] = date('Y年-m月-d日', $row['createtime']);
	//$data[$i]['address'] = $row['address'];
    //$data[$i]['id'] = $row['id'];
    //$data[$i]['username'] = $row['username'];
	  //  $data[$i]['pnumber'] = $row['pnumber'];
   
    //$data[$i]['createip'] = $row['createip'];
    //$data[$i]['description'] = $row['description'];
    //$data[$i]['account_name'] = $row['account_name'];
    //$data[$i]['brands_name'] = $row['brands_name'];
    //$data[$i]['project'] = $row['project'];
    $i++;
}
/*echo "<pre>";
print_r($data);
echo "</pre>";*/

//设置excel列名
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','编号');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','日期');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','渠道名称');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','顾客姓名');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','手机号');

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1','微信号');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1','咨询项目');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1','接待员');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1','是否上门');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1','备注');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1','跟踪进度');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1','录单人员');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1','成交');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1','成交金额');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1','跟踪进度');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1','备注');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1','邮编');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1','收货人电话');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1','会员帐号');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1','品牌id');
//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1','项目名');
//背景填充颜色
$objPHPExcel->getActiveSheet()->getStyle( 'A1:o1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle( 'A1:o1')->getFill()->getStartColor()->setARGB('A1E40A');
//把数据循环写入excel中
foreach($data as $key => $value){
    $key+= 2;   //从第二行开始填充
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$key,$value['id']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$key,$value['createtime']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$key,$value['qdname']);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$key,$value['username']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$key,$value['pnumber']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$key,$value['wechat']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$key,$value['project']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$key,$value['jdy']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$key,$value['login']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$key,$value['description']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$key,$value['gzjd']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$key,$value['czy']);

    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$key,$value['createip']);
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$key,$value['description']);
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$key,$value['rev_post']);
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$key,$value['rev_mobile']);
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$key,$value['account_name']);
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$key,$value['brands_name']);
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('k'.$key,$value['project']);
}
//设置默认字体
$objPHPExcel->getDefaultStyle()->getFont()->setName( 'Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);

//设置列宽
$objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
//设置居中
$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//excel保存在根目录下  如要导出文件，以下改为注释代码
//$objPHPExcel->getActiveSheet() -> setTitle('SetExcelName');
//$objPHPExcel-> setActiveSheetIndex(0);
//$objWriter = $iofactory -> createWriter($objPHPExcel, 'Excel2007');
//$objWriter -> save('SetExcelName.xlsx');
//导出代码
$objPHPExcel->getActiveSheet() -> setTitle('客户列表');
$objPHPExcel-> setActiveSheetIndex(0);

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$filename = 'countlist.xlsx';
ob_end_clean();//清除缓存以免乱码出现
header('Content-Type: application/vnd.ms-excel');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$objWriter -> save('php://output');
?>
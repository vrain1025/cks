<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
    <div class="row" style="margin: 800px 300px;">
<?php
include('../../lib/conn.php');
$workshop=$_POST['workshop'];
$pdline=$_POST['pdline'];
$lyr=$_POST['lyr'];
$lydate=$_POST['lydate'];
$lybc=$_POST['lybc'];
if(!empty($workshop)&&!empty($pdline)){

    //读取SESSION传递的数据
    session_start(); 
    $groupData=($_SESSION['dcode']);

 //读取数据
    mysqli_select_db( $conn, 'lplt' );
    if (strlen((end($groupData)))==0) {
  //该操作为删除数组最后一项
 $result=array_pop($groupData);
 }

// $sql = "SELECT id,ordernum,model,figure,tp,code FROM bbcpk where code in (" . implode(',', $groupData) . ")";
//将半成品库查询到的序列号数据添加到成品库中    
$insert = "INSERT INTO bcpk(id,ordernum,model,figure,tp,code,pd) SELECT id,ordernum,model,figure,tp,code,pd FROM mtk where code in (" . implode(',', $groupData) . ");";
$insert .="UPDATE bcpk SET workshop='$workshop',pdline='$pdline',lyr='$lyr',lydate='$lydate',lybc='$lybc'  WHERE code in (" . implode(',', $groupData) . "); ";
$insert .="UPDATE mtk SET status='1'  where code in (" . implode(',', $groupData) . ")";

 
// 执行多个 SQL 语句
if (empty($insert) ){
	echo "输入数据不正确";
} else {
	$retval = mysqli_multi_query($conn,$insert);	
if(! $retval )
{
  die('无法插入数据: ' . mysqli_error($conn));
}
echo '<div class="alert alert-success">入库成功，3秒后返回上一页</div>';
 
mysqli_close($conn);
}





}

else {
	echo "<h2>请检查生产日期及胶号是否输入正确</h2>";
	

		{echo "<script>setTimeout(function(){location.href='".$_SERVER["HTTP_REFERER"]."'},3000);</script>";}
	

}



?>


<script language="JavaScript">
function myrefresh(){
window.history.go(-2);
}
setTimeout('myrefresh()',3000); //指定3秒转跳
</script>


            </div></div>
</body>
</html>
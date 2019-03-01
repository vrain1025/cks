<!doctype html>
<html lang="en">

<head>
<title>中橡狼牌轮胎库存管理系统</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
<meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<!-- VENDOR CSS -->
<link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../../assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="../../assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="../../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="../assets/css/color_skins.css">
</head>
<body class="theme-blue">

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../../assets/images/thumbnail.png" width="48" height="48" alt="中橡狼牌"></div>
        <p>页面载入中，请稍后</p>        
    </div>
</div> -->
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="index.php">
                    <img src="../../assets/images/logo-icon.svg" alt="中橡狼牌轮胎" class="img-responsive logo">
                    <span class="name">中橡狼牌轮胎</span>
                </a>
            </div>
            
            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>                        
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <form id="navbar-search" class="navbar-form search-form">
                            <input value="" class="form-control" placeholder="开始搜索" type="text">
                            <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                        </form>
                    </li>
                    <li>            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <?php include_once('../../comm/head.html');?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                     
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">半成品入库</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-12">

        <form action="bcprk.php" method="post">
            <div class="row align-items-center justify-content-center">
                <h2>半成品入库</h2>
            </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend " id="ol">
                   <textarea class="text-center" style="overflow-y:hidden;background-color:#E8EBEE;" cols="5" rows="30" id="li" disabled ></textarea>
                </div>
                <textarea name="code" class="form-control " rows="30" id="c2" onblur="check('2')" onkeyup="keyUp()" onFocus="clearValue('2')" onscroll="G('li').scrollTop = this.scrollTop;" oncontextmenu="return false" ></textarea>
            </div>
            <div class="text-right">
                    
                    <input type="submit" class="btn btn-info mx-3" value="查询">
                </div>             
            </form>
    
             <div class="col-4"></div>
               <?php
/**
 * Created by PhpStorm.
 * User: vrain
 * Date: 2018-09-21
 * Time: 17:17
 */
include('../../lib/conn.php');
if(!empty($_POST['code'])){
 $data = $_POST['code'];

 $groupData = explode("\r\n",$data);

 session_start();
$_SESSION['dcode']=$groupData;
 //如果数组最后一项字符串长度为0，则删除最后一项
 //strlen返回字符串的长度
  if (strlen((end($groupData)))==0) {
  //该操作为删除数组最后一项
 $result=array_pop($groupData);
 }
 // var_dump($groupData);
 // var_dump();
 //echo strlen((end($groupData)));

//采用 DISTINCT 去重查询结果
$sql = "SELECT DISTINCT *  FROM mtk where code in (" . implode(',', $groupData) . ")";
mysqli_select_db( $conn, 'lplt' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

echo '<h2 class="text-center">条码查询系统<h2>';
echo '<table  class="table table-hover">    <thead class="thead-dark">
      <tr>
      <th>商品ID</th>
      <th>商品编码</th>
      <th>产品型号</th>
      <th>花纹</th>
      <th>规格</th>
      <th>条形码</th>
      <th>生产日期</th>
      </tr>
    </thead><tr></tr>';
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
    echo "<tr><td> {$row['id']}</td> ".
        "<td>{$row['ordernum']} </td> ".
        "<td>{$row['model']} </td> ".
        "<td>{$row['figure']} </td> ".
        "<td>{$row['tp']} </td> ".
        "<td>{$row['code']} </td> ".
        "<td>{$row['pd']} </td> ".
        "</tr>";
}
echo '</table>';
mysqli_close($conn);

}


?>
<div class="text-center">
              
<form method="post" action="export.php">
  <input type="hidden" name="$data" >

  <input type="submit" name="submit" class="btn btn-success active my-3" value="导出到EXCEL">
  </form>
  </div>
   <form name="add"  method="post" action="add.php" >
              <div class="form-group">
                <label for="name" class="my-3">选择生产车间</label>
                <select name="workshop" class="form-control">                
                  
                  <option value="一车间"> 一车间</option>
                  <option value="二车间"> 二车间</option>
                  <option value="三车间"> 三车间</option>
                  <option value="四车间"> 四车间</option>                 
                </select>
                <label for="pdline" class="my-3">选择生产线</label>
                  <select name="pdline"  class="form-control" >
                  
                  <option value="1号线"> 1号线</option>
                  <option value="2号线"> 2号线</option>
                  <option value="3号线"> 3号线</option>
                  <option value="4号线"> 4号线</option>                 
                </select>
                 <label for="lybc" class="my-3">选择班次</label>
                  <select name="lybc"  class="form-control" >                  
                  <option value="A"> A班</option>
                  <option value="B"> B班</option>                                
                </select>
              </div>
                 <div class="input-group mb-3">                
                <input type="text" class="form-control" placeholder="领用人"  name="lyr" > 
                <input type="text" class="form-control mx-3" placeholder="领用日期"  name="lydate" >                     
                <input type="submit" name="submit" class="btn btn-primary mx-3" value="确认入库">
              </div>

 </form>


                </div>
            </div>



      
            </div>
    
            
        </div>
    </div>
    
</div>

 <?php include_once('../../comm/foot.html');?>
</body>
</html>


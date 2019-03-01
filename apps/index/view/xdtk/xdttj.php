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
     

            <div class="row clearfix">
                <div class="col-12">
                <div class="col-4 pull-right">
  <form action="mttj.php" method="post">
    <label class="radio-inline"><input type="radio" name="pxgz" checked="checked" value="ordernum">按商品编码排列</label>
    <label class="radio-inline"><input type="radio" name="pxgz" value="cnt">按库存升序排列</label>
    <label class="radio-inline"><input type="radio" name="pxgz" value="cnt2">按库存降序排列</label> 
    <input type="submit" name="" value="确认">   
  </form></div>
 <?php
$pxgz=$_POST['pxgz'];
$order=$tmp;
echo "$pxgz";
if ($pxgz=='ordernum') {
    $tmp=$pxgz;
} else {
    # code...
}

include('../../lib/conn.php');
//采用 DISTINCT 去重查询结果
$sql = "select ordernum,model,figure,tp,count(model) as cnt
from xdtk group by ordernum";
mysqli_select_db( $conn, 'lplt' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}
  // if (count($retval)>1) {
  //   echo count($retval);
  //此处需要解决，雪地胎数据库中没有条码，不能查询问题。

echo '<h2 class="text-center">雪地胎库存统计<h2>';
echo '<table  class="table table-hover">    <thead class="thead-dark">
      <tr>      
      <th>商品编码</th>
      <th>产品型号</th>
      <th>花纹</th>
      <th>规格</th>
      <th>条形码</th>
      <th>数量</th>
      </tr>
    </thead><tr></tr>';
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
    echo 
        "<td>{$row['ordernum']} </td> ".
        "<td>{$row['model']} </td> ".
        "<td>{$row['figure']} </td> ".
        "<td>{$row['tp']} </td> ".
        "<td>{$row['code']} </td> ".
        "<td>{$row['cnt']}条</td> ".
        "</tr>";
}
echo '</table>';
mysqli_close($conn);


?>
                  
                </div>
            </div>



      
            </div>
    
            
        </div>
    </div>
    
</div>

 <?php include_once('../../comm/foot.html');?>
</body>
</html>


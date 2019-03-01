<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>入库查询</title>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
        <div class="text-center">
          <script type="text/javascript">
            function validateForm() {
              var x=document.forms["add"]["date"].value;
              var y=document.forms["add"]["glue"].value;
              if (x==null||x==""||y==null||y=="") {
                alert("请检查胶号或日期是否输入正确");
                return false;
              } else {}

           
            }
          </script>
</head>

<body>
    <div class="container">
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
 //如果数组最后一项字符串长度为0，则删除最后一项
 //strlen返回字符串的长度
  if (strlen((end($groupData)))==0) {
  //该操作为删除数组最后一项
 $result=array_pop($groupData);
 }
 // var_dump($groupData);
 // var_dump();
 //echo strlen((end($groupData)));
 //读取session传入值
 session_start();
$_SESSION['dcode']=$groupData;

//采用 DISTINCT 去重查询结果
$sql = "SELECT DISTINCT *  FROM xdtk where code in (" . implode(',', $groupData) . ")";
mysqli_select_db( $conn, 'lplt' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}
  // if (count($retval)>1) {
  //   echo count($retval);
  //此处需要解决，雪地胎数据库中没有条码，不能查询问题。

echo '<h2 class="text-center">条码查询系统<h2>';
echo '<table  class="table table-hover">    <thead class="thead-dark">
      <tr>
      <th>商品ID</th>
      <th>商品编码</th>
      <th>产品型号</th>
      <th>花纹</th>
      <th>规格</th>
      <th>条形码</th>
      <th>雪地胎日期</th>
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

// }
// else echo "<h2>您输入的条形码雪地胎库中不存在，请检查输入</h2>";



}
?>

    
            
       
            <form name="add"  method="post" action="add.php" >
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="请输入生产日期"  name="date" > 
                <input type="text" class="form-control mx-3" placeholder="请输胶号"  name="glue" >                    
                <input type="submit" name="submit" class="btn btn-primary mx-3" value="确认入库">
              </div>

 
        </div>





    </div>

</body>

</html>
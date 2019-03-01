<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"E:\UPUPW_NP5.6\htdocs\cks2\public/../application/admin\view\main\mtk\batch_query.html";i:1550901212;s:69:"E:\UPUPW_NP5.6\htdocs\cks2\application\admin\view\layout\default.html";i:1547349022;s:66:"E:\UPUPW_NP5.6\htdocs\cks2\application\admin\view\common\meta.html";i:1547349022;s:68:"E:\UPUPW_NP5.6\htdocs\cks2\application\admin\view\common\script.html";i:1547349022;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <div class="panel panel-default panel-intro">
    <?php echo build_heading(); ?>
        <div id="wrapper">
 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>母胎批量查询</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">母胎批量查询</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-12">

        <form action="" method="get">
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
             <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr><th>序号</th>
                                                    <th>商品ID</th>
                                                    <th>商品编码</th>
                                                    <th>产品型号</th>
                                                    <th>花纹</th>
                                                    <th>规格</th>
                                                    <th>条形码</th>
                                                    <th>生产日期</th>
                                                </tr>
                                            </thead>                                            
                                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mtk): $mod = ($i % 2 );++$i;?>
                                            <tr>
                                            <td> <?php echo !empty($page)?($currentPage-1)*10+$i:$i; ?></td>
                                            <td><?php echo $mtk['id']; ?></td>
                                            <td><?php echo $mtk['ordernum']; ?> </td>
                                            <td><?php echo $mtk['model']; ?> </td>
                                            <td><?php echo $mtk['figure']; ?> </td>
                                            <td><?php echo $mtk['tp']; ?> </td>
                                            <?php if($mtk['tp'] != null): ?>
                                            <td><?php echo $mtk['code']; ?> </td>
                                            <td><?php echo $mtk['pd']; ?> </td>
                                            <?php endif; ?>
                                            </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </table>
                                        <?php echo $list->render(); ?>
                                            <div class=" alert alert-success text-center col-lg-2 col-md-4 col-sm-12 pull-left">共<?php echo $count; ?>条数据</div>
           </div>
                    </div>
                </div>
            </div>
</div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>
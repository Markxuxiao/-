<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>信息查询</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="信息查询"/>

  <link rel="stylesheet" href="static/css/amazeui.min.css">


  <style>
    body{
      background: #f0efed;
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      color: #333;
    }
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    #logo {
      height: 40px;
      background: #fff;
      margin-bottom: 10px;
    }
    thead{
      background: #F0E3F7;
    }
    .sjxx h6 {
      margin: 1rem 0;
    }
    .wp {
      max-width: 1200px;
      padding: 20px 5px;
      margin: 0 auto;
      background: #fff;
      border: 1px solid #DDD8CE;
    }

    @media (max-width: 640px) {
      .wp {
          margin:0 5px;
        }
    }
  </style>
</head>
<body>
  <div class="header">
      <div id="logo" class="am-g"><img height="35px" src="http://www.jstimes.com/data/upload/shop/common/04921077366391269.png" alt="logo"></div>
  </div>
  <div class="wp">
    <div class="am-g">
        <h1 style="text-align:center;">发货单信息</h1>
    </div>
    <div class="am-g">
      <div class="sjxx am-u-sm-12 am-u-md-6 am-u-lg-4">

<?php
  //说明：测试的时候是连接的是远程的mssql数据库，没有在本机运行
  //初始化mssql数据库连接,分别是 主机(ip:端口号默认1433), 用户名, 密码
        //$conn=mssql_connect('192.168.1.16:1433','sa','Jstimes123') or die("SQL SERVER 数据库连接失败！"); 
        //选择数据库
        //mssql_select_db('msdb',$conn); 
        //sql语句
		$dbName = 'sqlsrv:Server=192.168.1.16;Database=anywell_hbwhjs';   //"sqlsrv:Server=WIN-46K4RIKHGJO;Database=msdb"; 
        $dbUser = 'sa';   
        $dbPassword = 'Jstimes123';
		$act=$_GET['act'];
		$sqlstr ='select DH,KHBM,KHMC,system_id from XSDD where system_id=\''.$act.'\'';  //201308021754533058810024
		//$sqlstr ='select DH,KHBM,KHMC,system_id from XSDD where system_id=\''.$act.'\'';
		//var_dump($sqlstr);exit;
    try{		
        $db = new PDO($dbName, $dbUser, $dbPassword); 
//从数据库中选择数据，并将结果赋予一个变量,testtable为数据库表
//var_dump('select DH,KHBM,KHMC from XSDD where dh=\'XD1307050027\'');exit;
        //$result=$db->query('select DH,KHBM,isnull(KHMC,\'\') as KHMC,system_id from XSDD');
		//$result=$db->query('select DH,KHBM,isnull(KHMC,\' \') as KHMC,system_id from XSDD where system_id=''$act\');
		$result=$db->query($sqlstr);
		// var_dump($result);exit;
		
		

//将查询出的数据输出

        while($row=$result->fetch(PDO::FETCH_ASSOC)){
		//var_dump($row);exit;
?>
        <h6>商家名称：<?php echo $row['DH'];?></h6>
        <h6>销售单号：<?php echo $row['KHBM'];?></h6>
        <h6>ID：<?php echo $row['KHMC'];?></h6>
        <h6>客户编码：<?php echo $row['system_id'];?></h6>


<?php
}
}catch(Exception $exception){
  echo $exception->getMessage();
}
?>
      </div>
    </div>
    <div class="am-scrollable-horizontal">
      <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
        <thead>
          <tr>
            <th>
              -= 商品编码 =-
            </th>
            <th>
              -= 商品名称 =-
            </th>
            <th>
              -= 批次 =-
            </th>
            <th>
              -= 数量 =-
            </th>
            
          </tr>
        </thead>
        <tbody>
<?php
  //说明：测试的时候是连接的是远程的mssql数据库，没有在本机运行
  //初始化mssql数据库连接,分别是 主机(ip:端口号默认1433), 用户名, 密码
        //$conn=mssql_connect('192.168.1.16:1433','sa','Jstimes123') or die("SQL SERVER 数据库连接失败！"); 
        //选择数据库
        //mssql_select_db('msdb',$conn); 
        //sql语句
		$dbName = 'sqlsrv:Server=192.168.1.16;Database=anywell_hbwhjs';   //"sqlsrv:Server=WIN-46K4RIKHGJO;Database=msdb"; 
        $dbUser = 'sa';   
        $dbPassword = 'Jstimes123';
		$act=$_GET['act'];
		$sqlstr ='select SPBM,HM,SH,SL from XSDDMX where system_id=\''.$act.'\'';  //201308021754533058810024
		//$sqlstr ='select DH,KHBM,KHMC,system_id from XSDD where system_id=\''.$act.'\'';
		//var_dump($sqlstr);exit;
    try{		
        $db = new PDO($dbName, $dbUser, $dbPassword); 
//从数据库中选择数据，并将结果赋予一个变量,testtable为数据库表
//var_dump('select DH,KHBM,KHMC from XSDD where dh=\'XD1307050027\'');exit;
        //$result=$db->query('select DH,KHBM,isnull(KHMC,\'\') as KHMC,system_id from XSDD');
		//$result=$db->query('select DH,KHBM,isnull(KHMC,\' \') as KHMC,system_id from XSDD where system_id=''$act\');
		$result=$db->query($sqlstr);
		// var_dump($result);exit;
		
		

//将查询出的数据输出

        while($row=$result->fetch(PDO::FETCH_ASSOC)){
		//var_dump($row);exit;
?>

        <tr>
        <td><?php echo $row['SPBM'];?></td>
        <td><?php echo $row['HM'];?></td>
        <td><?php echo $row['SH'];?></td>
		<td><?php echo $row['SL'];?></td>
		</tr>

<?php
}
}catch(Exception $exception){
  echo $exception->getMessage();
}
?>
 </tbody>
      </table>
    </div>
  
  </div>
  <div id="foot" class="am-g" style="margin-top:10px;text-align:center;">
      <p>© 2015 wwwjstimes.com</p>
  </div>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/amazeui.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title> 新闻发布</title>
    
 
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>
 	 <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
 
    
 	 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action=" action.php" method="post" enctype="multipart/form-data">    
    <input type="hidden"  name="val" id="val"/>
    <input type="hidden"  name="val1" id="val1"/>
<table class="table table-bordered table-hover definewidth m10" style="width:1200px; margin-left: 0px">
    
    <tr><th width="15%" height="30px"   >标题</th><td><input type="text"  name="newtitle" style="height:24px"/> </td> </tr>
    <tr><th height="30px" >作者</th><td style="font-size: 16px;padding-top:12px;padding-left:12px">
    <?php session_start();	$name=$_SESSION['user'];echo"$name";?></td> </tr>
    <tr><th height="30px" >时间</th><td style="font-size: 16px;padding-top:12px;padding-left:12px"><?php echo $showtime=date("Y-m-d");?></td> </tr>
    <tr><th height="30px" >板块</th><td>
    <select name='cid' >
	  <?php
	  header("content-type:text/html;charset=utf-8");
	  error_reporting(E_ALL ^ E_NOTICE&&E_ALL ^ E_WARNING);
	  include 'conn.php';
	  $sqlcmd="select *from newsclass order by classid asc ";
	  $result=mysql_query($sqlcmd,$conn);
	  $i=0;
	  while($record=mysql_fetch_array($result))
	  {
	  	$i++;
	  	$sn=$record['classname'];
	  	echo"<option value ='$i'>$sn</option>";
	  }
	  ?>
	</select>
    
    
    </td> </tr>
    <tr><th>内容  </th><td>  
    
    
    <div id="editor">
    
        <p>欢迎使用 <b>世纪新闻网</b> 新闻发布</p>
    </div>
   <script type="text/javascript" src="../js/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('#editor') )
        editor.customConfig.showLinkImg = false
        editor.customConfig.uploadImgShowBase64 = false
        editor.customConfig.uploadImgServer = '../upload'
        editor.create()
    </script>
    </td> </tr>
    <tr>
	 
        <tr>
        <td colspan=2  style="text-align:center;height:30px ">	
        <button type="reset" class="btn btn-primary" id="reset1">重置</button>&nbsp;&nbsp; <button type="submit" class="btn btn-success" id="addnew">发布</button>
		</td>
		</tr>
		<tr>
		<td  colspan="2"   style=" text-align:center;color:red;font-size:16px;border-top:none" >
       <Script language="JavaScript"  >
				   document.getElementById('addnew').addEventListener('click', function () {
			   var text=editor.txt.text();
			   var text1=editor.txt.html();
				    var val = text;
				    var val1=text1;
			 document.getElementById('val').value = text;
			 document.getElementById('val1').value =text1;
				    $('#val').val(val);
				    $('#val1').val(val1);
				}, false)
				
			 
		</script>
      	  <?php
             			    
          			$err=isset($_GET["err"])?$_GET["err"]:0;
                                switch($err) {
                                	
                                    case 1:
                                    echo "请输入标题！";
                                    break;
                                    case 10:
                                    echo "发布成功！";
                                    break;
                                  
             } ?>
        </td>
		</tr>
        </table>
 
</form>

</body>
</html>
<script>
 
</script>
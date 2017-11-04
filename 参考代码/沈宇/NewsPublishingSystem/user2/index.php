<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

 

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
<form class="form-inline definewidth m20" action="action.php" method="post" enctype="multipart/form-data">    
    
<table class="table table-bordered table-hover definewidth m10" style="width:1200px; margin-left: 0px">
    
    <tr><th width="15%" height="30px"   >用户名</th><td><input type="text"  name="addname" style="height:24px"/> </td> </tr>
    <tr><th height="30px" >用户组</th><td style="font-size: 16px;padding-top:12px;padding-left:12px"> 会员</td> </tr>
    <tr><th height="30px" >密码</th><td><input type="text"  name="addpassword" style="height:24px"/> </td> </tr>
    <tr><th height="30px" >邮箱</th><td></td> </tr>
    <tr><th>头像</th><td><img id="preview"src="" style="height:280px;width:200px"><input id="imgPicker" type="file" name="uppic" /> </td> </tr>
    </tr>
	 
        <tr>
        <td colspan=2  style="text-align:center;height:30px ">	
        <button type="reset" class="btn btn-primary" id="reset1">重置</button>&nbsp;&nbsp; <button type="submit" class="btn btn-success" id="addnew">添加用户</button>
		</td>
		</tr>
		<tr>
		<td  colspan="2"   style=" text-align:center;color:red;font-size:16px;border-top:none" >
          <?php
             			    
          						$err=isset($_GET["err"])?$_GET["err"]:0;
                                switch($err) {
                                	
                                    case 1:
                                    echo "用户名不能小于5位！";
                                    break;
                                    case 2:
                                    echo "密码不能小于6位！";
                                    break;
                                    case 3:
                                    echo "用户名和密码必填！ ";
                                    break;
                                    case 4:
                                    echo "上传图片不能大于2M！ ";
                                    break;
                                    case 5:
                                    echo "上传的图片文件格式不正确！ ";
                                    break;
                                    case 6:
                                    echo "图片上传失败_请检查数据库操作！ ";
                                    break;
                                    case 7:
                                    echo "图片上传失败！ ";
                                    break;
                                    case 10:
                                    echo "添加成功！";
                                    break;
                                  
                                } ?>
        </td>
		</tr>
        </table>
 
</form>
</body>
</html>
<script>

document
.querySelector('#imgPicker')
.addEventListener('change', function(){
    //当没选中图片时，清除预览
    if(this.files.length === 0){
        document.querySelector('#preview').src = '';
        return;
    }
    //实例化一个FileReader
    var reader = new FileReader();
    reader.onload = function (e) {
        //当reader加载时，把图片的内容赋值给
        document.querySelector('#preview').src = e.target.result;
    };
//读取选中的图片，并转换成dataURL格式
reader.readAsDataURL(this.files[0]);
}, false);
$(function () {       
	$('#reset1').click(function(){
		window.location.href="index.php";
	 });
	 

});
</script>
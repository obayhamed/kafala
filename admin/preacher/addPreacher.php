<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الهيئة الخيرية الاسلامية للرعاية الاجتماعية</title>
<link href="../../style/pageStyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- Title -->
<table align="center" width="80%" >
    <tr >
        <td>
            <img width="100%"  src="../../images/banner.JPG" style="margin: 5px;border: 2px #990033 solid; border-radius: 10px ;" />            
        </td>
    </tr>
</table>
<!-- menu -->
<div class="menu">
<?php include '../menu.php';?>
</div>

<!-- main -->
<div class="main">

<div class="login">
    <h2 align="center" class="adress">بيانات داعية/معلم/مقريء </h2>
<br />
<p id="noti"></p>
<br />

<form action="saveOrphan.php" method="post" >
<table width="85%" border="0" align="center">

  <tr align="center">
    <?php
	include('../../utils/db.php');
	include('../../utils/sponsorAPI.php');
        include('../../utils/error_handler.php');
	$sponsors = fp_sponsor_get();
	$scount = count($sponsors);
	
	?>
    <td width="20%" align="right">
    <select class="select" tabindex="1" name="sponsor" id="sponsor">
    <?php for($i = 0 ; $i < $scount ; $i++){
		$sponsor = $sponsors[$i] ; ?>
      <option value="<?php echo $sponsor->id?>"><?php echo $sponsor->name?></option>
	<?php } ?>
    </select></td>
    <td width="10%">جهة الكفالة</td>
    <td width="10%" align="right">
        <?php fp_select_status_get()?>
    </td>
    <td width="10%" align="center">الحالة</td>
    <td width="10%" align="right">
        <?php fp_select_get_preacher_type();?>
    </td>
    <td width="10%" align="center">النوع</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
	<td>&nbsp;</td>
  	<td align="right"><input class="textFiels" name="name4" type="text" id="name4" tabindex="5" size="10" maxlength="30" /></td>
    <td align="right"><input class="textFiels" name="name3" type="text" tabindex="4" id="name3" size="10" maxlength="30" /></td>
    <td align="right"><input class="textFiels" name="name2" type="text" tabindex="3" id="name2" size="10" maxlength="30" /></td>
    <td align="right"><input class="textFiels" name="name1" tabindex="2" type="text" id="name1" size="10" maxlength="30" /></td>
    <td align="center">الاسم بالكامل</td>
  </tr>
  
    <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="right">
	<td></td>
    <td align="right">
                <td align="center" dir="rtl" >
  	    ذكر<input type="radio" name="s_gender" value="1" id="male_gender" />
            &nbsp;&nbsp;
  	    أنثى<input type="radio" name="s_gender" value="0" id="female_gender" />
  	    
    </td>
    </td>
  	<td align="center">الجنس</td>
    <td align="center">
        <?php fp_select_date_get(1990,null)?>
    </td>
    <td align="center">تاريخ الميلاد</td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
  </tr>
  
    <tr align="center">
  	<td align="right"><input class="textFiels" name="lw" type="text" id="sisters_no" size="10" maxlength="30" /></td>
    <td>الاناث</td>
    <td align="right"><input class="textFiels" name="dr" type="text" id="brothers_no" size="10" maxlength="30" /></td>
    <td align="right">الذكور</td>
    
    <td align="center"><b>:عدد افراد الاسرة  </b></td>
    <td align="right">
        </td>
  </tr>
    
</table>



<!--   Aderss   -->


<br />
<h2 align="center">العنوان</h2>
<br />
<table width="85%" border="0" align="center" id=" ">
  <tr align="center">
  	<td width="13%" align="right"><input class="textFiels" name="district" type="text" id="district" size="10" maxlength="30" /></td>
  	<td width="7%" align="right">الحي</td>
    <td width="25%" align="right"><input class="textFiels" name="city" type="text" id="city" size="15" maxlength="30" /></td>
    <td width="24%" align="center">المدينة/القرية</td>
        <?php
    
	include('../../utils/stateAPI.php');
	$states = fp_states_get();
	$scount = count($states);
	
	?>
    
    <td width="13%" align="right">
    <select class="select" name="state" id="state">
    <?php for($i = 0 ; $i < $scount ; $i++){
		$state = $states[$i] ; ?>
      <option value="<?php echo $state->id?>"><?php echo $state->name?></option>
	<?php } ?>
    </select>
    
      </td>
    <td width="18%" align="center">الولاية</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="center">
	<td>&nbsp;</td>
  	<td align="right"></td>
    <td align="right"><input class="textFiels" name="hno" type="text" id="hno" size="15" maxlength="30" /></td>
    <td align="right">رقم المنزل/معلم بارز</td>
    <td align="right"><input class="textFiels" name="section" type="text" id="section" size="10" maxlength="30" /></td>
    <td align="center">المربع</td>
  </tr>
  
  
    <tr>
    <td>&nbsp;</td>
  </tr>
    <tr align="right">
	<td>&nbsp;</td>
    <td>&nbsp;</td>
     <td align="right"><input class="textFiels" name="impt" type="text" id="tel2" size="10" maxlength="30" /></td>
    <td align="center">جوال 2</td>
    <td align="right"><input class="textFiels" name="impt" type="text" id="tel1" size="10" maxlength="30" /></td>
    <td align="center">جوال 1</td>
  </tr>
  
  
</table>


<!--   Learning   -->


<br />
<h2 align="center">التعليم</h2>
<br />
<table width="85%" border="0" align="center" id=" ">
  <tr align="center">
  	<td style="height: 29px"><input class="textFiels" name="class" type="text" id="digree" size="10" maxlength="30" /></td>
        <td style="height: 29px" id="class_lable">التقدير</td>
        <td width="23%" align="right" style="height: 29px"><?php fp_select_date_get(1985,"c") ?></td>
        <td width="12%" align="center" style="height: 29px" id="school_lable">تاريخه</td>
        <td align="right" ><input class="textFiels" name="level" type="text" id="cert" size="10" maxlength="30" /></td>
        <td style="height: 29px" id="level_lable">المؤهل</td>
        
        
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
  	<td style="height: 29px" id="class_lable"></td>
    <td style="height: 29px" id="class_lable"></td>
  	<td width="23%" align="right" style="height: 29px"><input class="textFiels" name="school" type="text" id="cert_org" size="20" maxlength="30" /></td>
        <td width="12%" align="center" style="height: 29px" id="school_lable">جهة الاصدار</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr align="center">
  	<td style="height: 29px"><?php fp_select_date_get(2010, 'w')?></td>
        <td style="height: 29px" id=""> تاريخ  الالتحاق</td>
  	<td width="23%" align="right" style="height: 29px"><input class="textFiels" name="school" type="text" id="w_org" size="20" maxlength="30" /></td>
        <td width="12%" align="center" style="height: 29px" id="school_lable">جهة العمل الحالية</td>
        <td width="19%" align="right">جزء
	  <select class="select" name="quran" id="quran">
	    <?php
	  for($i=0 ; $i <= 30 ; $i++)
  	  echo "<option value='".$i."'>$i</option>'";
	  ?>
	    </select></td>
        <td width="23%" align="center">حفظ القران</td>    
   </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
</table>


<!-- health -->


<br />
<h2 align="center">الحالة الصحية</h2>
<br />

  <table width="85%" border="0" align="center" id=" ">

  <tr align="center">
  	<td width="2%"></td>
  	<td width="12%" align="right"></td>
  	<td width="38%" align="left"><input class="textFiels" name="illt" type="text" id="illt" size="30" maxlength="30"   /></td>
	<td width="18%" align="center" id="illLable">نوع المرض</td>
        <td width="8%" align="center">
        <select class="select" name="illness" id="illness">
            <option id="goodill" onclick="illness1()" value="1">جيدة</option>
            <option id="badill"  onclick="illness0()" value="0">سيئة</option>
    </select>
    </td>
        
        <td width="28%">الحالة الصحية </td>
        <script type="text/javascript" >
         document.getElementById('illt').style.display = 'none';
         document.getElementById('illLable').innerText = '';
        function illness1(){
             document.getElementById('illt').style.display = 'none';
             document.getElementById('illLable').innerText = '';
         }
         function illness0(){
             document.getElementById('illt').style.display = 'block';
             document.getElementById('illLable').innerText = 'نوع المرض';
         }
        </script>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
</table>
<script type="text/javascript" id="illt1" >
    
</script>
<!-- Employee -->

<table width="85%" border="0" align="center" >
</tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><button class="add_bt" style="width: 130px" name="add" type="button" onclick="IsEmpty()" ><img align="right" src="../../images/style images/add_icon.png" style="padding-left:5px" /> اضافة  </button></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</div>
    <div  style="margin: 0 auto; text-align: center ; width: 60%;" id="reponse">
    <span id="res_stattus"></span>
</div>
<script type="text/javascript" >
        
function IsEmpty(){ 
        var text = document.getElementsByName('impt');
        var empty_checker = 0 ;
        for(var i = 0 ; i< text.length ; i++){
           if(text[i].value == ''){
               text.item(i).style.color = "#ff0000" ;
               text.item(i).setAttribute("placeholder","هذا الحقل فارغ");
               empty_checker++;
           }
        }
        if(empty_checker > 0 )alert("هناك حقول يجب تعبئتها");
        else {
            if(document.getElementById('tel1').value.length > 9 )
                get_str();
            else
                alert("يجب ان يكون رقم التلفون أكبر من 10 خانات");
        }
}

function get_str(){
        
	var text = document.getElementsByTagName('input');
        var select = document.getElementsByTagName('select');
        var str = '';
        for(var i = 0 ; i< text.length ; i++){
           str += text[i].getAttribute('id')+'='+text[i].value+'&';
        }
        for(var i = 0 ; i< select.length ; i++){
           str += select[i].getAttribute('id')+'='+select[i].value+'&';
        }
        gender_value = 1 ;
        if(document.getElementById("male_gender").checked == true) gender_value = "1" ;
        else gender_value = "0" ;
        str+="gender="+gender_value;
        //window.location.href = "savePreacher.php?"+str;
        ajax(str);
}
function ajax(str)
{		
    var ajax;
	//var d_node = document.getElementById(elementID);
	elementID = "div";
	filename = "savePreacher.php";
	post = false ;
    if (window.XMLHttpRequest)
    {
        ajax=new XMLHttpRequest();//IE7+, Firefox, Chrome, Opera, Safari
    }
    else if (ActiveXObject("Microsoft.XMLHTTP"))
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");//IE6/5
    }
    else if (ActiveXObject("Msxml2.XMLHTTP"))
    {
        ajax=new ActiveXObject("Msxml2.XMLHTTP");//other
    }
    else
    {
        alert("Error: Your browser does not support AJAX.");
        return false;
    }
    ajax.onreadystatechange=function()
    {
        if (ajax.readyState==4&&ajax.status==200)
        {
            document.getElementById("res_stattus").innerHTML=ajax.responseText;
        }
    }
    if (post==false)
    {
        ajax.open("GET",filename+"?"+str,true);
        ajax.send(null);
		
    }
    else
    {
        ajax.open("POST",filename,true);
        ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax.send(str);
    }
    return ajax;
	
}

	
</script>
<div id="footer">
<p>جميع الحقوق محفوظة 2016 &copy;</p>
</div>
</div>
</body>
</html>

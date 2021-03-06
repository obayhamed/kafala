<?php
    include '../auth.php';
	include('../../utils/db.php');
	include('../../utils/studentAPI.php');
        include('../../utils/error_handler.php');
        include('../../utils/siblingAPI.php');
        $start=0;
    $limit=20;
    $total_results = fp_student_get_num_rows();
        $total=ceil($total_results/$limit);
    if(!isset($_GET['page']) || $_GET['page'] == '' || (int)$_GET['page'] == 0 || $_GET['page']>$total)
    {
    $page=1;
    }
    else{
    $page=$_GET['page'];
    $start=($page-1)*$limit;
    }
        $orphans = fp_student_get("LIMIT $start, $limit");
	
        
?>
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
    <h1 align="center" class="adress" dir="rtl"> بيانات الطلاب غير المعتمدة<?php echo "($total_results)"?> </h1>
<br />
 <?php
    //if($users[0] == NULL ) die($users[1]) ;
        if($orphans == -1 ) {
            echo '
                <div style="text-align:center;color:#fff;">
                <div class="alert-box error"><span>خطأ: </span>هناك مشكلة في الاتصال بقاعدة البيانات    </div>
                 </div>
                <div id="footer">
                <p>جميع الحقوق محفوظة 2016 &copy;</p>
               </div>';
            die() ;
        }
        else
        if($orphans == 0 ) {
            echo '
                <div style="text-align:center;color:#fff;">
                <div class="alert-box notice"><span>تنبيه: </span>لا يوجد طلاب لعرضهم
                <p>يمكنك اضافة طلاب من <a href="addStudent.php">هنا</a></p>
                </div>
                <div id="footer">
                <p>جميع الحقوق محفوظة 2016 &copy;</p>
               </div>';
            die() ;
        }
        
	$ocount = @count($orphans);

?>
<table width="90%" border="0" align="center" class="table">
    <tr class="table_header" align="center">
    <td width="7%">عرض</td>
    <td width="7%">العمر</td>
    <td width="9%">الولاية </td>
    <td width="8%">الجنس </td>
    <td width="29%">جهة الكفالة</td>
    <td width="15%">الحالة</td>
    <td width="28%">الاسم </td>
    <td  width="4%">الرقم</td>
    
  </tr>
  <?php 
  	include('../../utils/stateAPI.php');
	include('../../utils/sponsorAPI.php');

function ageCalculator($dob){
        if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }
	else
        return 0;   
}
  	for($i = 0 ; $i < $ocount ; $i++){
		$orphan = $orphans[$i];
  ?>
    <tr align="center" class="table_data<?php echo $i%2?>">
        <td  onclick="window.location.href='studentInfo.php?id='+<?php echo json_decode($orphan->phone1)?>"><img alt="عرض" align="middle" width="22px"  src="../../images/style images/show_icon.png" style="padding-left:5px" /></td>
    <td width="7%"><?php echo ageCalculator($orphan->birth_date);?></td>
 	<td width="9%"><?php echo fp_states_get_by_id($orphan->residence_state)->name;?></td>
    <td width="8%"><?php if($orphan->sex==1)echo "ذكر"; else echo "أنثى" ; ?> </td>
    <td width="29%"><?php echo fp_sponsor_get_by_id($orphan->warranty_organization)->name;?></td>
    <td width="15%"><?php fp_one_status_get_by_id($orphan->state)?></td>
    <td width="28%"> <?php echo $orphan->first_name." ".$orphan->meddle_name." ".$orphan->last_name." ".$orphan->last_4th_name?></td>
    <td width="4%"><?php echo $orphan->id?></td>
    
  </tr>
  <?php }
  fp_db_close();?>
  </table>

<br />
<div class="pagination">
    <ul class='page'>
  <?php
    
if($page>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<a href='?page=".($page-1)."' class='button'>السابق</a>";
}

//show all the page link with page number. When click on these numbers go to particular page.
        for($i=1;$i<=$total;$i++)
        {
            if($i==$page) { echo "<li class='current'>".$i."</li>"; }
             
            else { echo "<li><a href='?page=".$i."'>".$i."</a></li>"; }
        }
   if($page!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<a href='?page=".($page+1)."' class='button'>التالي</a>";
} 

?>
</ul>
</div> 
<div id="footer">
  <p>جميع الحقوق محفوظة 2016 &copy;</p>
</div>
</div>
</body>
</html>

<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 尚未登入
if (!isset($_SESSION['Username'])) {
  header('Location: index.php');
}
?>
<?php
//**********************************//
// 顯示member資料表的目前紀錄
//**********************************//
$username = "-1";
if (isset($_SESSION['Username'])) {
  $username = $_SESSION['Username'];
}

// 選擇 MySQL 資料庫DEVELOPERS
mysql_select_db('DEVELOPERS', $connection) or die('資料庫DEVELOPERS不存在');
// 查詢目前帳號的紀錄
$query = sprintf("SELECT * FROM member WHERE username = %s", GetSQLValue($username, "text"));

// 傳回結果集
$result = mysql_query($query, $connection);
// 讀取目前帳號的紀錄
if ($result) {
	$row = mysql_fetch_assoc($result);
}
else {
	header('Location: index.php');
}
?>
<?php
//**********************************//
// 更新在member資料表內的一筆紀錄
//**********************************//
if ((isset($_POST["update"])) && ($_POST["update"] == "member_info")) 
{
    // 選擇 MySQL 資料庫DEVELOPERS
	mysql_select_db('DEVELOPERS', $connection) or die('資料庫DEVELOPERS不存在');	
	// 新的帳號
	$_SESSION['Username'] = $_POST['username'];
	
	// 在member資料表內插入一筆新的紀錄
    $query = sprintf("UPDATE member SET username=%s, password=%s, name=%s, sex=%s, birthday=%s, email=%s, phone=%s, address=%s, uniform=%s, unititle=%s, userlevel=%s WHERE id=%s", GetSQLValue($_POST['username'], "text"), 
	GetSQLValue($_POST['password'], "text"), GetSQLValue($_POST['name'], "text"), GetSQLValue($_POST['sex'], "text"), 
	GetSQLValue($_POST['birthday'], "date"), GetSQLValue($_POST['email'], "text"), GetSQLValue($_POST['phone'], "text"), 
	GetSQLValue($_POST['address'], "text"), GetSQLValue($_POST['uniform'], "text"), GetSQLValue($_POST['unititle'], "text"),
	GetSQLValue($_POST['userlevel'], "int"), GetSQLValue($_POST['id'], "int"));

	// 傳回結果集
    $result = mysql_query($query, $connection);

	if ($result) {
	    // 回到前一個網頁 
	  	header(sprintf("Location: %s", $_SESSION['PrevPage']));
	}
}
?>
<?php 
// 取得這筆紀錄的 birthday 欄位值
$date = getdate(strtotime($row['birthday']));
// 設定 [年],[月],[日] 欄位
$year = $date['year'];
$month = $date['mon'];
$day = $date['mday'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員基本資料</title>
<link href="CSS/member_info.css" rel="stylesheet" type="text/css" />
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="JavaScript/member_info.js" type="text/javascript"></script>
</head>
<body>
<table class="member_info_style1">
  <tr>
    <td class="member_info_style2">
	  <span class="member_info_style3">
        會員基本資料 
      </span>          
    </td>
  </tr>
  <tr>
    <td>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onkeydown="if(event.keyCode==13) return false;"> 
	    <table class="member_info_style4">
          <tr>
            <td class="member_info_style5">
              <span class="member_info_style6">注意事項</span>
              <br /><br />
              <span class="member_info_style7">
                1. 在修改之前，請先確認您要修改的資料。
              </span>
              <br />
              <span class="member_info_style7">
                2. 修改資料之後，就無法再還原。
              </span>
            </td>
          </tr>
          <tr>
            <td class="member_info_style16">
        	  <table class="member_info_style9">
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">帳　　號</span>                 
                 </td>
                 <td class="member_info_style12">
                   <input name="username" id="username" type="text" class="member_info_style13" size="20" maxlength="10" 
                     value="<?php echo $row['username']; ?>" />
                     <span class="member_info_style8">＊</span>（3~10個字元，請勿使用中文）                 
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     密　　碼
                   </span>
                 </td>
                <td class="member_info_style12">
                   <input name="password" id="password" type="password" class="member_info_style13" size="20" maxlength="12" 
                     value="<?php echo $row['password']; ?>" />
                     <span class="member_info_style8">＊</span>（6~12個字元，請勿使用中文）
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     姓　　名
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="name" id="name" type="text" class="member_info_style13" size="20" maxlength="40" 
                     value="<?php echo $row['name']; ?>" />
                     <span class="member_info_style8">＊</span>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     性　　別
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="sex" type="radio" value="男" class="member_info_style14"  
                     <?php if (!(strcmp($row['sex'],'男'))) 
		               {echo "checked=\"checked\"";} ?> />
                     男
		           <input name="sex" type="radio" value="女" 
		             <?php if (!(strcmp($row['sex'],'女'))) 
		              {echo "checked=\"checked\"";} ?> />
  	                 女  
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     電子信箱
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="email" id="email" type="text" class="member_info_style13" size="40" maxlength="40" 
                     value="<?php echo $row['email']; ?>" />
                     <span class="member_info_style8">＊</span>
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     出生日期
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="year" id="year" type="text" class="member_info_style13" size="6" maxlength="4" 
                     value="<?php echo $year; ?>" />
                     &nbsp;年&nbsp;
                   <!-- 在選單中填入[出生日期]的[月]欄位值 -->
	               <select name="month" id="month">
        		   <?php
		  			 for ($i = 1; $i <= 12; $i++)
		  			 {
				   ?>
            	     <option value="<?php echo $i ?>"
              	       <?php if ($i==$month){echo "selected=\"selected\"";} ?>>
                       &nbsp;&nbsp;<?php echo $i ?>&nbsp;
                     </option>         
				   <?php
                     }
                   ?>
                   </select>
                   &nbsp;月&nbsp;&nbsp;
                   <select name="day" id="day">
                   <?php
                     for ($i = 1; $i <= 31; $i++)
                     {
                   ?>
                       <option value="<?php echo $i ?>" 
                         <?php if ($i==$day){echo "selected=\"selected\"";} ?>>
                         &nbsp;&nbsp;<?php echo $i ?>&nbsp;&nbsp;
                       </option>         
                   <?php
                     }
                   ?>
                   </select>
                   &nbsp;日&nbsp;&nbsp;
                   <span class="member_info_style8">＊</span>（請填入西元年, 例如 2010）
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     連絡電話 
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="phone" id="phone" type="text" class="member_info_style13" size="20" maxlength="15" 
                     value="<?php echo $row['phone']; ?>" />
                     <span class="member_info_style8">＊</span>  
                 </td>
               </tr>
               <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     收件地址  
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="address" id="address" type="text" class="member_info_style13" size="60" maxlength="120"
                     value="<?php echo $row['address']; ?>" />
                     <span class="member_info_style8">＊</span> 
                 </td>
               </tr>
		       <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     統一編號
                   </span> 
                 </td>
                 <td class="member_info_style12">
                   <input name="uniform" id="uniform" type="text" class="member_info_style13" size="40" maxlength="20"
                     value="<?php echo $row['uniform']; ?>" />
                 </td>
               </tr>
		       <tr>
                 <td class="member_info_style10">
                   <span class="member_info_style11">
                     發票抬頭
                   </span>
                 </td>
                 <td class="member_info_style12">
                   <input name="unititle" id="unititle" type="text" class="member_info_style13" size="40" maxlength="40"
                     value="<?php echo $row['unititle']; ?>" />
                 </td>
               </tr>
             </table>
           </td>
         </tr>
         <tr>
           <td class="member_info_style2">
             <table class="member_info_style9">
               <tr>
                 <td class="member_info_style2">
                   <input type="submit" value="確定送出" onclick="return CheckFields();" />
                   <input type="button" value="取消" class="member_info_style15" 
                   	 onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
                 </td>
               </tr>
             </table> 
           </td>
         </tr>
       </table> 
	   <input name="userlevel" id="userlevel"type="hidden" value="<?php echo $row['userlevel']; ?>" />
       <input name="birthday" id="birthday" type="hidden" value="<?php echo $row['birthday']; ?>" />
       <input name="id" id="id" type="hidden" value="<?php echo $row['id']; ?>" />
	   <input name="old_username" id="old_username" type="hidden" value="<?php echo $row['username']; ?>" />
       <input name="update" id="update" type="hidden" value="member_info" />
	  </form>
   </td>
 </tr>
</table>
</body>
</body>
</html>
<?php
// 釋放結果集
mysql_free_result($result);
?>
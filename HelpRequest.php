<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="presid.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Workout Buddy</title>
<style type="text/css">
.login
{
    z-index:100;
    position:absolute;      
    top:30px;
    font-size:14px;
   /* margin-left:0px;*/

}
</style>
    </head>
    <?php include 'header.php';  ?>     
    <?php include 'leftCol.php';  ?> 
    <!-- include header because All pages will be the same if I make any change-->
    <body>
<div id="wrap">
<div id="right" >

<form action="http://pcd.jbics.info/mail/send_form_email.php" method="post">
    <table class="ok" width="450px">
            <tr>
                <td valign="top"><label for="first_name">First Name *</label></td>
                <td valign="top"><input  type="text" name="first_name" maxlength="50" size="30" <?php if(isset($_SESSION['fname'])){ echo "value='".$_SESSION['fname']."'"; }?> ></td>
            </tr>
            <tr>
                <td valign="top"><label for="last_name">Last Name *</label></td>
                <td valign="top"><input  type="text" name="last_name" maxlength="50" size="30" <?php if(isset($_SESSION['lname'])){ echo "value='".$_SESSION['lname']."'"; }?>></td>
            </tr>
            <tr>
                <td valign="top"><label for="email">Email Address *</label></td>
                <td valign="top">
                    <!-- <input  type="text" name="email" maxlength="80" size="30"> -->
                    <select name="email" STYLE="width: 215px">
                        <option value="cs635@drexel.edu">Fitness Staff</option>
                        <option value="ice.jbics@gmail.com">Front Desk </option>
                        <option value="ite23@drexel.edu">Massage Office</option>
                        <option value="vgdghz@gmail.com">General Info</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top"><label for="Subject">Subject</label></td>
                <td valign="top"><input  type="text" name="subject" maxlength="30" size="30"></td>
            </tr>
            <tr>
                <td valign="top"><label for="comments">Comments *</label></td>
                <td valign="top"><textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <input type="submit" value="Submit">   
                    <!-- <a href="http://www.freecontactform.com/email_form.php">Email Form</a> -->
                </td>
            </tr>
        </table> 





</form>
        
</div>
<div id="footer" align="right">
<p>Copyright © 2014 CS,IT </p>
</div>
</div>
        
</body>

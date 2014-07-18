<link rel="stylesheet" type="text/css" href="presid.css" />
<div id="wrap">
    
<div id="left">
<h2></h2>
<div align="center">
    
 <?php 
 if(isset($_SESSION['status']) && !empty($_SESSION['status'])) {
   echo"
<ul class='left'>
<li><a href='MyProfile.php'>My Profile</a></li>  
<li><a href='GroupExercise.php'>Calendar</a></li>         
<li><a href='RecommendedPlan.php'>Workout Plan</a></li> 
<li><a href='AddFriend.php'>Add Friend</a></li>
<li><a href='FriendsList.php'>Friend List</a></li>
<li><a href='WorkoutRecord.php'>Workout Record</a></li>
<li><a href='HelpRequest.php'>Help Request Form</a></li>

</ul>"; 
}
else{
    echo "Please login";
}
 ?>
</div>
</div>
    
</div>
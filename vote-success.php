<?php

require('connection.php');
session_start();

if( empty($_SESSION['member_id'])) {
  header("location:access-denied.php");
}

?>

<?php

if( isset($_GET['vote']) ) {
  $vote = $_REQUEST['vote'];

  mysql_query( "UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'" );
  /*mysql_close( $con );*/

  $_SESSION['voter_status'] = 2;
  $voter_status = $_SESSION['voter_status'];
  $voterid = $_SESSION['voter_id'];
  $sql = "UPDATE tbmembers SET voter_status='$voter_status' WHERE voter_id='$voterid'";
  $result = mysql_query( $sql ) or die( mysql_error() ); 

  mysql_close( $con );

}

?> 


<!DOCTYPE html>
<html>
<head>
  <title>Vote-Chain</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <script language="JavaScript" src="js/user.js"></script>
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="voter.php">Vote-Chain</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a class="drop" href="#">Voter Pages</a>
          <ul>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">Profile Manager</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded" style="background-color: #FAFAFA;">
  <section id="testimonials" class="hoc container clear">
<!--     <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2> -->
    <ul class="nospace group">
      <li class="one_half first">
        <!-- <blockquote> -->
          <div id="container" style="color: black;">
            <p><h1>Congratulation!</h1></p>
            <p>You have successfully voted.</p>
          </div>
        <!-- </blockquote> -->
      </li>
    </ul>
  </section>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>
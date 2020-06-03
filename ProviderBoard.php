<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//IF USER DID NOT LOGIN IN LOCAL SYSTEM
//$_SESSION['user']='DB_Shirts';
$user=$_SESSION['user'];

if(!$_SESSION['user'] or $_SESSION['user']=='none')
	
	header('location: login.php');

include("connection.php");

			setcookie ("user",$_SESSION['user'],time()+ 3600);
	  		
			setcookie ("category","provider",time()+ 3600);
include("tender_create.php");
?>

<html>

<head>

<link rel="icon" href="images\logo1.jpg">
	
	<meta charset="UTF-8">
	<meta http_equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Dashboard | <?php echo $_SESSION['user'];?></title>
	<meta http_equiv="X-UA-Compatible" content="ie=edge">
  	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/osp.css">
  
</head>
<style>
.carousel-control-next-icon,
.carousel-control-prev-icon {
  filter: invert(1);
}
</style>

<body>
  
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
 
  <img class="mr-auto rounded" src="images\logo1.jpg" height="40px" width="40px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-4">
      <li class="nav-item active">
        <a class="nav-link" href="10DER.php">Home <span class="sr-only">(current)</span></a>
      </li>
  </ul>
  	 <form class="form-inline my-2 my-lg-0 mr-auto frm">
      <input class="form-control mr-sm-0" type="search" onclick="location.href='advsearch.html'"  placeholder="Search" aria-label="Search" size="100%">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-1" type="submit">Search</button>
    </form>
    <ul class="navbar-nav navbar-auto">
    	  
      <li class="nav-item">
        <a class="nav-link active mr-4" href=".\logout.php"><?php echo $_SESSION['user']; ?></a>
      </li>

       <li class="nav-item dropdown active ml-2 mr-4 ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Explore
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#contact">Contact us</a>
          <a class="dropdown-item" href="#contact">About</a>
          
        </div>
      </li>
      </ul>
   </div>
 </div>
</nav>


	
  <div class="container" >
  <div class="container mt-4" class="table-responsive">
    <h2 style="font-family: algerian">Your Ongoing 10ders:-</h2>
    <hr style="display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 10px;">

	<table class="border border-primary table table-striped table-hover table-bordered rounded-sm mr-auto table table-bordered" cellpadding="70"  cellspacing="30" style="text-align:center" valign="middle" style="border: 3px solid black !important" >

      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="100">
      <thead class="thead-dark">
        <th style="font-family: algerian">10der</th>
        <th style="font-family: algerian">Your Bid</th>
        <th style="font-family: algerian">Your rank</th>
        <th style="font-family: algerian">Closing date</th>
        <th>    </th>
      </thead>
      <?php
	  $querypro='SELECT tender.title, tender.end, bid.bidder, bid.amount, RANK() OVER (PARTITION BY bid.tno ORDER BY bid.amount)rank FROM bid
            INNER JOIN tender
            ON tender.tno=bid.tno where 1 and bid.bidder="'.$user.'"';
	  $resultpro=$conn->query($querypro);
	  if($resultpro===false||mysqli_num_rows($resultpro)==0)
			{
				echo '<tr>
        <td colspan="5"><h4 align="center"> Snap &#128557;, You havent fired up any 10der-bids yet, Click a 10der and shoot a bid ! </h4></td>
      </tr>';
			}
	  else
	  {
			while($rowpro = $resultpro -> fetch_assoc())
			{
				
	  echo '<tr>
        <td><a href="#" style="font-family: Source Sans Pro">'.$rowpro["title"].'</a></td>
        <td style="padding-top: 20px">&#8377; '.$rowpro["amount"].'</td>
        <td style="padding-top: 20px">'.$rowpro["rank"].'</td>
        <td style="padding-top: 20px">'.$rowpro["end"].'</td>
        <td style="padding-top: 20px"><button type="button" class="btn btn-info"><i>Edit Bid</i></button></td>
      </tr>';

			}
				
		  
	  }
	  ?>    </table>
  </div>
  <hr style="display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 5px;">
  <div style="padding-bottom: 20px">
<div class="container-fluid" style="padding-bottom: 20px;border-bottom: 5px solid black">
  <h1 style="font-family: oswald"><strong>You may also like:-</strong></h1>
  <div id="myCarousel" align="center" class="carousel slide" data-ride="carousel">
    <div align="center" class="carousel-inner row w-100 mx-auto">
	<?php
	$aoi="select aoi from provider where username='".$user."'";
	$resultf=$conn->query($aoi);
	$rowf = $resultf -> fetch_assoc();
	$aoimaster=$rowf['aoi'];	
	$myArray = str_split($aoimaster);
	$a="'";
	foreach($myArray as $character){
		if($character==",")
		{
			$a=$a."'";
			$a=$a.$character;
			$a=$a."'";
		}
		else $a=$a.$character;
	}
	$a=$a."'";
	if($a!="''")
	{
		$youmaylike="select title,start,end,description from tender where 1 and aoi in (".$a.") and start<CURDATE() and end>CURDATE()";
		$resultlike=$conn->query($youmaylike);
		if($resultlike===false||mysqli_num_rows($resultlike)==0)
		{
			echo '<div style="margin: auto;" class="carousel-item col-md-4 active">
        <div class="card">
		
          <div class="card-body">
            <h4 class="card-title" style="font-family: algerian"><strong>Oops!</strong></h4>
            <p  class="card-text">We cant find any tenders of your area of interest. Hang in there, our service providers are busy lining up their demands!</p>
            <p class="card-text"><small class="text-muted">Come back later for more!</small></p>
          </div> 
        </div>
      </div>';
      
		}
		else{
			$v=0;
				while($rowlike = $resultlike -> fetch_assoc())
				{
					if($v==0)
					{echo '<div style="margin: auto;" class="carousel-item col-md-4 active">';$v=1;}
					else echo '<div style="margin: auto;" class="carousel-item col-md-4">';
					echo '<div class="card">
          <div class="card-body">
            <h4 class="card-title" style="font-family: algerian"><strong>'.$rowlike['title'].'</strong></h4>
            <p class="card-text">'.$rowlike['description'].'</p>
            <p class="card-text"><small class="text-muted">Last date: '.$rowlike['end'].'</small></p>
          </div>
        </div>
      </div>';
				}
		}
	}
	?>      
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span color="green" class="carousel-control-prev-icon" area-hidden="true"></span>
      <span class="sr-only" style=" color: #FF0000;background-color: #00FFFF;">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" area-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</div>

<footer class="page-footer font-small mdb-color pt-4 bg-dark text-white">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">10Der Corporation</h6>
        <p>A step towards Enchancement, Expansion and Economizing</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 text-white productso">
        <h6 class="text-uppercase mb-4 font-weight-bold">Services</h6>
        <p>
          Construction
        </p>
        <p>
          Computers
        </p>
        <p>
          Elecrtrical
        </p>
        <p>
          Food
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 links text-white">
        <h6 class="text-uppercase mb-4 font-weight-bold"> Creators</h6>
        <p>
        R Senthil Kumar
        </p>
        <p>
        Shashank Kesharwani
        </p>
        <p>
        Gunjan Kumar
        </p>
        
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div id="contact" class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-white text-left homefont">
        <h6 class="text-uppercase text-left mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> 10der corporation</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> gkr54322@gmail.com</p>
       
        <p>
          <i class="fas fa-print mr-3"></i> +91 9752422440</p>
           <p>
          <i class="fas fa-print mr-3"></i> +91 7339659559</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">© 2020 Copyright:
          <a href="#!" class="text-white">
            <strong> 10DER.com</strong>
          </a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right socialo">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>

<!-- Footer -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	 <script type="text/javascript">
    $(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});
  </script>
</body>
</html>

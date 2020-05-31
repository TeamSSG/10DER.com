<?php
session_start();

//IF USER DID NOT LOGIN IN LOCAL SYSTEM
if(!$_SESSION['user'] or $_SESSION['user']=='none')
	header('location: login.php');


include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>

<link rel="icon" href="images\logo1.jpg">
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
	<meta http_equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Your C-Board</title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href=".\css\cboard.css">
 
</head>
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
        <a class="nav-link" href="10DER.html">Home <span class="sr-only">(current)</span></a>
      </li>
  </ul>
  	 <form class="form-inline my-2 my-lg-0 mr-auto frm">
      <input class="form-control mr-sm-0" type="search" onclick="location.href='advsearch.html'"  placeholder="Search" aria-label="Search" size="100%">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-1" type="submit">Search</button>
    </form>
    <ul class="navbar-nav navbar-auto">
    	  
      <li class="nav-item">
        <a class="nav-link active mr-4" href=".\loginnew.html"><?php echo $_SESSION['user']; ?></a>
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

<div id="popover2">

<h6 align="center"><img src=".\images\agreement.png" width="95%"></h6>
<h4 align="center"><u>Form of Tender</u></h4>
<div id="dater">
A-106,Vellore Institute of Technology
<br>Vellore-18
<br>
</div>

<script>
var d=new Date();document.getElementById("dater").innerHTML+=d.getDate()+"/"+(1+d.getMonth())+"/"+d.getFullYear();</script>
<br>
<div id="sellerdetails"></div>

We would like to purchase the supply of goods or services provided by your firm and fixed prices as agreed upon.
<br>
<br>
Our tender remains open for acceptance for a trial period of thirty calendar days following the tender closing date. It is confirmed that unsatisfactory performance during the trial period will lead to cancellation of tender without any prior notice.
<br>
<br>
The tender fully complies with your firm's specification. It goes without saying that the tender is fully subjected to the Terms and Conditions previously mentioned.
<br>
<br>
Should you need anything further, it can be discussed by the undersigned at the above address
<br>
<br>
Yours sincerely
<input type="text" class="form-control" placeholder="type your name to DIGI-SIGN the agreement">
<br>
<h6 align="center"><button id="ct1" class="btn btn-primary">Sanction</button><button id="ct2" class="btn btn-primary">Cancel</button></h6>
</div>    




<div id="popover" class="bg-light">
<button id="close">&#10005;</button>
<br>
<h2>Create a 10der..</h2>

<h6 id="desc1">Step 1 of 2</h6><h6 id="desc2">Step 2 of 2</h6>

<div class="bg-light" style="margin-up:5px;">
<div class="container bg-white shadow" id="step1">
	<div class="form-group ">
      <label for="inputPassword4">Tender Title</label>
      <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="eg: Shirt stitching tender">
    </div>
  
  <div class="form-group">
      <label for="inputState">Tender Category</label>
      <select id="category" name="categ" class="form-control">
        <option selected>Choose...</option>
        <option>CLO- Clothing</option>
		<option>FUR- Furniture</option>

      </select>
    </div>
	<div class="form-row">
	<div class="form-group col-md-6">
      <label for="inputState">Bidding opens on:</label>
      <input type="date" name="start" class="form-control" placeholder="10/04/2000">
    </div>
	
	<div class="form-group col-md-6">
      <label for="inputState">Bidding closes by:</label>
      <input type="date" name="end" class="form-control" placeholder="10/04/2000">
    </div>
	</div>
</div>

<button id="s1" class="btn bbb btn-primary">Next&nbsp;&gt;</button>


<div class="container bg-white shadow" id="step2">
	<div class="form-group ">
      <label for="inputPassword4">Description, Terms and Conditions</label>
      <textarea rows="9" class="form-control">A Detailed description of what product/service you need from the manufacturer. Also, List out the requirements, amount dispersion mechanism and cancellation norms upon quality-dissatisfaction</textarea>
	  </div>

</div>

<button id="s2" class="btn bbb btn-primary">Done&nbsp;&#10003;</button>



</div>





</div>
	

<div class="bg-light">
<article class="container bg-white shadow pt-5">



<h2 align="left"><b>Your active 10ders </b></h2>
<hr width="95%" align="center">

<?php
$query="select tno,title from tender where creator='".$_SESSION['user']."'";
$result=$conn->query($query);
if(mysqli_num_rows ( $result)==0)
	echo '<br><br><h4 align="center"> Oops&#128532;! You havent fired up any 10ders yet! Press the "new" button to create one! </h4>';

?>
<br>
<h4 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#T101: Uniform tender</h4>

<div id="create_div">
<button id="create" >&nbsp;&nbsp;&Dagger;&nbsp;New...&nbsp;&nbsp;</button>
</div>


<ul id="container_list">
<li>
<div class="bid">
<b><span onclick="location.href='bboard.html'" class="sellerid">Kumar_shirts</span><sup class="rating">&nbsp;3.7&#9733;&nbsp;</sup>:-&nbsp;&nbsp;<span class="price">&#8377; 50,000</span></b><br>
<span class="subject">First quality shirts will be printed with ease</span>
<span class="description">We can print good quality shirts within stipulated amount. We may offer shirts in sizes X, M, L and XL. Please contact us for further details.</span>
<button class="kn">&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>
<button class="procure"><i>&nbsp;&#10004;&nbsp;&nbsp;Procure&nbsp;&nbsp;</i></button>
<button class="shortlist"><i>&nbsp;&#10710;&nbsp;&nbsp;shortlist&nbsp;&nbsp;</i></button>
<!--SLIDER ICON--><!--HOVER BUTTON ICON--><!--SLIDER ICON-->
</div>
</li>
<li>
<div class="bid">
<b><span class="sellerid">Parvathi._.dressers</span><sup class="rating">&nbsp;4.7&#9733;&nbsp;</sup>:-&nbsp;&nbsp;<span class="price">&#8377; 70,000</span></b><br>
<span class="subject">Proffesional dressers for schoolchildren</span>
<span class="description">Since there are 1000+ students in the school, fabric and stitching costs are high. Neverthless, we will offer first class quality.</span>
<button class="kn">&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>
<button class="procure"><i>&nbsp;&#10004;&nbsp;&nbsp;Procure&nbsp;&nbsp;</i></button>
<button class="shortlist"><i>&nbsp;&#10710;&nbsp;&nbsp;shortlist&nbsp;&nbsp;</i></button>
<!--SLIDER ICON--><!--HOVER BUTTON ICON--><!--SLIDER ICON-->
</div>
</li>

<li>
<div class="bid">
<b><span class="sellerid">the_basic.uniformists</span><sup class="rating">&nbsp;4.9&#9733;&nbsp;</sup>:-&nbsp;&nbsp;<span class="price">&#8377; 75,000</span></b><br>
<span class="subject">uniform providers for your school for more than 30 years</span>
<span class="description">Quality is our concern. We provide blazers, skirts, shirts, trousers and sports pants that last long</span>
<button class="kn">&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>
<button class="procure"><i>&nbsp;&#10004;&nbsp;&nbsp;Procure&nbsp;&nbsp;</i></button>
<button class="shortlist"><i>&nbsp;&#10710;&nbsp;&nbsp;shortlist&nbsp;&nbsp;</i></button>
<!--SLIDER ICON--><!--HOVER BUTTON ICON--><!--SLIDER ICON-->
</div>
</li>
<br>

<h4 align="left">#T102: Woodworks tender</h4>
<li>
<div class="bid">
<b><span class="sellerid">Plywood_finishers</span><sup class="rating">&nbsp;2.7&#9733;&nbsp;</sup>:-&nbsp;&nbsp;<span class="price">&#8377; 150,000</span></b><br>
<span class="subject">Doors and windows</span>
<span class="description">Wood and glass finishings for doors and windows in your school can be done at offer price.</span>
<button class="kn">&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>
<button class="procure"><i>&nbsp;&#10004;&nbsp;&nbsp;Procure&nbsp;&nbsp;</i></button>
<button class="shortlist"><i>&nbsp;&#10710;&nbsp;&nbsp;shortlist&nbsp;&nbsp;</i></button>
<!--SLIDER ICON--><!--HOVER BUTTON ICON--><!--SLIDER ICON-->
</div>
</li>

<li>
<div class="bid">
<b><span class="sellerid">Tree_house</span><sup class="rating">&nbsp;4.7&#9733;&nbsp;</sup>:-&nbsp;&nbsp;<span class="price">&#8377; 225,000</span></b><br>
<span class="subject">Teakwood furnishings</span>
<span class="description">Schoolbenches, doors, cupboards, beds and cots, and all other wooden material can be made with high quality teakwood</span>
<button class="kn">&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>
<button class="procure"><i>&nbsp;&#10004;&nbsp;&nbsp;Procure&nbsp;&nbsp;</i></button>
<button class="shortlist"><i>&nbsp;&#10710;&nbsp;&nbsp;shortlist&nbsp;&nbsp;</i></button>
<!--SLIDER ICON--><!--HOVER BUTTON ICON--><!--SLIDER ICON-->
</div>
</li>
</ul>

</article>
</div>


<!-- ///////////////////////////////////footer//////////////////////////////// -->


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
<script src=".\js\cboard.js"></script>
</body>
</html>

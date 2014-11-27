<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Compare Reads</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    		<title>Google  Web Search API </title>
    		<script src="https://www.google.com/jsapi" type="text/javascript"></script>
    		<script language="Javascript" type="text/javascript">
   
  				google.load('search', '1');

   			    function OnLoad() {
      			
      			// Create a search control
     			   var searchControl = new google.search.SearchControl();

     		    // Add in a full set of searchers
     			   var localSearch = new google.search.LocalSearch();
     			   searchControl.addSearcher(new google.search.BookSearch());

     			// Set the Local Search center point
     			   localSearch.setCenterPoint("Dublin, DUB");

     			// tell the searcher to draw itself and tell it where to attach
      			   searchControl.draw(document.getElementById("searchcontrol"));

     			// execute an inital search
      			  //searchControl.execute("New Releases");
    			
    			}
    			   google.setOnLoadCallback(OnLoad);

    
    		</script>
    	

    <!-- <script type="text/javascript">
            function myCallback(result) {
              alert('nb of reviews for book: ' + result.reviews.length);
            }
            var scriptTag = document.createElement('script');
            scriptTag.src = "https://www.goodreads.com/book/isbn?callback=myCallback&format=json&isbn=0441172717&user_id=35702444";
            document.getElementsByTagName('head')[0].appendChild(scriptTag);
            </script>-->

<!--<script src="https://www.goodreads.com/jsapi" type="text/javascript"></script>
<script language="Javascript" type="text/javascript">

     var req = require('request');
	 var parseString = require('xml2js').parseString;

	 req.get('https://www.goodreads.com/book/title.xml?author=Arthur+Conan+Doyle&key=M5eRHkSwMkqNla3pMWlZA&title=Hound+of+the+Baskervilles', {
     form:{
           'key' : 'M5eRHkSwMkqNla3pMWlZA',
           'isbn' : ''
    	  }},

 	 function (error, response, body) {
  
  	//error handling goes here!
  	  parseString(body, function (err, result) {
    //error handling goes here, too!
   	  console.dir(result);
 
  });
});
 </script>-->

</head>
	<body>
		<nav class="navbar navbar-inverse" role="navigation" style="margin:0px;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-WDM-navbar-collapse-1">
       					 <span class="sr-only">Toggle navigation</span>
      					 <span class="icon-bar"></span>
      					 <span class="icon-bar"></span>
       					 <span class="icon-bar"></span>
      				</button>
				</div>

		<a class="navbar-brand" href="#">Compare Reads</a>
			<div class="collapse navbar-collapse navbar-right" id="bs-WDM-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="comparereads.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="comparereads.html">Contact</a></li>
			</div>
		</div>
	</nav>
		

<div class="jumbotron">
	<div class="container">
		<img src="images/books1.png" class="pull-left" style="margin:15px;" height=200px;>
 			<h2 style="color:#5D5F61;"class="no-margin">Compare Book Reviews</h2><br>
  				<p class="text-justify">Welcome to Compare Reads. </br> Use this web app to search book reviews of your choice from both Google 						
  					Books and Amazons Goodreads using book title or (ISBN) International Standard Book Number<p>
  				
  				<!--<footer class="text-right">Cloud Computing Assignment</footer>-->
                <!-- <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>-->
</div>
	</div>


<div class="table">
	<div class="container">
		<div class="row">

	<div class="col-sm-6 col-md-4 col-md-offset-1">
		<h3><img src="images/google-icon.png" class="pull-left" style="margin:0px;" height=40px;> Google Books</h3><br>


<div id="searchcontrol">

</div>
	</div>



<div class="col-sm-6 col-md-4 col-md-offset-1 col-sm-offset-1">
	<h3><img src="images/GoodReads-Icon.png" class="pull-left" style="margin:0px;" height=40px;></span> Goodreads</h3><br>

<div id="goodreads">
	<form method="post">
		<p>Author Name: </p><input type="text" name="author"></input></br>
		<p>Book Name: </p><input type="text" name="book"></input></br>
		<p>ISBN: </p><input type="text" name="isbn"></input></br>
		<br/>
		<input type="submit" value="search"/>
	</form>

	<?php

		$author = $_POST{'author'};
		$book = $_POST{'book'}; 
		$isbn = $_POST{'isbn'};

		$urllString = "https://www.goodreads.com/book/title.xml?key=M5eRHkSwMkqNla3pMWlZA&isbn={$isbn}";
		$urlString = "https://www.goodreads.com/book/title.xml?author{$author}=&key=M5eRHkSwMkqNla3pMWlZA&title={$book}";
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$mysongs = simplexml_load_file($urlString);
			$myisbn = simplexml_load_file($urllString);
			echo $myisbn ->book[0]->reviews_widget;
			echo $mysongs ->book[0]->reviews_widget;
			// echo $_POST{'author'};
			// echo $urlString;
		}
	?>

</div>
	</div>

		</div>
	</div>
</div>


<!-- <div id="isbnsearch">
<form method="post">
		<p>ISBN: </p><input type="text" name="isbn"></input></br>
		<br/>
		<input type="submit" value="search"/>
	</form>
<?php
	$isbn = $_POST{'isbn'};
	$urlString = "https://www.goodreads.com/book/title.xml?key=M5eRHkSwMkqNla3pMWlZA&isbn={$isbn}";
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$myisbn = simplexml_load_file($urlString);
		echo $myisbn ->book[0]->reviews_widget;
	}
?>
</div> -->


<!-- Start of the footer -->

<footer class="site-footer">
	<div class="container">
		<div class="row">
			<ol class="footersign">
			<p>Jack Healy</p>
			<p>x11459018<p/>
			</ol>
		</div>

			<div class="bottom-footer">
				<div class="col-md-5">Cloud Computing 2014</div>
					<div class="col-md-7">
						<ul class="footer-nav">
							<li><a href="index.html">Home</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>	
					</div>
</footer>

<!-- End of the footer -->


<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>
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
					<li><a href="https://mysterious-gorge-2836.herokuapp.com/">Home</a></li>
						<li><a href="http://books.google.ie/">G-Books</a></li>
							<li><a href="https://www.goodreads.com">Goodreads</a></li>
			</div>
		</div>
	</nav>
		

<div class="jumbotron">
	<div class="container">
		<img src="images/books1.png" class="pull-left" style="margin:15px;" height=200px;>
 			<h2 style="color:#5D5F61;"class="no-margin">Welcome to CompareReads. </h2>
  				<p class="text-justify"></br> Use this web app to search book reviews of your choice from both Google 						
  					Books and Amazons Goodreads using book title or (ISBN) International Standard Book Number<p>
  				
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
		<br/>
		<input type="submit" value="search"/>
	</br>
	</br>
	</form>

	<?php

		$author = $_POST{'author'};
		$book = $_POST{'book'}; 

		$urlString = "https://www.goodreads.com/book/title.xml?author{$author}=&key=M5eRHkSwMkqNla3pMWlZA&title={$book}";
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$mybooks = simplexml_load_file($urlString);
			echo $mybooks ->book[0]->reviews_widget;

		}
	?>

		<form method="post">
		<p>ISBN: </p><input type="text" name="isbn"></input></br>
		<br/>
		<input type="submit" value="search"/>
		</form>

	<?php
		
		$isbn = $_POST{'isbn'};
		if (is_null($isbn) == false){

		$urllString = "https://www.goodreads.com/book/title.xml?key=M5eRHkSwMkqNla3pMWlZA&isbn={$isbn}";
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$myisbn = simplexml_load_file($urllString);
			echo $myisbn ->book[0]->reviews_widget;
		}
	}
	?>

</div>

	</div>

		</div>
	</div>

</div>
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
							<li><a href="https://mysterious-gorge-2836.herokuapp.com/">Home</a></li>
							<li><a href="http://books.google.ie/">G-Books</a></li>
							<li><a href="https://www.goodreads.com">Goodreads</a></li>
						</ul>	
					</div>
</footer>


<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	</body>
</html>
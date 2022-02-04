<?php

session_start();

if(!isset($_SESSION['username'])){
echo "you are logged out";
	header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php  include 'css/style.php' ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</style>
<body>
<header>
	<nav class="navbar">
		<div class="logo"> 
			<a>Search any movie</a>
		</div>

		<div class="menu">
			<ul>
				<li><a href="#" class="active"> home </a></li>
				<li><a href="#" > Playlist </a></li>
				<li><a href="#" > about </a></li>
			</ul>
		</div>

		<div class="contact_btn">
			<a href="logout.php">Logout</a>
		</div>
	</nav>

	<div class="center_content">
		<div class="container">
         <h1 class="text-center mt-5">Movie Info Application</h1>
         <form id="movieform" autocomplete="off">
             <div class="form-group">
                <label for="Movie"> Movie Name</label>
                 <input class="form-control" type="text" id="movie" placeholder="Movie">
             </div>
             <div class="form-group">
                 <button class="btn btn-danger btn-block">
                     Search Movie
                 </button>
             </div>
         </form>
         <div id="result"></div>
     </div>
	</div>

	
		
		</div>
	</div>

	<div class="grid_sec">
		<img src="images/grid.png">
	</div>

</header>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        var apikey ="f247e07a"
        

        $("#movieForm").submit(function(event){
        event.preventDefault()

         var movie =$("#movie").val()

         var result =""

        var url="http://www.omdbapi.com/?apikey="+apikey

        $.ajax({
            method:'GET',
            url:url+"&t="+movie,
            success:function(data){
                console.log(data)

                result =`
                
            <img  style="flaot:left" class="img-thumbnail" width= "200" height="200" src="${data.Poster}"/>
            <h2> ${data.Title}</h2>

                `
                $("#result").html(result)
            }
        })
    })

})
</script>

</html>
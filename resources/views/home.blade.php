
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta property="og:title" content="Welcome to UTF"></meta>
 		
		<meta property="og:description" content="" /> 
		
		<title>UFT | welcome</title> 

		<link rel="canonical" href="https://blog.gitea.io/2016/12/welcome-to-gitea/">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://blog.gitea.io/styles/main.css">

		<link rel="shortcut icon" type="image/x-icon" href="https://blog.gitea.io/images/favicon.png">
		<link rel="icon" type="image/x-icon" href="https://blog.gitea.io/images/favicon.png">
		<style>
		 	body{background-color:wheat;}
		 	#headline{font-size:30px; font-weight:400;  margin-bottom:60px; color:gray;}
		 	a{text-decoration:none; }
		 	.navbar-logo{position:absolute; left:5%; top:4px; border:1px solid white; box-shadow:5px 5px 15px black; z-index:10; 
		 		border-radius:50%; background:gray; font-weight:800; padding:20px; font-size:40px; font-color:black;} 
		 	#navMenu{position:relative; width:98%; padding:0px;  
		 		background:palegreen; z-index:5; border-top:6px solid mediumseagreen; color:black; font-weight:600;}
		 	#navMenu div{background:mediumseagreen; padding:10px; margin-top:10px; color:blue;}
		 	#navMenu div:hover{background:seagreen; color:white;}
		 	#add-more-container{z-index:7; background:wheat; border-radius:5px; padding:4px; color:gray;}
		 	#add-more-container:hover{border:2px solid gray; color:white}
		 	#add-more-button{font-size:40px; color:gray; }
		 	#recomendr_div{position:absolute; left:2%; top:280px; width:16%; }
		 	#recomendr_div table{border-top:1px solid skyblue;}
		 	table tr:nth-child(1){background:gray; }
		 	table tr:nth-child(odd){background:wheat;}
		 	table{background-color:palegreen;}
		 	td,th{padding:4px; } 
			section{margin-left:25%; margin-right:5%; background:palegreen;} 
			footer{background:mediumseagreen; position:absolute; top:95%; width:100%; text-align:center; z-index:7;}
			#sidebarr{position:absolute; z-index:1; background:palegreen; width:20%; height:500px; padding-top:100px; }
		</style>
 
	</head> 
	<body> 
			<nav class="navbar">
				<div class="container">
					<div class="navbar-logo"> <a href="/home">  UTF </a>  </div>  
					<div class="navbar-background" id="navbar-background"></div>
				</div>
			</nav>
			<div id="sidebarr">
				<div class="navbar-menu" id="navMenu">	 
					<a class="navbar-item" href="/home"><div>  Home </div> </a> 
					<a class="navbar-item" href="/donations"><div>  Donations </div></a> 
					<a class="navbar-item" href="/districts"><div>  Districts </div></a> 
					<a class="navbar-item" href="payments"> <div> Payments </div> </a> 
					<a class="navbar-item" href="/agents"><div>  Agents </div></a> 
					<a class="navbar-item" href="/members"><div>  Members </div> </a>   
				</div> 
			</div> 
			<center> <h2 id="headline"><b style="margin-left:20%">United Front for Transformation   </b></h2> </center> 
			 <center> <h2 id="headline"><b style="margin-left:20%"> Home </b></h2> </center> 

			<section class="section">
				<div class="container is-centered page">
					<div class="content">
						<h2>
							<a href="https://blog.gitea.io/2016/12/welcome-to-gitea/">
								<center>The United Front for Transformation (UFT) </center>
							</a>
						</h2>
						<p>
							<i>Thu Dec 8, 2016</i>
							by
							<b>
								<a href="#"> strk </a>
							</b>
						</p>

						<p>United Front for Transformation (UFT) is a new political party, which was recently formed and registered in Uganda. The party is currently using agents to enroll new members across the country. The party is currently using agents to enroll new members across the country.</p>

				<p>Whoever is enrolled by an agent, becomes a member of the party. An enrolled
				member may be upgraded to an agent by the system’s administrator via a web interface. An
				enrolled member may introduce new members to the party. An enrolled
				member may be upgraded to an agent by the system’s administrator via a web interface. An
				enrolled member may introduce new members to the party.</p>
				<p>Agent's benefits:</p>

				<blockquote>
				<p> Agents are paid a sum of money per month based on
				available funds. The main source of funds is well-wishers and this money is declared and
				registered into the web interface by the administrator </p>
				</blockquote>

			<p>UFT is located at plot 53638 Kampala street Uganda . Anyone can become a member of the party. Anyone can become a member of the party. Anyone can become a member of the party. Anyone can become a member of the party.</p>

			 
			<h4><b>We invite everyone to join the effort and help continue building the next generation of demacracy.</b></h4>

						<div id="discourse-comments"></div>

			<script type="text/javascript">
			DiscourseEmbed = {
				discourseUrl: "#",
				discourseEmbedUrl: "#"
			};

			(function() {
				var d = document.createElement("script"); d.type = "text/javascript"; d.async = true;
				d.src = DiscourseEmbed.discourseUrl + "javascripts/embed.js";
				(document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(d);
			})();
			</script>

					</div>
				</div>
			</section>

		

		<script>
            document.addEventListener('DOMContentLoaded', function () {

                
                var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

                
                if ($navbarBurgers.length > 0) {

                    
                    $navbarBurgers.forEach(function ($el) {
                        $el.addEventListener('click', function () {

                            
                            var target = $el.dataset.target;
                            var $target = document.getElementById(target);

                            
                            $el.classList.toggle('is-active');
                            $target.classList.toggle('is-active');


                            document.getElementById('navbar-background').classList.toggle('is-active');


                        });
                    });
                }

            });
		</script>



		<footer class="footer">
			<div class="container">
				<div class="content has-text-centered">
					<p>
						Copyright &copy; 2019 <a href="home">The UFT management</a>. All rights reserved. With <i class="fa fa-heart" aria-hidden="true"></i> and <a href="#">Determination</a>.
					</p>
					<p>
						 Headed by <a href="#">Groupx</a>, <a href="#">Year 1</a>, <a href="#">Makerere</a>, and all of our supporters .
					</p>
					<p>
						
						<a class="nav-link" href="http://localhost:8000" hreflang="en-us"></a>
						
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>



////////////////////////////////////////////////////////////////////
 


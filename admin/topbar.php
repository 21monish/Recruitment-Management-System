<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="navbar navbar-light fixed-top " style="padding:0; background-color: Black;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 col-sm-1 float-left" style="display: flex;">
  			<div class="logo">
  				<span class="fa fa-hands-helping"></span>
  			</div>
  		</div>
      <div class="col-md-4 col-sm-4 float-left text-white">
        <large><b>Hiring Harmany</b></large>
      </div>
	  	<div class="col-md-2 col-sm-3 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>
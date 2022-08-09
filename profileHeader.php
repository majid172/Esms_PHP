<nav class="navbar navbar-light bg-light fixed-top shadow">
		<a href="index.php" class="navbar-brand">ESMS</a>
	</nav>

	<!--sidebar-->
	<div class="container-fluid" style="margin-top: 20px;">
		<div class="row">
			<div class="col-sm-2 sidebar bg-dark">
				<div class="sidebar-sticky">
					<ul class="nav flex-column ">
						<li class="nav-item text-light"><a  href="userProfile.php" class="nav-link <?php if(PAGE=='userProfile'){ echo 'active';}?> mt-5 pt-5 text-light"><i class="far fa-user pr-2"></i>Profile</a></li>

						<li class="nav-item text-light"><a href="order.php" class="nav-link <?php if(PAGE=='order'){ echo 'active';}?> text-light pt-3"><i class="fas fa-upload pr-2"></i>Upload Order</a></li>

						<li class="nav-item text-light"><a href="#" class="nav-link text-light pt-3"><i class="fas fa-signal pr-2"></i>Service Status</a></li>

						<li class="nav-item text-light"><a href="logout.php" class="nav-link text-light pt-3"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a></li>
					</ul>
				</div>
			</div>



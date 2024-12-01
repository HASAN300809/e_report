


<header>
			<div class="container" >
				<div class="header-data">
					<div class="logo">
						<a href="index.html" title=""><img src="images/logo.png" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<h2 class="ml-3 text-white" style="margin-top: 10px;">Aplikasi Pengaduan Masyarakat</h2>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="index.php" title="">
									<span><img src="images/icon1.png" alt=""></span>
									Home
								</a>
							</li>
							<li>
								<a href="profil.php" title="">
									<span><img src="images/icon4.png" alt=""></span>
									Profile
								</a>
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					
					<div class="user-account">
						<div class="user-info">
						<?php
												
							include "../config.php";
							if (@$_SESSION["user"]) {
							$aktif = @$_SESSION["user"] ["kode"];
							$data = $koneksi->query("SELECT * FROM tb_user WHERE kode = '$aktif'");
							$tampil = $data->fetch_array();
							}else if (@$_SESSION["admin"]) {
							$aktif = @$_SESSION["admin"] ["kode"];
							$data = $koneksi->query("SELECT * FROM tb_admin WHERE kode = '$aktif'");
							$tampil = $data->fetch_array();
							}  
					   ?>

					   <?php
					 	  if (@$_SESSION["user"]) { 
							if ($tampil['foto'] != "") {
								echo "<img src='foto/profile/" . $tampil['foto'] . "' width='30' height='30' />";
							} else {
								echo "<img src='images/user.png' width='30' height='30' />";
							}
						 } 
					   ?>

							<a href="#" title="" class="user-name">
								<?php 				
									if (@$_SESSION["user"]) { 
									   echo $tampil["nama_user"]; 
									} else if (@$_SESSION["admin"]) { 
										echo $tampil["nama_admin"]; 
									} else { 
									   echo "Tidak ada";
									 }
								   
								?>
							</a>
							<i class="la la-sort-down"></i>
						</div>
						<div class="user-account-settingss">
							<h3>Online Status</h3>
							<ul class="on-off-status">
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
											<span></span>
										</label>
										<small>Online</small>
									</div>
								</li>
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c6">
										<label for="c6">
											<span></span>
										</label>
										<small>Offline</small>
									</div>
								</li>
							</ul>
							<h3>Custom Status</h3>
							<div class="search_form">
								<form>
									<input type="text" name="search">
									<button type="submit">Ok</button>
								</form>
							</div><!--search_form end-->
							<h3>Setting</h3>
							<ul class="us-links">
								<li><a href="profile-account-setting.html" title="">Account Setting</a></li>
								<li><a href="#" title="">Privacy</a></li>
								<li><a href="#" title="">Faqs</a></li>
								<li><a href="#" title="">Terms & Conditions</a></li>
							</ul>
							<h3 class="tc"><a href="../logout.php" title="">Logout</a></h3>
						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->
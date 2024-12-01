

<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<div class="usr-pic">
												<?php
					 								  if (@$_SESSION["user"]) { 
                                                        if ($tampil['foto'] != "") {
                                                            echo "<img src='foto/profile/" . $tampil['foto'] . "' width='110' height='110' />";
                                                        } else {
                                                            echo "<img src='images/user.png' width='110' height='110' />";
                                                        }
													 } 
					 							?>
													<!-- <img src="http://via.placeholder.com/100x100" alt=""> -->
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												
												<h3>
													<?php 
													
													 if (@$_SESSION["user"]) { 
													    echo $tampil["nama_user"]; 
													 } else if (@$_SESSION["admin"]) { 
												 		echo $tampil["nama_admin"]; 
													 } else { 
														echo "Tidak ada";
													  }
													
													?>
												</h3>

												<span>
													<?php 
														if (@$_SESSION["user"]) { 
													    	echo $tampil["pekerjaan"]; 
													 	} else if (@$_SESSION["admin"]) {} 
													 ?>
												</span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<?php
												$akun = @$_SESSION["user"]["kode"];
												$variable = $koneksi->query("SELECT * FROM tb_user_follow WHERE kode = '$akun'");
												$jumlah = $variable->num_rows;
											?>
											<li>
												<h4>Following</h4>
												<span><?php echo $jumlah; ?></span>
											</li>

											<?php
												$akun = @$_SESSION["user"]["kode"];
												$variable2 = $koneksi->query("SELECT * FROM tb_user_follow WHERE following = '$akun'");
												$jumlah2 = $variable2->num_rows;
											?>
											<li>
												<h4>Followers</h4>
												<span><?php echo $jumlah2; ?></span>
											</li>
											<li>
												<a href="../login.php" title="">View Profile</a>
											</li>
										</ul>
									</div><!--user-data end-->
								</div><!--main-left-sidebar end-->
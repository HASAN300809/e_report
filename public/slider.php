

<div class="top-profiles">
											<div class="pf-hd">
												<h3>Top Profiles</h3>
												<i class="la la-ellipsis-v"></i>
											</div>
											<div class="profiles-slider">

											<?php
												$query = $koneksi->query("SELECT * FROM tb_user");
												while ($user = $query->fetch_array()) {
													
													if ($user['kode' != @$_SESSION['user']['kode']]) {
														
													
											?>


												<div class="user-profy">
													<?php 
													if ($user['foto'] != "") {
                                                  	      echo "<img src='foto/profile/" . $user['foto'] . "' width='57' height='57' />";
                                                     	} else {
                                                       	 echo "<img src='images/user.png' width='57' height='57' />";
                                                    	} 
													?>
													<h3><?php echo $user["nama_user"]; ?></h3>
													<span>
													<?php 
														if ($user["pekerjaan"] != "") { 
													    	echo $user["pekerjaan"]; 
													 	} else {
															echo "---";
														} 
													 ?>
													</span>
													<ul>
                                                        <li><a href="#" title="" class="hire" >Message</a></li>
                                                        <?php 
    
                                                        $folLower = @$_SESSION['user']['kode'];
                                                        $following = $user['kode'];
    
                                                        $follow_conect = $koneksi->query("SELECT * FROM tb_user_follow WHERE kode = '$folLower' AND following = '$following'");
                                                        $follow_count = $follow_conect->num_rows;
    
    
    
                                                        ?>
                                                        <li>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $following; ?>">
    
                                                            <?php 
                                                            
                                                            if ($follow_count > 0) {
                                                            echo '<button><a href="unfollow.php?kode=' . $user['kode'] . ' " class="follow bg-secondary">Unfollow</a></button>';
                                                            
                                                            }else {
                                                                echo "<input type='submit' name='sub' value='Follow' class='follow bg-success px-2 py-1 border-0 rounded text-white' style='cursor:pointer;'>";
                                                            }
    
                                                            ?>
                                                        </form>
                                                        </li>
                                                    </ul>
												</div><!--user-profy end-->

												<?php
													$tz = 'Asia/Jakarta';
													$dt = new DateTime("now", new DateTimeZone($tz));
													$date = $dt->format('Y-m-d G:i:s'); //2024-01-01 10:30:00

													$id = @$_POST['id'] ?? "";
													$sub = @$_POST['sub'] ?? "";

													if ($sub) {
														$state = $koneksi->prepare("INSERT INTO tb_user_follow (kode, following, subscribe) VALUES ( ?, ?, ?)");
														$state->bind_param("sss", $folLower, $id, $date);


														if ($state->execute()) {
															echo "<script>location='index.php';</script>";
															exit();
														} 
													}
												?>


											<?php
													}
												}
											?>

											</div><!--profiles-slider end-->
										</div><!--top-profiles end-->
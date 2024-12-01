<?php

@session_start();

if (@$_SESSION['admin'] || @$_SESSION['user']) {

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Aplikasi Pengaduan Masyarakat</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>


<body>
	

	<div class="wrapper">
		
		<!-- header area start -->
		<?php include "header.php"; ?>
		<!-- header area end -->


		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <?php include "sidebar.php"; ?>
							</div>
							<div class="col-lg-9 col-md-8 no-pd">
								<div class="main-ws-sec">
									<?php
									 if (@$_SESSION["user"]) {
										$kode = @$_SESSION["user"] ["kode"];
										$data = $koneksi->query("SELECT * FROM tb_user WHERE kode = '$kode'");
										$tampil = $data->fetch_array();
                                        if ($tampil["pekerjaan"] != "" && $tampil["no_hp"] != "" && $tampil["foto"] != "" && $tampil["nama_user"] != "" ) {
                                            
                                        									
									?>

                                    <div class="post-section bg-white">

                                        <div class="post-bar">

                                            <div class="job_descp">
                                                <h3 class="mt-3">Profile Pengguna</h3>

                                                
                                                <?php
                                                $data2 = $koneksi->query("SELECT * FROM(tb_user LEFT JOIN tb_login ON tb_login.kode = tb_user.kode) 
                                                WHERE tb_login.kode = '$kode'");
                                                $tampil2 = $data2->fetch_array();
                                                ?>
                                            
                                                <table class="table table-striped">
                                                   <tr>
                                                        <td>Nama User</td>
                                                        <td>:</td>
                                                        <td><?php echo $tampil2["nama_user"]; ?></td>
                                                    </tr>
                                                   <tr>
                                                        <td>Kode</td>
                                                        <td>:</td>
                                                        <td><?php echo $tampil2["kode"]; ?></td>
                                                    </tr>
                                                   <tr>
                                                        <td>Username</td>
                                                        <td>:</td>
                                                        <td><?php echo $tampil2["username"]; ?></td>
                                                    </tr>
                                                   <tr>
                                                        <td>E-mail</td>
                                                        <td>:</td>
                                                        <td><?php echo $tampil2["email"]; ?></td>
                                                    </tr>
                                                   <tr>
                                                        <td>Pekerjaan</td>
                                                        <td>:</td>
                                                        <td><?php echo $tampil2["pekerjaan"]; ?></td>
                                                    </tr>
                                                   <tr>
                                                        <td>No HP</td>
                                                        <td>:</td>
                                                        <td><?php echo $tampil2["no_hp"]; ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

									<?php
									} else {
									
									?>

                                    <div class="post-section">
                                    	<div class="post-bar">
											<div class="post_topbar">
											</div>
											<div class="job_descp">
												<h3>UPDATE PROFILE</h3>

                                                <?php
                                                $update = $koneksi->query("SELECT * FROM tb_user WHERE kode = '$kode'");
                                                $hasil = $update->fetch_array();

                                                ?>
												
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="kode" value="<?php echo $hasil['kode']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" value="<?php echo $hasil['nama_user']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $hasil['pekerjaan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $hasil['email']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="no_hp" placeholder="Nomor Handphone" value="<?php echo $hasil['no_hp']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="file" name="foto" placeholder="Foto" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" name="tombol" value="update profile">
                                                    </div>
                                                </form>

                                                <?php
                                                
                                                $nama_user = @$_POST['nama_user'];
                                                $pekerjaan = @$_POST['pekerjaan'];
                                                $email = @$_POST['email'];
                                                $no_hp = @$_POST['no_hp'];

                                                $foto = @$_FILES['foto']['name'];
                                                $asalfoto = @$_FILES['foto']['tmp_name'];

                                                $directory = "foto/profile/";
                                                $tombol = @$_POST['tombol'];

                                                if ($tombol) {
                                                    if ($foto == "" || $pekerjaan == "" || $email == "" || $no_hp == "" || $foto == "") {
                                                        echo "<script>alert('Data Tidak Boleh Kosong')</script>";
                                                    } else{
                                                        move_uploaded_file($asalfoto, $directory.$foto);
                                                        $update = $koneksi->query("UPDATE tb_user SET 
                                                        nama_user = '$nama_user', pekerjaan = '$pekerjaan', email = '$email',
                                                         no_hp = '$no_hp', foto = '$foto' WHERE kode = '$kode'");

                                                        if ($update) {
                                                            echo "<script>alert('Data Berhasil Diupdate')</script>";
                                                        } else{
                                                            echo "<script>alert('Data Gagal Diupdate')</script>";
                                                        }
                                                    }
                                                }

                                                ?>

											</div>
										</div><!--post-bar end-->
                                    </div><!--posts-section end-->
									<?php
									  }

									}
									?>
									


									
								</div><!--main-ws-sec end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>




	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>


<?php

} else {

    echo "<script>location='login.php';</script>";
}

?>
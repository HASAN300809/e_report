


<div class="post-popup job_post">
            <div class="post-project">
                <h3>Tuliskan laporan Anda</h3>
                <div class="post-project-fields">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="user" value="<?php echo $tampil['id_user'] ?>">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <input type="file" name="gambar">
                            </div>
                                <div class="col-lg-12">
                                    <ul>
                                    <li><button class="active" type="submit" name="post" value="post">Post</button></li>
                                    <li><a href="index.php" title="">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                        <?php 
                        
                          include '../config.php';

                        // Ambil data dari form
                          $user = @$_POST['user'];
                          $judul = @$_POST['title'];
                          $deskripsi = @$_POST['description'];
                          $posting = @$_POST['post'];

                          $tz = 'Asia/Jakarta';
                          $dt = new DateTime("now", new DateTimeZone($tz));
                          $date = $dt->format('Y-m-d G:i:s'); //2024-01-01 10:30:00

                          $gambar = @$_FILES['gambar']['name'];
                          $asalGambar = @$_FILES['gambar']['tmp_name'];

                          $simpanGambar = "foto/";

                          if ($posting) {
                              
                            move_uploaded_file($asalGambar, $simpanGambar.$gambar);

                            // Gunakan prepared statement untuk menyimpan data ke database
                            $stmt = $koneksi->prepare("INSERT INTO tb_pengaduan (id_user, judul_pengaduan, isi_pengaduan, gambar_pengaduan, tgl_pengaduan)
                            VALUES (?, ?, ?, ?, ?)");
                            $stmt->bind_param("sssss", $user, $judul, $deskripsi, $gambar, $date);

                            // Eksekusi dan cek apakah berhasil
                            if ($stmt->execute()) {
                                echo "<script>alert('Data berhasil disimpan!'); location='index.php'</script>";
                            } else {
                                echo "Error saat menyimpan data: " . $stmt->error;
                            }

                            // Tutup statement
                            $stmt->close();
                          }

                        ?>

                </div><!--post-project-fields end-->
                <a href="#" title=""><i class="la la-times-circle-o"></i></a>
            </div><!--post-project end-->
        </div><!--post-project-popup end-->
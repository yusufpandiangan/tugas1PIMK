<?php
include "layout/header.php"
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-15 col-lg-9">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar akun</h6>
                                
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <?php
                                        //memerikasa apakah nilai halaman dikirimkan
                                        if(isset($_GET['halaman']) && $_GET['halaman'] !=""){
                                            $halaman = $_GET['halaman'];
                                        }else {
                                            $halaman =1;
                                        }

                                        //jumlah data yang ditampilkan dalam 1 halaman
                                        $limit = 5;
                                        if($halaman>1){
                                            $offset = ($halaman *$limit)- $limit;
                                        }else $offset = 0;
                                        $sebelum = $halaman -1; //tombol sebelum
                                        $sesudah = $halaman + 1; //tombol selanjutnya

                                        $query = "SELECT * FROM akun WHERE level=2";
                                        $result = mysqli_query($koneksi, $query);
                                        $jlh_data = mysqli_num_rows($result); //menghitung jumlah data

                                        //menghitung jumlah halaman 
                                        $jlh_halaman = ceil($jlh_data / $limit);
                                        $hal_akhir = $jlh_halaman;

                                        //tampilkan data
                                        $query2 = "SELECT * FROM akun WHERE level=2 LIMIT $offset,$limit";
                                        $result2 = mysqli_query($koneksi, $query2);
                                    ?><!--selesai buat halaman-->
                                    
                                    <?php
                                    //2 baris dibawah aku kurang ngerti maksudnya
                                    $query = "SELECT * FROM akun";
                                    $hasil = mysqli_query($koneksi,$query);
                                    echo "<table class = 'table table-borderd'>";
                                    echo "<tr><th>id</th><th>Username</th><th>Password<?th><th>Nama</th><th>Email</th><th>level</th></tr>";
                                    foreach($hasil as $data){
                                        echo "<tr>";
                                        echo "<td>$data[id]";
                                        echo "<td>$data[username]";
                                        echo "<td>$data[password]";
                                        echo "<td>$data[nama]";
                                        echo "<td>$data[email]";
                                        echo "<td> $data[level]";
                                        //disini akan disisipkan button update dan delete
                                       //tombol update
                                       echo "<td> <form method='POST' action='ubah.php'>
                                       <input hidden type='text' name='id' value=".$data['id'].">
                                       <button type='submit' name='btnUpdate' class='btn btn-success'>
                                       Update</button></form></td>";
                                   
                                       //tombol delete
                                       echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\"method='POST';>";
                                       echo "<input hidden name='id' type='text' value=".$data['id'].">";
                                       echo "<button type='submit' name='btnHapus' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>";
                                       echo "</form></td>";
                                       echo "<tr>";

                                        echo"</tr>";

                                    }
                                    echo "</table>";
                                    ?>

                                   

                                    <?php
                                        if(isset($_POST['btnHapus'])){
                                            $id =$_POST['id'];

                                            if($koneksi){
                                            $sql="DELETE FROM akun WHERE id=$id";
                                            mysqli_query($koneksi,$sql);
                                            echo "<p class='alert alert-succes text-center'><b> Data Akun Berhasil dihapus.</b></p>";
                                            }elseif ($koneksi->connect_error){
                                                echo "<p class='alert alert-danger text-center><b>Data Gagal Dihapus. Terjadi Kesalahan: ". $koneksi->connect_error."</b></p>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include "layout/footer.php"
?>
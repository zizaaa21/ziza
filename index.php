<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mycss.css">
    <title>Aplikasi beasiswa</title>
</head>

<body>

    <?php
    include_once("connection.php");
    $result = mysqli_query($conn, "SELECT * FROM pendaftar");

    if (isset($_GET['link_page'])) {
        $link_page = $_GET['link_page'];
    } else {
        $link_page = 1;
    }

    if (isset($_GET['jenis_beasiswa'])) {
        $jenis_beasiswa = $_GET['jenis_beasiswa'];
    } else {
        $jenis_beasiswa = "akademik";
    }


    function SetLinkPage($actual_link, $reference_link)
    {
        $result = "";
        if ($actual_link == $reference_link) {
            $result = "active";
        }
        return $result;
    }

    function SetContentPage($actual_content, $reference_content)
    {
        $result = "";
        if ($actual_content == $reference_content) {
            $result = "show active";
        }
        return $result;
    }


    function SetBeasiswa($actual_beasiswa, $reference_beasiswa)
    {
        $result = "";
        if ($actual_beasiswa == $reference_beasiswa) {
            $result = "selected";
        }
        return $result;
    }




    function generateRandomFloat(float $minValue, float $maxValue): float
    {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }
    function SetDisable($ipk)
    {
        $result = "";
        if ($ipk < 3) {
            $result = "disabled";
        } 
        return $result;
    }
    ?>

    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: skyblue;">
            <a class="navbar-brand" href="#">Pendaftaran Beasiswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link <?php echo SetLinkPage("1", $link_page) ?> " id="nav-home-tab" data-toggle="tab" href="#beasiswa" role="tab" aria-controls="nav-home" aria-selected="true">Pilihan Beasiswa</a>
                <a class="nav-item nav-link <?php echo SetLinkPage("2", $link_page) ?>" id="nav-profile-tab" data-toggle="tab" href="#daftar" role="tab" aria-controls="nav-profile" aria-selected="false">Daftar</a>
                <a class="nav-item nav-link <?php echo SetLinkPage("3", $link_page) ?>" id="nav-contact-tab" data-toggle="tab" href="#hasil" role="tab" aria-controls="nav-contact" aria-selected="false">Hasil</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?php echo SetContentPage("1", $link_page) ?>" id="beasiswa" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="section-menu">
                    <h4>Jenis Beasiswa</h4>
                    <p>Beasiswa merupakan bantuan atau program yang diberikan oleh lembaga, institusi, atau pemerintah untuk membantu mahasiswa atau calon mahasiswa dalam membayar biaya pendidikan atau mendukung kebutuhan lainnya selama proses pembelajaran. Hal ini dilakukan untuk meningkatkan kualitas pendidikan, mempromosikan pengabdian kepada masyarakat, dan meningkatkan kemampuan individu dalam membangun karier. Beasiswa dapat berupa bantuan dari segi uang, fasilitas kampus, atau bantuan khusus lainnya yang disesuaikan dengan kebutuhan calon mahasiswa.</p>
                    <ol>
                        <li>
                            <h5>Beasiswa Akademik</h5>
                            <p>Beasiswa akademik adalah jenis beasiswa yang diberikan oleh lembaga pendidikan atau institusi untuk mendukung kualitas pendidikan dan membantu mahasiswa atau calon mahasiswa dalam memenuhi kebutuhan pendidikan mereka. Beasiswa akademik dapat berupa bantuan uang, kuliah bebas, atau fasilitas kampus lainnya.</p>
                            <p>Adapun persyaratan yang dibutuhkan adalah:</p>
                            <ul>
                                <li>
                                    <p>Warga Negara Indonesia</p>
                                </li>
                                <li>
                                    <p>IPK minimal 3.0</p>
                                </li>
                                <li>
                                    <p>Minat dan pengalaman dalam bidang studi yang akan diambil</p>
                                </li>
                                <li>
                                    <p>Nilai akademik</p>
                                </li>
                            </ul>
                            <p>untuk informasi selengkapnya silahkan klik tombol dibawah ini:</p>
                            <a class="btn btn-info btn-sm my-sm-btn" style="background-color:skyblue;" href="index.php?link_page=2&jenis_beasiswa=akademik">Daftar Sekarang</a>
                        </li>
                        <li>
                            <h5>Beasiswa Non Akademik</h5>
                            <p>easiswa non akademik adalah jenis beasiswa yang tidak terkait langsung dengan aspek pendidikan atau kualifikasi akademik, namun meliputi bidang lain seperti kebudayaan, olahraga, penelitian, dan kegiatan sosial. Beasiswa non akademik bertujuan untuk mendukung pengembangan kemampuan, pengabdian kepada masyarakat, dan meningkatkan kualitas hidup calon beasiswa.</p>
                            <p>Adapun persyaratan yang dibutuhkan adalah:</p>
                            <ul>
                                <li>
                                    <p>Warga Negara Indonesia</p>
                                </li>
                                <li>
                                    <p>memiliki sertifikat yang membuktikan prestasi non akademik tingkat internasional dan/atau nasional</p>
                                </li>
                                <li>
                                    <p>Prestasi dalam bidang yang terkait</p>
                                </li>
                            </ul>
                            <p>untuk informasi selengkapnya silahkan klik tombol dibawah ini:</p>
                            <a class="btn btn-info btn-sm my-sm-btn" style="background-color:skyblue;" href="index.php?link_page=2&jenis_beasiswa=non_akademik">Daftar Sekarang</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="tab-pane fade <?php echo SetContentPage("2", $link_page) ?>" id="daftar" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="section-menu">
                    <h4>Form Pendaftaran</h4>
                    <form action="add_pendaftar.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Masukan Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Masukan Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="Email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-2 col-form-label">nomor HP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="hp" placeholder="no_hp" name="hp" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semester" class="col-sm-2 col-form-label">Semester saat ini</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="semester" id="semester" required>
                                    <?php
                                    for ($i = 1; $i <= 8; $i++) {
                                    ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $minValue = 2.9;
                        $maxValue = 3.4;
                        $ipk = round(generateRandomFloat($minValue, $maxValue), 1);

                        ?>
                        <div class="form-group row">
                            <label for="ipk" class="col-sm-2 col-form-label">IPK terakhir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ipk" name="ipk" value="<?php echo $ipk ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="beasiswa" class="col-sm-2 col-form-label">Pilihan Beasiswa</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="beasiswa" id="beasiswa" required <?php echo SetDisable($ipk) ?>>
                                    <option value="akademik" <?php echo SetBeasiswa("akademik", $jenis_beasiswa) ?>>Akademik</option>
                                    <option value="non_akademik" <?php echo SetBeasiswa("non_akademik", $jenis_beasiswa) ?>>Non Akademik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="upload_file">Choose file</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="customFile" name="berkas" required <?php echo SetDisable($ipk) ?>>
                            </div>
                        </div>
                        <input class="btn btn-info btn-sm" style="background-color:skyblue;" type="submit" value="Daftar" <?php echo SetDisable($ipk) ?>>
                        <a class="btn btn-warning btn-sm" style="background-color:lightblue" href="index.php?link_page=2">Batal</a>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade <?php echo SetContentPage("3", $link_page) ?>" id="hasil" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="section-menu">
                    <h4>List Pendaftar</h4>

                    <?php
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
                        <div class="row grid-item">
                            <div class="col-md-3 col-lg-4">
                                <img class="img-fluid" src="uploads/<?php echo $user_data['berkas']; ?>" alt="">
                            </div>
                            <div class="col-md-9 col-lg-8">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>Nama:</h4>
                                        <h5><?php echo $user_data['nama']; ?></h5>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>Email:</h4>
                                        <h5><?php echo $user_data['email']; ?></h5>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>Handphone:</h4>
                                        <h5><?php echo $user_data['hp']; ?></h5>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>Semester:</h4>
                                        <h5><?php echo $user_data['semester']; ?></h5>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>IPK:</h4>
                                        <h5><?php echo $user_data['ipk']; ?></h5>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>Beasiswa:</h4>
                                        <h5><?php echo $user_data['beasiswa']; ?></h5>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <h4>Status:</h4>
                                        <h5><?php echo $user_data['status']; ?></h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer -->
<footer class="page-footer font-small blue">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2024 Copyright:
  <a href="index.php"> AzizahUkk</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
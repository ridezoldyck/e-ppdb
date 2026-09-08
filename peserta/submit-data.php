<script type="text/javascript" src="../files/bower_components/sweetalert1/sweetalert.min.js"></script>
<?php 

    session_start();
    error_reporting(0);
    require_once '../auth/config.php';
    require_once '../auth/peserta/sessionPeserta.php';
    require_once '../src/dashboardFiles/countData.php';
    require_once '../src/dashboardFiles/navMoreScript.php';

    $sessionKodePendaftar = $_SESSION['kode_pendaftar'];
    $queryGetStatus = mysqli_query($link, "SELECT kode_pendaftar FROM data_pendaftar WHERE kode_pendaftar = '$sessionKodePendaftar'");
    $getArrayStatus = mysqli_fetch_array($queryGetStatus);

//     if (isset($_POST['submit']) === true) {
    
//     include '../src/dashboardFiles/formVariabel.php';

//     // Saved Data To Database
//     $query = mysqli_query($link, "INSERT INTO data_pendaftar (id_pendaftar, kode_pendaftar, nama_lengkap,  jenis_kelamin, tempat_lahir, tanggal_lahir, agama, nik, no_telp, email) VALUES ('', '$kode_pendaftar', '$nama_lengkap_siswa', '$jenis_kelamin_siswa', '$tempat_lahir_siswa', '$tanggal_lahir', '$agama', '$nik', '$no_telp_siswa', '$email_siswa')");

//     $lastId = mysqli_insert_id($link);

//     $query .= mysqli_query($link, "INSERT INTO data_alamat (id, id_siswa, alamat) VALUES('', '$lastId', '$alamat_siswa')");

//     $query .= mysqli_query($link, "INSERT INTO data_asal_sekolah (id, id_siswa, nama_sekolah, status_sekolah, tahun_lulus, alamat_sekolah) VALUES ('', '$lastId', '$asal_sekolah', '$status_sekolah', '$tahun_lulus', '$alamat_sekolah')");

//     $query .= mysqli_query($link, "INSERT INTO data_jurusan (id, id_siswa, jurusan1) VALUES ('', '$lastId', '$jurusan1')");  

//     $query .= mysqli_query($link, "INSERT INTO status_pendaftaran (id, id_siswa, status) VALUES ('', '$lastId', '$status')");



//     if (mysqli_multi_query($link, $query) === 1) {
        
//         echo "<script type='text/javascript'>
//             setTimeout(function () {  
//                 swal({
//                     icon: 'error',
//                     closeOnClickOutside: false,
//                     closeOnEsc: false,
//                     dangerMode: true,
//                     className: 'red-bg',
//                     buttons: false,
//                     title: 'Error',
//                     text:  'Periksa kembali data-data yang anda masukkan',
//                     type: 'error',
//                     timer: 4000,
//                     showConfirmButton: false
//                     });  
//                     },10); 
//                     window.setTimeout(function(){ 
//                      window.location.replace('index');
//                      } ,4000); 
//             </script>";
//     }else{
//         echo "<script type='text/javascript'>
//             setTimeout(function () {  
//                 swal({
//                     icon: 'success',
//                     closeOnClickOutside: false,
//                     closeOnEsc: false,
//                     dangerMode: true,
//                     className: 'red-bg',
//                     title: 'Berhasil',
//                     text:  'Data anda berhasil dikirim ',
//                     type: 'success',
//                     timer: 5000,
//                     showConfirmButton: false
//                     });  
//                     },10); 
//                     window.setTimeout(function(){ 
//                      window.location.replace('index');
//                      } ,5000); 
//              </script>";
//     }

// }
if (isset($_POST['submit']) === true) {

    include '../src/dashboardFiles/formVariabel.php';

    // Insert Data into Database
    $query1 = mysqli_query($link, "INSERT INTO data_pendaftar (id_pendaftar, kode_pendaftar, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, nik, no_telp, email) VALUES ('', '$kode_pendaftar', '$nama_lengkap_siswa', '$jenis_kelamin_siswa', '$tempat_lahir_siswa', '$tanggal_lahir', '$agama', '$nik', '$no_telp_siswa', '$email_siswa')");
    
    if (!$query1) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Periksa kembali data-data yang anda masukkan',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index');
                } ,4000); 
            </script>";
        exit;
    }

    // Get last inserted ID
    $lastId = mysqli_insert_id($link);

    // Insert Data into other tables
    $query2 = mysqli_query($link, "INSERT INTO data_alamat (id, id_siswa, alamat) VALUES('', '$lastId', '$alamat_siswa')");
    if (!$query2) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Periksa kembali data-data yang anda masukkan',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index');
                } ,4000); 
            </script>";
        exit;
    }

    // Repeat for other queries
    $query3 = mysqli_query($link, "INSERT INTO data_asal_sekolah (id, id_siswa, nama_sekolah, status_sekolah, tahun_lulus, alamat_sekolah) VALUES ('', '$lastId', '$asal_sekolah', '$status_sekolah', '$tahun_lulus', '$alamat_sekolah')");
    if (!$query3) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Periksa kembali data-data yang anda masukkan',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index');
                } ,4000); 
            </script>";
        exit;
    }

    $query4 = mysqli_query($link, "INSERT INTO data_jurusan (id, id_siswa, jurusan1) VALUES ('', '$lastId', '$jurusan1')");
    if (!$query4) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Periksa kembali data-data yang anda masukkan',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index');
                } ,4000); 
            </script>";
        exit;
    }

    $query5 = mysqli_query($link, "INSERT INTO status_pendaftaran (id, id_siswa, status) VALUES ('', '$lastId', '$status')");
    if (!$query5) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Periksa kembali data-data yang anda masukkan',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index');
                } ,4000); 
            </script>";
        exit;
    }   
    $query6 = mysqli_query($link, "INSERT INTO berkas (id, id_siswa, kk, akta_kelahiran, ijazah, foto) VALUES ('', '$lastId', '$foto_kk', '$foto_akta_kelahiran', '$foto_ijazah', '$foto_seragam')");
    if (!$query6) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Error',
                    text:  'Periksa kembali data-data yang anda masukkan',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index');
                } ,4000); 
            </script>";
        exit;    
    }

    // Success message
    echo "<script type='text/javascript'>
        setTimeout(function () {  
            swal({
                icon: 'success',
                closeOnClickOutside: false,
                closeOnEsc: false,
                dangerMode: true,
                className: 'red-bg',
                title: 'Berhasil',
                text:  'Data anda berhasil dikirim ',
                type: 'success',
                timer: 5000,
                showConfirmButton: false
            });  
            },10); 
            window.setTimeout(function(){ 
                window.location.replace('index');
            } ,5000); 
        </script>";
}


// Jika ada sudah ada
if ($getArrayStatus !== null) {
    $getAllField = mysqli_query($link, "SELECT * FROM data_pendaftar
    JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar=data_asal_sekolah.id_siswa
    JOIN status_pendaftaran ON data_pendaftar.id_pendaftar=status_pendaftaran.id_siswa
    JOIN data_alamat ON data_pendaftar.id_pendaftar = data_alamat.id_siswa
    JOIN data_jurusan ON data_pendaftar.id_pendaftar = data_jurusan.id_siswa
    JOIN berkas ON data_pendaftar.id_pendaftar = berkas.id_siswa 
    WHERE kode_pendaftar = '$sessionKodePendaftar'");

    $rows = mysqli_fetch_array($getAllField);
    
}

if (isset($_POST['update']) === true) {
    include '../src/dashboardFiles/formVariabel.php';

    $id = $_SESSION['id_pendaftar'];

    $queryUpdate = mysqli_query($link, "UPDATE data_pendaftar SET
    nama_lengkap = '$nama_lengkap_siswa',
    jenis_kelamin = '$jenis_kelamin_siswa',
    tempat_lahir = '$tempat_lahir_siswa',
    tanggal_lahir = '$tanggal_lahir',
    agama = '$agama',
    nik = '$nik',
    no_telp = '$no_telp_siswa',
    email = '$email_siswa'
    WHERE id_pendaftar = '$id'");
    
    $queryUpdate2 = mysqli_query($link, "UPDATE data_alamat SET
    alamat = '$alamat_siswa' WHERE id_siswa = '$id'");

    $queryUpdate3 = mysqli_query($link, "UPDATE data_asal_sekolah SET
    nama_sekolah = '$asal_sekolah', status_sekolah = '$status_sekolah',
    tahun_lulus = '$tahun_lulus', alamat_sekolah = '$alamat_sekolah' WHERE id_siswa = '$id'");

    $queryUpdate4 = mysqli_query($link, "UPDATE status_pendaftaran SET 
    status = '$status' WHERE id_siswa = '$id'");

    $queryUpdate5 = mysqli_query($link, "UPDATE data_jurusan SET
     jurusan1 = '$jurusan1' WHERE id_siswa = '$id'");

    $queryUpdate6 = mysqli_query($link, "UPDATE berkas SET
    kk = '$foto_kk', akta_kelahiran = '$foto_akta_kelahiran',
    ijazah = '$foto_ijazah', foto = '$foto_seragam' WHERE id_siswa = '$id'");
    

// Lakukan ini untuk semua query

    if (mysqli_affected_rows($link) > 0) {
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    title: 'Berhasil',
                    text:  'Data anda berhasil di update',
                    type: 'success',
                    timer: 5000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('submit-data');
                     } ,5000); 
             </script>";
    }
    else{
        echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    title: 'Berhasil',
                    text:  'Data anda berhasil di update',
                    type: 'error',
                    timer: 5000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('submit-data');
                     } ,5000); 
             </script>";
             if (!$queryUpdate) {
                die("Error pada queryUpdate: " . mysqli_error($link));
            }
            if (!$queryUpdate2) {
                die("Error pada queryUpdate2: " . mysqli_error($link));
            }
            if (!$queryUpdate3) {
                die("Error pada queryUpdate2: " . mysqli_error($link));
            }
            if (!$queryUpdate4) {
                die("Error pada queryUpdate2: " . mysqli_error($link));
            }
            if (!$queryUpdate5) {
                die("Error pada queryUpdate2: " . mysqli_error($link));
            }
            if (!$queryUpdate6) {
                die("Error pada queryUpdate2: " . mysqli_error($link));
            }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard Peserta - Submit Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../alikhwan.jpg" />
    <!-- Google font-->
    <link href="http://fonts.googleapis.com/css?family=Quicksand:400,700%7CPT+Serif:400,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\assets\pages\advance-elements\css\bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="../files\bower_components\bootstrap-daterangepicker\css\daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../files\bower_components\datedropper\css\datedropper.min.css">
    <link rel="stylesheet" type="text/css" href="../files\bower_components\spectrum\css\spectrum.css">
    <link rel="stylesheet" type="text/css" href="../files\bower_components\jquery-minicolors\css\jquery.minicolors.css">

     <!-- Toastr -->
     <link rel="stylesheet" type="text/css" href="..\files\bower_components\toastr\toastr.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <style rel="stylesheet" type="text/css">
        *{
            font-family: quicksand;
        }
</style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="/">
                            <h6>PPDB - Peserta</h6>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">1</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="../alikhwan.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Super Admin</h5>
                                                    <p class="notification-msg">Selamat datang di dashboard PPDB <?= $_SESSION['username'] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="..\files\assets\images\user-profile\admin.png" class="img-radius">
                                        <span><?= $_SESSION['username']; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#settingsModal">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#profileModal">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                               <a href="logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="index">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="submit-data">
                                        <span class="pcoded-micon"><i class="feather icon-upload"></i></span>
                                        <span class="pcoded-mtext">Submit Data</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <div class="pcoded-navigatio-lavel">More</div>
                            <div class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#settingsModal">
                                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                        <span class="pcoded-mtext">Akun Setting</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#profileModal">
                                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                        <span class="pcoded-mtext">Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="logout">
                                        <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                        <span class="pcoded-mtext">Logout</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="card p-20 z-depth-4 waves-effect" data-toggle="tooltip" data-placement="top" title="Form Pendaftaran" style="box-shadow: 7px 7px 20px">
                                        <div class="card-header">
                                            <h5>Form Data Diri Calon Pendaftar</h5>
                                            <span>Hallo, anda bisa mendaftarkan diri lewat form ini sekarang juga.. yuk buruan daftar</span>
                                        </div>
                                        <div class="card-body" style="margin-top: -30px;">
                                            <form method="post" action="" enctype="multipart/form-data" class="dataForm">
                                                <div class="card-block accordion-block color-accordion-block">
                                                    <div class="color-accordion" id="color-accordion">
                                                        <a class="accordion-msg b-none">1. Data Diri Calon Pendaftar</a>
                                                    <div class="accordion-desc">
                                                    <div class="form-group">
                                                        <label for="nama_lengkap_siswa" class="block">Nama Lengkap <font color="red">*</font></label>
                                                        <input required id="nama_lengkap_siswa" name="nama_lengkap_siswa" type="text" class="form-control" placeholder="Nama Lengkap" required="" autocomplete="off" value="<?= $rows['nama_lengkap'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="radio_siswa" class="block">Jenis Kelamin <font color="red">*</font></label>
                                                            <div class="form-radio">
                                                            <div class="radio radiofill radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio_siswa" checked="checked" value="L">
                                                            <i class="helper"></i>Laki-Laki
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio_siswa" value="P">
                                                            <i class="helper"></i>Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir" class="block">Tempat Lahir<font color="red">*</font></label>
                                                    <input required id="tempat_lahir" name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="<?= $rows['tempat_lahir'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir" class="block">Tanggal Lahir <font color="red">*</font></label>
                                                    <input required id="dropper-animation" class="form-control" type="text" placeholder="Tanggal Lahir" name="tanggal_lahir" readonly="" value="<?= $rows['tanggal_lahir'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <select name="agama" id="agama" class="form-control" required>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Katholik">Katholik</option>
                                                        <option value="Konghucu">Kong Hu Cu</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik" class="block">NIK <font color="red">*</font></label>
                                                    <input required id="nik" name="nik" type="number" class="form-control" placeholder="NIK Anda" value="<?= $rows['nik'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_telp_siswa" class="block">No Telepon / HP / WA (Yang Bisa Dihubungi) <font color="red">*</font></label>
                                                    <input required id="no_telp_siswa" name="no_telp_siswa" type="number" class="form-control" placeholder="No Telepon" value="<?= $rows['no_telp'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_siswa" class="block">Email (Aktif) <font color="red"> *</font></label>
                                                    <input required id="email_siswa" name="email_siswa" type="email" class="form-control" placeholder="Email" value="<?= $rows['email'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="accordion-msg b-none">2. Alamat Calon Pendaftar</a>
                                            <div class="accordion-desc">
                                                <a href="#" data-toggle="modal" data-target="#caraAlamat">
                                                    <div class="alert alert-success background-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                           
                                                    </div>
                                                </a>
                                               
                                                <div class="form-group">
                                                    <label for="alamat_siswa" class="block">Alamat <font color="red">*</font></label>
                                                    <textarea name="alamat_siswa" id="alamat_siswa" class="form-control" rows="5" required="" placeholder="eg: Jl. KH. Muchtar Tabrani No.36, RT.4/RW.001, Perwira, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17122"><?= $rows['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                            <a class="accordion-msg b-none">3. Data Asal Sekolah</a>
                                            <div class="accordion-desc">
                                                <div class="form-group">
                                                    <label for="asal_sekolah" class="block">Nama Asal Sekolah <font color="red">*</font></label>
                                                    <input required id="asal_sekolah" name="asal_sekolah" type="text" class="form-control" placeholder="Nama Asal Sekolah" value="<?= $rows['nama_sekolah'] ?>">
                                                </div>
                                                <div class="form-group">
                                                     <label for="status_sekolah" class="block">Status Sekolah <font color="red">*</font></label>
                                                    <select name="status_sekolah" id="status_sekolah" class="form-control" required="">
                                                        <option value="Negeri">Negeri</option>
                                                        <option value="Swasta">Swasta</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_lulus" class="block">Tahun Lulus<font color="red">*</font></label>
                                                    <input required id="tahun_lulus" name="tahun_lulus" type="text" class="form-control" placeholder="Tahun Lulus" value="<?= $rows['tahun_lulus'] ?>">
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label for="data_asal_sekolah" class="block">Alamat Sekolah <font color="red">*</font></label>
                                                    <textarea id="alamat_sekolah" name="alamat_sekolah" class="form-control" placeholder="Masukkan alamat asal sekolah.." rows="5" required=""><?= $rows['alamat_sekolah'] ?></textarea>
                                                </div>
                                            </div>
                                            <a class="accordion-msg b-none">4. Pemilihan Jurusan</a>
                                            <div class="accordion-desc">
                                                <div class="form-group">
                                                    <label for="jurusan1"> Jurusan<font color="red">*</font></label>
                                                    <select name="jurusan1" id="jurusan1" class="form-control" required>
                                                        <?php if ($rows['jurusan1']): ?>
                                                            <option value="<?= $rows['jurusan1'] ?>"><?= $rows['jurusan1'] ?></option>
                                                            <option disabled="">---------------</option>
                                                        <?php endif ?>
                                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                        <option value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                                                        <option value="Teknik Dan Bisnis Sepeda Motor">Teknik Dan Bisnis Sepeda Motor</option>
                                                        <option value="Asisten Keperawatan">Asisten Keperawatan</option>
                                                        <option value="Perbankan Syariah">Perbankan Syariah</option>
                                                    </select>
                                            </div>
                                            </div>
                                            <a class="accordion-msg b-none">5. Upload Berkas Persyaratan</a>
                                            <div class="accordion-desc">
                                                <div class="form-group">
                                                <div class="sub-title">Hanya di perbolehkan : jpg, jpeg, png</div>
                                                <div class="sub-title">Ukuran maksimal: 5MB</div>
                                                <div class="form-group">
                                                    <label for="foto_kk" class="block">Foto Kartu Keluarga (KK) <font color="red">*</font></label>
                                                    <input required type="file" id="foto_kk" name="foto_kk" class="form-control" accept="image/*">
                                                    <?php if (!empty($rows['kk'])): ?>
                                                        <small>File saat ini: <strong><?= $rows['kk'] ?></strong></small>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                <img src="uploads/<?= $rows['kk'] ?>" style="height: 100%; width: 100%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto_akta_kelahiran" class="block">Foto Akta Kelahiran <font color="red">*</font></label>
                                                    <input required type="file" id="foto_akta_kelahiran" name="foto_akta_kelahiran" class="form-control" accept="image/*">
                                                    <?php if (!empty($rows['akta_kelahiran'])): ?>
                                                        <small>File saat ini: <strong><?= $rows['akta_kelahiran'] ?></strong></small>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                <img src="uploads/<?= $rows['akta_kelahiran'] ?>" style="height: 100%; width: 100%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto_ijazah" class="block">Foto Ijazah <font color="red">*</font></label>
                                                    <input required type="file" id="foto_ijazah" name="foto_ijazah" class="form-control" accept="image/*">
                                                    <?php if (!empty($rows['ijazah'])): ?>
                                                        <small>File saat ini: <strong><?= $rows['ijazah'] ?></strong></small>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                <img src="uploads/<?= $rows['ijazah'] ?>" style="height: 100%; width: 100%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto_seragam" class="block">Foto Peserta <font color="red">*</font></label>
                                                    <input required type="file" id="foto_seragam" name="foto_seragam" class="form-control" accept="image/*">
                                                    <?php if (!empty($rows['foto'])): ?>
                                                        <small>File saat ini: <strong><?= $rows['foto'] ?></strong></small>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                <img src="uploads/<?= $rows['foto'] ?>" style="height: 100%; width: 100%;">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php if (!isset($rows['kode_pendaftar'])): ?>
                                                         <button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Apakah anda yakin jika data yang anda masukkan semua sudah benar?')">Submit Your Data</button>
                                                    <?php endif ?>
                                                    <?php if (isset($rows['kode_pendaftar'])): ?>
                                                         <button type="submit" class="btn btn-success" name="update" onclick="return confirm('Update, Apakah anda yakin jika data yang anda masukkan semua sudah benar?')">Update Your Data</button>
                                                         
                                                    <?php endif ?>
                                                    <button type="reset" class="btn btn-danger" onclick="return reset()">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

                                <!-- <div id="styleSelector"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Modal Settings-->
    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="settingsModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <code>Noted * : Jika anda mengubah profile, otomatis anda akan di keluarkan dan silahkan login kembali menggunakan email/username yang baru </code>
                </div>
                <div class="form-group">
                    <label for="username_admin_change">Username <font color="red">*</font></label>
                    <input type="text" name="username_admin_change" id="username_admin_change" class="form-control" 
                    required autofocus  minlength="4" value="<?= $_SESSION['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="email_admin_change">Email <font color="red">*</font></label>
                    <input type="email" name="email_admin_change" id="email_admin_change" class="form-control" 
                    required value="<?= $_SESSION['email'] ?>">
                </div> 
                <div class="form-group">
                    <a href="#" data-toggle="modal" data-target="#changePasswordModal">Ubah Password ?</a>
                </div> 
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="settingsBtn" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah username/email ?')">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Modal Profile-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">Detail Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="username_admin">Username</label>
                    <input type="text" name="username_admin" id="username_admin" class="form-control" readonly value="<?= $_SESSION['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="email_admin">Email</label>
                    <input type="email" name="email_admin" id="email_admin" class="form-control" readonly value="<?= $_SESSION['email'] ?>">
                </div>
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    
    <!-- Ganti Password Admin Modal-->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="password_change ">Password <font color="red">*</font></label>
                    <input type="password" name="password_change" id="password_change" class="form-control"
                    required autocomplete="off" minlength="6" placeholder="Masukkan password minimal 6 karakter">
                </div>
                <div class="form-group">
                    <label for="confirm_password_change">Confirm Password <font color="red">*</font></label>
                    <input type="password" name="confirm_password_change" id="confirm_password_change" class="form-control"
                    required autocomplete="off" minlength="6" placeholder="Konfirmasi password anda">
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="changePassword" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah password?')">Change</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    

    <!-- Required Jquery -->
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="..\files\bower_components\toastr\toastr.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <!-- amchart js -->
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\SmoothScroll.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="..\files\assets\js\script.min.js"></script>
    <!-- Bootstrap Validate -->
    <script type="text/javascript" src="../files\assets\pages\accordion\accordion.js"></script>
    <script type="text/javascript" src="../files/bower_components/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- DataTable -->
    <script type="text/javascript" src="../files\bower_components\datatables\jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../files\bower_components\datatables\dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="../files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../files\bower_components\bootstrap-datepicker\js\bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../files\bower_components\bootstrap-daterangepicker\js\daterangepicker.js"></script>
    <script type="text/javascript" src="../files\bower_components\datedropper\js\datedropper.min.js"></script>
    <script type="text/javascript" src="../files\bower_components\spectrum\js\spectrum.js"></script>
    <script type="text/javascript" src="../files\bower_components\jscolor\js\jscolor.js"></script>
    <script type="text/javascript" src="../files\bower_components\jquery-minicolors\js\jquery.minicolors.min.js"></script>
    <script type="text/javascript" src="../files\assets\pages\advance-elements\custom-picker.js"></script>


    <!-- Get Wilayah -->
    <script type="text/javascript" src="../wilayah/scriptWilayah.js"></script>

    <!-- Validate -->
    <script type="text/javascript" src="../src/files/bootstrapValidateIndex/validateFormIndex.js"></script>
    
</body>

</html>

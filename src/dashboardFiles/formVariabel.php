<?php 
    
     //1. Data Post Diri Calon Pendaftar
    $nama_lengkap_siswa = htmlspecialchars($_POST['nama_lengkap_siswa']);
    $jenis_kelamin_siswa = htmlspecialchars($_POST['radio_siswa']);
    $tempat_lahir_siswa = htmlspecialchars($_POST['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $nik = htmlspecialchars($_POST['nik']);
    $no_telp_siswa = htmlspecialchars($_POST['no_telp_siswa']);
    $email_siswa = htmlspecialchars($_POST['email_siswa']);
    $agama = htmlspecialchars($_POST['agama']);
    $kode_pendaftar = $sessionKodePendaftar;

    //2. Data Alamat
    $alamat_siswa = htmlspecialchars($_POST['alamat_siswa']);
   


    //3. Data Asal Sekolah
    $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
    $tahun_lulus = htmlspecialchars($_POST['tahun_lulus']);
    $alamat_sekolah = htmlspecialchars($_POST['alamat_sekolah']);
    $status_sekolah = htmlspecialchars($_POST['status_sekolah']);

    //4. Data jurusan
    $jurusan1 = htmlspecialchars($_POST['jurusan1']);

    //6. Berkas-Berkas
    $foto_kk = $_FILES['foto_kk']['name'];
    $foto_ijazah = $_FILES['foto_ijazah']['name'];
    $foto_akta_kelahiran = $_FILES['foto_akta_kelahiran']['name'];
    $foto_seragam = $_FILES['foto_seragam']['name'];

    $tmp_kk = $_FILES['foto_kk']['tmp_name'];
    $tmp_akta = $_FILES['foto_akta']['tmp_name'];
    $tmp_ijazah = $_FILES['foto_ijazah']['tmp_name'];
    $tmp_seragam = $_FILES['foto_seragam']['tmp_name'];

    $folder = "uploads/";

    // Pindahkan file ke folder uploads
    move_uploaded_file($tmp_kk, $folder . $foto_kk);
    move_uploaded_file($tmp_akta_kelahiran, $folder . $foto_akta_kelahiran);
    move_uploaded_file($tmp_ijazah, $folder . $foto_ijazah);
    move_uploaded_file($tmp_seragam, $folder . $foto_seragam);
    

    //5. Status Pendaftaran First Register = Proses
    $status = 'pengecekan';


 ?>
<?php
require_once '../koneksi.php'; // koneksi

// sign in
if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $quser = "SELECT * FROM tb_login WHERE username = '$username'"; // query user
    $ruser = mysqli_query($conn, $quser); // result user
    $readUser = readdata($ruser);

    // cek username
    if (mysqli_num_rows($ruser) > 0) {
        $qpass = "SELECT * FROM tb_login WHERE password = '$password'"; // query password
        $rpass = mysqli_query($conn, $qpass); // result password

        // cek password
        if (mysqli_num_rows($rpass) > 0) {
            $_SESSION['userlogin'] = $username;
            $_SESSION['leveluser'] = $readUser[0]['leveluser'];
            return header("Location: ../dashboard/index.php");
        }

        return header("Location: index.php");
    }
    return header("Location: index.php");
}

// sign up
if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tb_login VALUES ('$username', '$password', '1')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Akun berhasil terdaftar! Silahkan Login');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Akun gagal terdaftar! Silahkan hubungi operator');
        document.location.href = 'index.php';
        </script>";
    }
}

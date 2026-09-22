<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama     = htmlspecialchars($_POST["nama"]);
    $email    = htmlspecialchars($_POST["email"]);
    $whatsapp = htmlspecialchars($_POST["whatsapp"]);
    $subjek   = htmlspecialchars($_POST["subjek"]);
    $pesan    = htmlspecialchars($_POST["pesan"]);

    $tujuan = "rsprimasehat@gmail.com";

    $isi_pesan =
        "Pesan dari Website RS Prima Sehat Pekalongan\n\n" .
        "Nama       : " . $nama . "\n" .
        "E-mail     : " . $email . "\n" .
        "WhatsApp   : " . $whatsapp . "\n" .
        "Subjek     : " . $subjek . "\n\n" .
        "Pesan:\n" .
        $pesan;

    $headers  = "From: Website RS Prima Sehat <rsprimasehat@gmail.com>\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($tujuan, $subjek, $isi_pesan, $headers)) {

        echo "
        <script>
            alert('Pesan berhasil dikirim ke RS Prima Sehat Pekalongan.');
            window.location.href='kontak.html';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Pesan belum dapat dikirim. Silakan periksa konfigurasi email XAMPP.');
            window.location.href='kontak.html#form-pesan';
        </script>
        ";
    }

} else {

    header("Location: kontak.html");
    exit;

}

?>

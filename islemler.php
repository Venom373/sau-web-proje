<?php include 'php/header.php'; ?>

<main class="container my-5">
    <div class="row justify-content-center p-md-3">
        <div class="col-lg-8">

            <header class="text-center mb-5 pb-3" style="border-bottom: 2px dashed #4a3018;">
                <h1 class="display-4 fw-bold" style="color: #291a10; font-family: 'Playfair Display', serif;">Seyir
                    Defteri Kaydı 📜</h1>
            </header>

            <div class="p-4 p-md-5"
                style="background: rgba(74, 48, 24, 0.05); border: 2px solid #4a3018; border-radius: 8px;">

                <?php
                // Güvenlik kontrolü
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // Zafiyetleri önlemek için verileri temizliyoruz
                    $ad = htmlspecialchars(trim($_POST['ad'] ?? 'Belirtilmedi'));
                    $soyad = htmlspecialchars(trim($_POST['soyad'] ?? 'Belirtilmedi'));
                    $email = htmlspecialchars(trim($_POST['email'] ?? 'Belirtilmedi'));
                    $konu = htmlspecialchars(trim($_POST['konu'] ?? 'Belirtilmedi'));
                    $tercih = htmlspecialchars(trim($_POST['tercih'] ?? 'Belirtilmedi'));
                    $mesaj = htmlspecialchars(trim($_POST['mesaj'] ?? 'Belirtilmedi'));

                    echo "<div class='alert fw-bold shadow-sm mb-5' style='background-color: #dcfce7; color: #14532d; border: 2px solid #166534;'>
                            <h4 class='alert-heading'>Güvercin Ulaştı, $ad! </h4>
                            <p class='mb-0'>Mesajınız siber denizlerde kaybolmadan sunucumuza güvenle ulaştı. Detaylar aşağıdadır:</p>
                          </div>";

                    // Gelen verileri Seyir Defteri temalı tablo ile ekrana basıyoruz
                    echo "<div class='table-responsive'>
                            <table class='table table-borderless fs-5' style='color: #3e2723;'>
                                <tbody>
                                    <tr style='border-bottom: 1px dashed #4a3018;'>
                                        <th style='width: 35%; color: #dc2626;'>Ad Soyad:</th>
                                        <td class='fw-semibold'>$ad $soyad</td>
                                    </tr>
                                    <tr style='border-bottom: 1px dashed #4a3018;'>
                                        <th style='color: #dc2626;'>E-Posta:</th>
                                        <td class='fw-semibold'>$email</td>
                                    </tr>
                                    <tr style='border-bottom: 1px dashed #4a3018;'>
                                        <th style='color: #dc2626;'>Konu:</th>
                                        <td class='fw-semibold'>$konu</td>
                                    </tr>
                                    <tr style='border-bottom: 1px dashed #4a3018;'>
                                        <th style='color: #dc2626;'>Dönüş Tercihi:</th>
                                        <td class='fw-semibold'>$tercih</td>
                                    </tr>
                                    <tr>
                                        <th style='color: #dc2626;'>Mesajınız:</th>
                                        <td><p class='mb-0 text-break fw-semibold'>$mesaj</p></td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>";

                } else {
                    // URL'den direkt girme engeli
                    echo "<div class='alert fw-bold text-center' style='background-color: #fee2e2; color: #991b1b; border: 2px solid #b91c1c;'>
                            <h4 class='alert-heading fw-bold'>Yetkisiz Erişim! ☠️</h4>
                            <p>Bu sayfaya doğrudan erişim izniniz bulunmamaktadır. Lütfen iletişim formunu kullanınız.</p>
                          </div>";
                }
                ?>

            </div>

            <div class="text-center mt-5">
                <a href="iletisim.php" class="btn btn-dark fw-bold px-4 shadow me-md-3 mb-3 mb-md-0">← Form'a Geri
                    Dön</a>
                <a href="index.php" class="btn btn-danger fw-bold px-4 shadow">Ana Sayfaya Dön 🏴‍☠️</a>
            </div>

        </div>
    </div>
</main>

<?php include 'php/footer.php'; ?>
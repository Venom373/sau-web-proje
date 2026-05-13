<?php include 'php/header.php'; ?>

<main class="container my-5">
    <div class="row justify-content-center p-md-3">
        <div class="col-lg-8">

            <header class="text-center mb-5 pb-3 islemler-header">
                <h1 class="display-4 fw-bold islemler-baslik">Seyir Defteri Kaydı 📜</h1>
            </header>

            <div class="p-4 p-md-5 kayit-kutusu">

                <?php
                // Güvenlik kontrolü: Verilerin POST metoduyla gelip gelmediğine bakıyoruz
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // XSS ve gereksiz boşluklar için verileri temizliyoruz
                    $ad = htmlspecialchars(trim($_POST['ad'] ?? 'Belirtilmedi'));
                    $soyad = htmlspecialchars(trim($_POST['soyad'] ?? 'Belirtilmedi'));
                    $email = htmlspecialchars(trim($_POST['email'] ?? 'Belirtilmedi'));
                    $telefon = htmlspecialchars(trim($_POST['telefon'] ?? 'Belirtilmedi')); 
                    $konu = htmlspecialchars(trim($_POST['konu'] ?? 'Belirtilmedi'));
                    $tercih = htmlspecialchars(trim($_POST['tercih'] ?? 'Belirtilmedi'));
                    $mesaj = htmlspecialchars(trim($_POST['mesaj'] ?? 'Belirtilmedi'));

                    // Başarı mesajı
                    echo "<div class='alert fw-bold shadow-sm mb-5 basari-mesaji'>
                            <h4 class='alert-heading'>Mesaj Kaptan'a Ulaştı, $ad! ⚓</h4>
                            <p class='mb-0'>İletiniz siber denizleri aşarak sunucumuza güvenle ulaştı. Detaylar aşağıdadır:</p>
                          </div>";

                    // Gelen verileri temaya uygun bir tablo ile listeliyoruz
                    echo "<div class='table-responsive'>
                            <table class='table table-borderless fs-5 sonuc-tablosu'>
                                <tbody>
                                    <tr class='tablo-satir'>
                                        <th class='tablo-baslik tablo-etiket-genislik'>Ad Soyad:</th>
                                        <td class='fw-semibold'>$ad $soyad</td>
                                    </tr>
                                    <tr class='tablo-satir'>
                                        <th class='tablo-baslik'>E-Posta:</th>
                                        <td class='fw-semibold'>$email</td>
                                    </tr>
                                    <tr class='tablo-satir'>
                                        <th class='tablo-baslik'>Telefon:</th>
                                        <td class='fw-semibold'>$telefon</td>
                                    </tr>
                                    <tr class='tablo-satir'>
                                        <th class='tablo-baslik'>Konu:</th>
                                        <td class='fw-semibold'>$konu</td>
                                    </tr>
                                    <tr class='tablo-satir'>
                                        <th class='tablo-baslik'>Dönüş Tercihi:</th>
                                        <td class='fw-semibold'>$tercih</td>
                                    </tr>
                                    <tr>
                                        <th class='tablo-baslik'>Mesajınız:</th>
                                        <td><p class='mb-0 text-break fw-semibold'>$mesaj</p></td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>";

                } else {
                    // Sayfaya direkt linkle girmeye çalışanlar için engel
                    echo "<div class='alert fw-bold text-center hata-mesaji'>
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
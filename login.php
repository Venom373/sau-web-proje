<?php
session_start();
ob_start();

// Eğer kullanıcı zaten giriş yapmışsa direkt panele gönder
if(isset($_SESSION["kullanici"])){
    header("Location: panel.php");
    exit;
}

$hata_mesaji = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $sifre = trim($_POST['sifre'] ?? '');

    // Kullanıcı bilgilerini güvenli klasördeki JSON'dan çekiyoruz
    $json_yolu = 'veri/kullanicilar.json';
    
    if (file_exists($json_yolu)) {
        $json_veri = file_get_contents($json_yolu);
        $kullanicilar = json_decode($json_veri, true);
        $giris_basarili = false;

        foreach ($kullanicilar as $user) {
            if (strtolower($email) === strtolower($user['email']) && $sifre === $user['sifre']) {
                // Başarılı girişte Öğrenci No'yu session'a alıyoruz
                $_SESSION["kullanici"] = strtoupper($user['ogrenci_no']); 
                $giris_basarili = true;
                break;
            }
        }

        if ($giris_basarili) {
            header("Location: panel.php");
            exit;
        } else {
            $hata_mesaji = "E-posta adresi veya şifre hatalı! Lütfen tekrar deneyiniz.";
        }
    } else {
        $hata_mesaji = "Sistem hatası: Kullanıcı veritabanı bulunamadı!";
    }
}

include 'php/header.php'; 
?>

<main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card shadow-lg border-0 login-kart">
        <div class="card-header text-white text-center py-4 login-header">
            <h3 class="fw-bold mb-0">Öğrenci Girişi</h3>
        </div>
        <div class="card-body p-4 p-md-5 login-body">

            <?php if($hata_mesaji != ""): ?>
            <div class="alert alert-danger text-center fw-bold login-hata-kutusu">
                <?php echo $hata_mesaji; ?>
            </div>
            <?php endif; ?>

            <form action="login.php" method="POST" id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold login-etiket">Kullanıcı Adı (Öğrenci E-Posta)</label>
                    <input type="text" class="form-control border-dark" id="email" name="email"
                        placeholder="Örn: b251210381@sakarya.edu.tr">
                </div>
                <div class="mb-4">
                    <label for="sifre" class="form-label fw-bold login-etiket">Şifre (Öğrenci No)</label>
                    <input type="password" class="form-control border-dark" id="sifre" name="sifre"
                        placeholder="Öğrenci numaranız">
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-dark btn-lg fw-bold shadow">Giriş Yap ⚔️</button>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted fw-bold">Test: b251210381@sakarya.edu.tr</small>
                </div>
            </form>

        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
        let email = document.getElementById("email").value.trim();
        let sifre = document.getElementById("sifre").value.trim();

        // 1. Boş Alan Kontrolü
        if (email === "" || sifre === "") {
            event.preventDefault();
            alert("Hata: Lütfen E-posta ve Şifre alanlarını boş bırakmayınız!");
            return;
        }

        // 2. Mail Formatı Kontrolü
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            event.preventDefault();
            alert("Hata: Lütfen geçerli bir e-posta formatı giriniz!");
            return;
        }
    });
});
</script>

<?php include 'php/footer.php'; ?>
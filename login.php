<?php
session_start();
ob_start();

if(isset($_SESSION["kullanici"])){
    header("Location: panel.php");
    exit;
}

$hata_mesaji = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $sifre = trim($_POST['sifre'] ?? '');


    $beklenen_email = "b251210381@sakarya.edu.tr";
    $beklenen_sifre = "b251210381";

    if(strtolower($email) === $beklenen_email && $sifre === $beklenen_sifre){
        // Başarılı girişte Öğrenci No'yu session'a almamızın sebebi panelde gösterebilmektir.
        $_SESSION["kullanici"] = strtoupper("B251210381"); 
        header("Location: panel.php");
        exit;
    } else {
        $hata_mesaji = "E-posta adresi veya şifre hatalı! Lütfen tekrar deneyiniz.";
    }
}

include 'php/header.php'; 
?>

<main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-dark text-white text-center py-4">
            <h3 class="fw-bold mb-0">Öğrenci Girişi</h3>
        </div>
        <div class="card-body p-4 p-md-5 bg-light">
            
            <?php if($hata_mesaji != ""): ?>
                <div class="alert alert-danger text-center fw-bold">
                    <?php echo $hata_mesaji; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Kullanıcı Adı (Öğrenci E-Posta)</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Örn: b251210381@sakarya.edu.tr" required>
                </div>
                <div class="mb-4">
                    <label for="sifre" class="form-label fw-bold">Şifre (Öğrenci No)</label>
                    <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Öğrenci numaranız" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">Giriş Yap</button>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">Proje test hesabı: b251210381@sakarya.edu.tr</small>
                </div>
            </form>

        </div>
    </div>
</main>

<!--  JavaScript ile boş alan ve mail formatı kontrolü -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
        let email = document.getElementById("email").value.trim();
        let sifre = document.getElementById("sifre").value.trim();

        // 1. Boş Alan Kontrolü
        if (email === "" || sifre === "") {
            event.preventDefault(); // Formun sunucuya gitmesini engeller
            alert("Hata: Lütfen E-posta ve Şifre alanlarını boş bırakmayınız!");
            return;
        }

        // 2. Mail Formatı Kontrolü (Regex ile)
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            event.preventDefault(); // Formun sunucuya gitmesini engeller
            alert("Hata: Lütfen geçerli bir e-posta formatı giriniz! (Örn: b251210381@sakarya.edu.tr)");
            return;
        }
    });
});
</script>

<?php include 'php/footer.php'; ?>
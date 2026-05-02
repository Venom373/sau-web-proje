<?php
session_start();
ob_start();

// Giriş yapmış biri kayıt sayfasına giremez, panele yönlendirilir
if(isset($_SESSION["kullanici"])){
    header("Location: panel.php");
    exit;
}

$mesaj = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ogrenci_no = htmlspecialchars(trim($_POST['ogrenci_no'] ?? ''));
    $sifre = htmlspecialchars(trim($_POST['sifre'] ?? ''));

    // Güvenlik: Öğrenci numarası format kontrolü (Sadece harf ve rakam, 9-11 karakter arası)
    if(!preg_match('/^[a-zA-Z0-9]{9,11}$/', $ogrenci_no)){
        $mesaj = "<div class='alert alert-danger text-center fw-bold'>Geçersiz format! Lütfen geçerli bir öğrenci numarası giriniz. (Örn: B251210381)</div>";
    } elseif(strlen($sifre) < 4) {
        $mesaj = "<div class='alert alert-danger text-center fw-bold'>Şifreniz en az 4 karakter olmalıdır!</div>";
    } else {
        $dosya = 'kullanicilar.json';
        $kullanicilar = [];

        // Mevcut kullanıcıları JSON'dan oku
        if(file_exists($dosya)){
            $kullanicilar = json_decode(file_get_contents($dosya), true) ?? [];
        }

        // Bu numara daha önce kayıt olmuş mu kontrolü
        $var_mi = false;
        foreach($kullanicilar as $k){
            if(strtolower($k['ogrenci_no']) === strtolower($ogrenci_no)){
                $var_mi = true;
                break;
            }
        }

        if($var_mi){
            $mesaj = "<div class='alert alert-warning text-center fw-bold'>Bu öğrenci numarası zaten sisteme kayıtlı!</div>";
        } else {
            // Şifreyi güvenlik için hashliyoruz ve kaydediyoruz
            $kullanicilar[] = [
                'ogrenci_no' => strtoupper($ogrenci_no),
                'sifre' => password_hash($sifre, PASSWORD_DEFAULT)
            ];
            file_put_contents($dosya, json_encode($kullanicilar, JSON_PRETTY_PRINT));
            $mesaj = "<div class='alert alert-success text-center fw-bold'>Kayıt başarılı! <a href='login.php' class='alert-link'>Buradan giriş yapabilirsiniz.</a></div>";
        }
    }
}

include 'php/header.php'; 
?>

<main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card shadow border-0" style="width: 100%; max-width: 400px;">
        <div class="card-header bg-secondary text-white text-center py-4">
            <h3 class="fw-bold mb-0">Sisteme Kayıt Ol</h3>
        </div>
        <div class="card-body p-4 p-md-5 bg-light">
            
            <?php echo $mesaj; ?>

            <form action="kayit.php" method="POST">
                <div class="mb-3">
                    <label for="ogrenci_no" class="form-label fw-bold">Öğrenci Numarası</label>
                    <input type="text" class="form-control" id="ogrenci_no" name="ogrenci_no" placeholder="Örn: B251210381" required>
                </div>
                <div class="mb-4">
                    <label for="sifre" class="form-label fw-bold">Şifre Belirleyin</label>
                    <input type="password" class="form-control" id="sifre" name="sifre" placeholder="En az 4 karakter" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-secondary btn-lg fw-bold">Kayıt Ol</button>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">Zaten hesabınız var mı? <a href="login.php" class="text-decoration-none fw-bold">Giriş Yapın</a></small>
                </div>
            </form>

        </div>
    </div>
</main>

<?php include 'php/footer.php'; ?>
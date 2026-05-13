<?php
session_start();

// Eğer kullanıcı giriş yapmadan bu sayfaya gelmeye çalışırsa, login sayfasına geri gönder (Güvenlik önlemi)
if(!isset($_SESSION["kullanici"])){
    header("Location: login.php");
    exit;
}

include 'php/header.php'; 
?>

<main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="text-center p-5 bg-white shadow-lg rounded border border-dark border-3 panel-kutu">

        <div class="mb-4">
            <div class="panel-ikon-kapsayici">
                <span class="panel-ikon">⚓</span>
            </div>
        </div>

        <h1 class="display-5 fw-bold text-dark mb-3">
            Hoşgeldiniz <?php echo htmlspecialchars($_SESSION["kullanici"]); ?>
        </h1>

        <p class="lead text-muted mb-4">Sisteme başarıyla giriş yaptınız.</p>

        <hr class="w-50 mx-auto mb-4">

        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="index.php" class="btn btn-dark btn-lg px-4">Ana Sayfaya Dön</a>
            <a href="logout.php" class="btn btn-danger btn-lg px-4">Çıkış Yap</a>
        </div>
    </div>
</main>

<?php include 'php/footer.php'; ?>
<?php
session_start();

// Eğer kullanıcı giriş yapmadan bu sayfaya gelmeye çalışırsa, login sayfasına geri gönder (Güvenlik)
if(!isset($_SESSION["kullanici"])){
    header("Location: login.php");
    exit;
}

include 'php/header.php'; 
?>

<main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="text-center p-5 bg-white shadow-lg rounded border border-primary border-3" style="max-width: 600px; width: 100%;">
        <div class="mb-4">
            <!-- Başarı ikonunu temsil eden basit bir Bootstrap SVG ikonu -->
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
            </svg>
        </div>
        
        <!-- "Hoşgeldiniz [Öğrenci No]" mesajı -->
        <h1 class="display-5 fw-bold text-dark mb-3">
            Hoşgeldiniz <?php echo htmlspecialchars($_SESSION["kullanici"]); ?>
        </h1>
        
        <p class="lead text-muted mb-4">Sisteme başarıyla giriş yaptınız. Güvenli bölgedesiniz.</p>
        
        <hr class="w-50 mx-auto mb-4">
        
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="index.php" class="btn btn-outline-primary btn-lg px-4">Ana Sayfaya Dön</a>
            <a href="logout.php" class="btn btn-danger btn-lg px-4">Çıkış Yap</a>
        </div>
    </div>
</main>

<?php include 'php/footer.php'; ?>
// Sayfa tamamen yüklendiğinde JavaScript'in çalışmasını sağlayan dinleyici
document.addEventListener("DOMContentLoaded", function() {
    
    // İletişim sayfasındaki formumuzu ve gönder butonumuzu seçiyoruz
    const iletisimFormu = document.forms["iletisimFormu"];
    
    // Eğer sayfada iletisim formu varsa bu kodlar çalışsın (Diğer sayfalarda hata vermemesi için)
    if(iletisimFormu) {
        
        // Gönder butonunu class üzerinden yakalıyoruz
        const gonderBtn = document.querySelector(".btn-primary");

        gonderBtn.addEventListener("click", function() {
            
            // Kullanıcının kutulara girdiği değerleri alıyoruz (trim() boşlukları temizler)
            let ad = document.getElementById("ad").value.trim();
            let soyad = document.getElementById("soyad").value.trim();
            let email = document.getElementById("email").value.trim();
            let konu = document.getElementById("konu").value;
            let mesaj = document.getElementById("mesaj").value.trim();
            let kvkk = document.getElementById("kvkk").checked;

            // 1. Ad ve Soyad Kontrolü
            if (ad === "" || soyad === "") {
                alert("Hata: Lütfen adınızı ve soyadınızı eksiksiz giriniz!");
                return; // return komutu, hata varsa kodun aşağı inmesini durdurur.
            }

            // 2. E-Posta Format Kontrolü (Regex - Düzenli İfade ile)
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Hata: Lütfen geçerli bir e-posta adresi formatı giriniz! (Örn: admin@serhat.com)");
                return;
            }

            // 3. Konu Seçimi Kontrolü
            if (konu === "") {
                alert("Hata: Lütfen açılır menüden bir iletişim konusu seçiniz!");
                return;
            }

            // 4. Mesaj Uzunluk Kontrolü
            if (mesaj === "" || mesaj.length < 10) {
                alert("Hata: Mesaj alanı boş bırakılamaz ve en az 10 karakter olmalıdır!");
                return;
            }

            // 5. KVKK Onay Kutusu Kontrolü
            if (!kvkk) {
                alert("Hata: Devam edebilmek için KVKK metnini onaylamanız gerekmektedir!");
                return;
            }

            // Bütün güvenlik duvarları aşıldıysa formu gönder (Submit)
            alert("Harika! Doğrulama başarılı, form verileri sunucuya iletiliyor...");
            iletisimFormu.submit();
        });
    }
});
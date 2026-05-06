<?php include 'php/header.php'; ?>

<!-- Vue 3 CDN (Framework için) -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<main class="container my-5" id="vue-app">
    <div class="row justify-content-center p-md-3">
        <div class="col-lg-9">
            
            <header class="text-center mb-5 pb-3" style="border-bottom: 2px dashed #4a3018;">
                <h1 class="display-4 fw-bold" style="color: #291a10; font-family: 'Playfair Display', serif;">Güvercin Yolla 🕊️</h1>
                <p class="fs-5" style="color: #4a3018;">Projeler, sızma testleri veya korsan ittifakları için bana ulaşabilirsiniz.</p>
            </header>

            <!-- Vue JS Hata Mesajları Paneli -->
            <div v-if="vueHatalar.length > 0" class="alert fw-bold shadow-sm mb-4" style="background-color: #fca5a5; color: #7f1d1d; border: 2px solid #b91c1c;">
                <ul class="mb-0">
                    <li v-for="hata in vueHatalar">{{ hata }}</li>
                </ul>
            </div>

            <form action="islemler.php" method="POST" id="iletisimFormu" name="iletisimFormu">
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="ad" class="form-label fw-bold" style="color: #3e2723;">Adınız:</label>
                        <input type="text" class="form-control border-dark shadow-sm bg-light" id="ad" name="ad" v-model="form.ad" placeholder="Monkey D.">
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <label for="soyad" class="form-label fw-bold" style="color: #3e2723;">Soyadınız:</label>
                        <input type="text" class="form-control border-dark shadow-sm bg-light" id="soyad" name="soyad" v-model="form.soyad" placeholder="Luffy">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label fw-bold" style="color: #3e2723;">E-Posta Adresiniz :</label>
                    <!-- Sadece e-mail formatı istenir (Okul maili zorunluluğu Login sayfasındadır) -->
                    <input type="email" class="form-control border-dark shadow-sm bg-light" id="email" name="email" v-model="form.email" placeholder="b251210381@sakarya.edu.tr">
                </div>

                <div class="mb-4">
                    <label for="konu" class="form-label fw-bold" style="color: #3e2723;">İletişim Konusu</label>
                    <select class="form-select border-dark shadow-sm bg-light" id="konu" name="konu" v-model="form.konu">
                        <option value="" disabled>Lütfen bir konu seçiniz...</option>
                        <option value="Siber Güvenlik / Sızma Testi">Siber Güvenlik & CTF</option>
                        <option value="Yazılım Geliştirme">Yazılım Geliştirme (C# / Java)</option>
                        <option value="Yapay Zeka / RAG">Yapay Zeka (LLM & RAG) Projeleri</option>
                        <option value="Diğer">Diğer Meseleler</option>
                    </select>
                </div>

                <div class="mb-4 p-3 rounded" style="background: rgba(74, 48, 24, 0.1); border: 1px dashed #4a3018;">
                    <label class="form-label fw-bold d-block mb-3" style="color: #3e2723;">Geri Dönüş Tercihiniz</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input border-dark" type="radio" name="tercih" id="tercihEmail" value="E-Posta" v-model="form.tercih">
                        <label class="form-check-label fw-semibold" style="color: #4a3018;" for="tercihEmail">E-Posta ile dönüş yapılsın</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input border-dark" type="radio" name="tercih" id="tercihTelefon" value="Telefon" v-model="form.tercih">
                        <label class="form-check-label fw-semibold" style="color: #4a3018;" for="tercihTelefon">Telefon ile dönüş yapılsın</label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="mesaj" class="form-label fw-bold" style="color: #3e2723;">Mesajınız</label>
                    <textarea class="form-control border-dark shadow-sm bg-light" id="mesaj" name="mesaj" rows="5" v-model="form.mesaj" placeholder="Seyir defterine notunuzu buraya yazın..."></textarea>
                </div>

                <div class="form-check mb-5">
                    <input class="form-check-input border-dark" type="checkbox" value="onay" id="kvkk" name="kvkk" v-model="form.kvkk">
                    <label class="form-check-label fw-bold" style="color: #78350f;" for="kvkk">
                        Gizlilik sözleşmesini ve veri işleme şartlarını kabul ediyorum.
                    </label>
                </div>

                <hr style="border-top: 2px dashed #4a3018;">

                <!-- Native JS ve Vue.js Doğrulaması İki Farklı Butonda -->
                <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4">
                    <!-- Buton 1: Native JavaScript Doğrulaması -->
                    <button type="button" class="btn btn-dark px-4 fw-bold shadow" onclick="nativeJsKontrol()">Native JS ile Doğrula ⚔️</button>
                    
                    <!-- Buton 2: Vue.js Doğrulaması -->
                    <button type="button" class="btn btn-danger px-4 fw-bold shadow" @click="vueKontrol">Vue.js ile Doğrula & Gönder 🏴‍☠️</button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
// --- VUE.JS KODLARI ---
const { createApp } = Vue;

createApp({
    data() {
        return {
            form: {
                ad: '',
                soyad: '',
                email: '',
                konu: '',
                tercih: 'E-Posta',
                mesaj: '',
                kvkk: false
            },
            vueHatalar: [] 
        }
    },
    methods: {
        vueKontrol() {
            this.vueHatalar = []; 
            
            if (!this.form.ad.trim() || !this.form.soyad.trim()) {
                this.vueHatalar.push("Vue Kontrolü: Ad ve soyad alanları boş bırakılamaz.");
            }
            
            // Standart E-Posta Format Kontrolü (İçinde @ ve . olmalı)
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.form.email)) {
                this.vueHatalar.push("Vue Kontrolü: Geçerli bir e-posta adresi giriniz.");
            }
            
            if (!this.form.konu) {
                this.vueHatalar.push("Vue Kontrolü: Lütfen bir iletişim konusu seçiniz.");
            }
            
            if (!this.form.mesaj.trim() || this.form.mesaj.length < 10) {
                this.vueHatalar.push("Vue Kontrolü: Mesajınız en az 10 karakterden oluşmalıdır.");
            }
            
            if (!this.form.kvkk) {
                this.vueHatalar.push("Vue Kontrolü: Devam etmek için sözleşmeyi onaylamalısınız.");
            }

            if (this.vueHatalar.length === 0) {
                alert("Vue.js Denetimi Başarılı! Güvercin yola çıkıyor...");
                document.getElementById('iletisimFormu').submit();
            }
        }
    }
}).mount('#vue-app');

// --- NATIVE JS KODLARI ---
function nativeJsKontrol() {
    let ad = document.getElementById("ad").value.trim();
    let soyad = document.getElementById("soyad").value.trim();
    let email = document.getElementById("email").value.trim();
    let konu = document.getElementById("konu").value;
    let mesaj = document.getElementById("mesaj").value.trim();
    let kvkk = document.getElementById("kvkk").checked;

    if (ad === "" || soyad === "") {
        alert("Native JS Hatası: Ad ve soyad alanları zorunludur!");
        return;
    }

    // Standart E-Posta Format Kontrolü
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Native JS Hatası: Geçerli bir e-posta formatı giriniz!");
        return;
    }

    if (konu === "") {
        alert("Native JS Hatası: Bir konu seçmelisiniz!");
        return;
    }

    if (mesaj === "" || mesaj.length < 10) {
        alert("Native JS Hatası: Mesaj alanı en az 10 karakter olmalı!");
        return;
    }

    if (!kvkk) {
        alert("Native JS Hatası: Sözleşme onay kutusu işaretlenmelidir!");
        return;
    }

    alert("Native JS Denetimi Başarılı! Güvercin yola çıkıyor...");
    document.getElementById('iletisimFormu').submit();
}
</script>

<?php include 'php/footer.php'; ?>
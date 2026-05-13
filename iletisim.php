<?php include 'php/header.php'; ?>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<main class="container my-5" id="vue-app">
    <div class="row justify-content-center p-md-3">
        <div class="col-lg-9">

            <header class="text-center mb-5 pb-3 iletisim-header">
                <h1 class="display-4 fw-bold kaptan-baslik">Kaptana Ulaş ⚓</h1>
                <p class="fs-5 iletisim-aciklama">Projeler, sızma testleri veya korsan ittifakları için bana
                    ulaşabilirsiniz.</p>
            </header>

            <div v-if="vueHatalar.length > 0" class="alert fw-bold shadow-sm mb-4 vue-hata-paneli">
                <ul class="mb-0">
                    <li v-for="hata in vueHatalar">{{ hata }}</li>
                </ul>
            </div>

            <form action="islemler.php" method="POST" id="iletisimFormu" name="iletisimFormu">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="ad" class="form-label fw-bold form-etiket">Adınız:</label>
                        <input type="text" class="form-control border-dark shadow-sm bg-light" id="ad" name="ad"
                            v-model="form.ad" placeholder="Monkey D.">
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <label for="soyad" class="form-label fw-bold form-etiket">Soyadınız:</label>
                        <input type="text" class="form-control border-dark shadow-sm bg-light" id="soyad" name="soyad"
                            v-model="form.soyad" placeholder="Luffy">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold form-etiket">E-Posta Adresiniz:</label>
                        <input type="email" class="form-control border-dark shadow-sm bg-light" id="email" name="email"
                            v-model="form.email" placeholder="b251210381@sakarya.edu.tr">
                    </div>

                    <div class="col-md-6 mt-3 mt-md-0">
                        <label for="telefon" class="form-label fw-bold form-etiket">Telefon Numaranız:</label>
                        <input type="tel" class="form-control border-dark shadow-sm bg-light mb-1" id="telefon"
                            name="telefon" v-model="form.telefon" placeholder="05551234567" maxlength="11">
                        <small class="form-uyari">* Numaranız 0 ile başlamalıdır.</small>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="konu" class="form-label fw-bold form-etiket">İletişim Konusu</label>
                    <select class="form-select border-dark shadow-sm bg-light" id="konu" name="konu"
                        v-model="form.konu">
                        <option value="" disabled>Lütfen bir konu seçiniz...</option>
                        <option value="Siber Güvenlik / Sızma Testi">Siber Güvenlik & CTF</option>
                        <option value="Yazılım Geliştirme">Yazılım Geliştirme (C# / Java)</option>
                        <option value="Yapay Zeka / RAG">Yapay Zeka (LLM & RAG) Projeleri</option>
                        <option value="Diğer">Diğer Meseleler</option>
                    </select>
                </div>

                <div class="mb-4 p-3 rounded form-tercih-kutusu">
                    <label class="form-label fw-bold d-block mb-3 form-etiket">Geri Dönüş Tercihiniz</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input border-dark" type="radio" name="tercih" id="tercihEmail"
                            value="E-Posta" v-model="form.tercih">
                        <label class="form-check-label fw-semibold radio-etiket" for="tercihEmail">E-Posta
                            ile dönüş yapılsın</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input border-dark" type="radio" name="tercih" id="tercihTelefon"
                            value="Telefon" v-model="form.tercih">
                        <label class="form-check-label fw-semibold radio-etiket" for="tercihTelefon">Telefon
                            ile dönüş yapılsın</label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="mesaj" class="form-label fw-bold form-etiket">Mesajınız</label>
                    <textarea class="form-control border-dark shadow-sm bg-light" id="mesaj" name="mesaj" rows="5"
                        v-model="form.mesaj" placeholder="Seyir defterine notunuzu buraya yazın..."></textarea>
                </div>

                <div class="form-check mb-5">
                    <input class="form-check-input border-dark" type="checkbox" value="onay" id="kvkk" name="kvkk"
                        v-model="form.kvkk">
                    <label class="form-check-label fw-bold kvkk-etiket" for="kvkk">
                        Gizlilik sözleşmesini ve veri işleme şartlarını kabul ediyorum.
                    </label>
                </div>

                <hr class="korsan-ayrac">

                <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-4">
                    <button type="button" class="btn btn-dark px-4 fw-bold shadow" onclick="nativeJsKontrol()">Native JS
                        ile Doğrula ⚔️</button>
                    <button type="button" class="btn btn-danger px-4 fw-bold shadow" @click="vueKontrol">Vue.js ile
                        Doğrula & Gönder 🏴‍☠️</button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
// --- VUE.JS KODLARI ---
const {
    createApp
} = Vue;

createApp({
    data() {
        return {
            form: {
                ad: '',
                soyad: '',
                email: '',
                telefon: '',
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

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.form.email)) {
                this.vueHatalar.push("Vue Kontrolü: Geçerli bir e-posta adresi giriniz.");
            }

            // 0 İle Başlama Zorunluluğu Regex'i (Vue)
            const telRegex = /^0[0-9]{9,10}$/;
            if (!telRegex.test(this.form.telefon.trim())) {
                this.vueHatalar.push(
                    "Vue Kontrolü: Telefon numarası 0 ile başlamalı ve 10-11 haneli olmalıdır.");
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
    let telefon = document.getElementById("telefon").value.trim();
    let konu = document.getElementById("konu").value;
    let mesaj = document.getElementById("mesaj").value.trim();
    let kvkk = document.getElementById("kvkk").checked;

    if (ad === "" || soyad === "") {
        alert("Native JS Hatası: Ad ve soyad alanları zorunludur!");
        return;
    }

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Native JS Hatası: Geçerli bir e-posta formatı giriniz!");
        return;
    }

    // 0 İle Başlama Zorunluluğu Regex'i (Native JS)
    let telRegex = /^0[0-9]{9,10}$/;
    if (!telRegex.test(telefon)) {
        alert("Native JS Hatası: Telefon numarası 0 ile başlamalı ve 10-11 haneli olmalıdır!");
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
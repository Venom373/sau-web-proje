# 🏴‍☠️ Dijital Seyir Defteri - Web Teknolojileri Projesi

Bu proje, Sakarya Üniversitesi Bilgisayar Mühendisliği bölümü **Web Teknolojileri** dersi kapsamında geliştirilmiş; modern web standartları (Semantik HTML5, CSS3, JavaScript, Vue.js ve PHP) baz alınarak yazılan bir web uygulamasıdır.

🔗 **Canlı Proje Bağlantısı:** [serhatyildiz.infinityfree.me](http://serhatyildiz.infinityfree.me)

---

## 🛠️ Kullanılan Teknolojiler

- **Frontend:** HTML5 (Semantik), CSS3 (Özel "Aged Paper" Teması), Bootstrap 5, Native JavaScript
- **Framework:** Vue.js 3 (Form Validasyonları için)
- **Backend:** PHP 8.x
- **Veritabanı Simülasyonu:** JSON (`kullanicilar.json` tabanlı okuma/yazma)
- **Mimari:** Responsive Design (Mobil Uyumluluk), Tematik UI Tasarımı

---

## 🗺️ Proje İçeriği ve Sayfa Yapısı

- **Hakkında (`index.php`):** Siber Güvenlik, LLM ve RAG sistemleri üzerine çalıştığım, kendimi tanıttığım ayrıca ilgi alanlarımın ve hobilerimin bulunduğu giriş sayfası.
- **Özgeçmiş (`cv.php`):** Tamamen semantik HTML etiketleri (`<header>`, `<section>`, `<article>`) kullanılarak hazırlanmış eğitim ve kariyer güzergahı.
- **Şehrim (`sehir.php`):** Muğla'nın eşsiz güzelliklerinin (Azmak, Bodrum, Dalyan, Datça, Marmaris, Ölüdeniz) anlatıldığı ve Bootstrap Carousel (Slider) ile görselleştirildiği tanıtım sayfası.
- **Mirasımız (`miras.php`):** Muğla'nın zengin tarihi dokusunun ve kültürel mirasının (Bodrum Kalesi vb.) özel HTML elementleriyle detaylandırıldığı sayfa.
- **Dijital Seyir Defteri (`api.php`):** İnternet üzerindeki ücretsiz REST API'ler kullanılarak asenkron veri çekme işlemlerinin yapıldığı, dinamik bilgi paneli.
- **Kaptana Ulaş (`iletisim.php`):** Kullanıcıların mesaj gönderebildiği tematik iletişim formu.
  - Form verileri **hem Native JavaScript hem de Vue.js** kullanılarak iki ayrı butonda detaylı validasyon (boş alan, e-mail formatı vb.) sürecinden geçirilmektedir.
- **Seyir Defteri Kaydı (`islemler.php`):** İletişim formundan POST metodu ile gelen verilerin, sunucu tarafında (PHP) güvenlik zafiyetlerine karşı temizlenerek (`htmlspecialchars`, `trim`) ekrana basıldığı backend sayfası.
- **Kimlik Doğrulama Sistemi (`login.php`, `kayit.php`, `logout.php`, `panel.php`):** Güvenli giriş ve kayıt simülasyonu. Kullanıcı verileri `kullanicilar.json` dosyası üzerinde işlenir. Kullanıcı adı (SAÜ mail formatı) ve şifre (Öğrenci Numarası) eşleşmesi PHP ile sunucuda denetlenerek sisteme erişim (`panel.php`) sağlanır.

---

## 📂 Dizin Yapısı (Tree)

```text
WEB-TEKNOLOJILERI-PROJE/
├── css/
│   └── style.css
├── img/
│   ├── azmak.jpg
│   ├── bodrum.webp
│   ├── bodrum_kalesi.jpg
│   ├── dalyan.jpg
│   ├── datca.jpg
│   ├── marmaris.jpg
│   ├── oludeniz.jpg
│   └── profil.jpg
├── js/
│   └── main.js
├── php/
│   ├── footer.php
│   └── header.php
├── api.php
├── cv.php
├── iletisim.php
├── index.php
├── islemler.php
├── kayit.php
├── kullanicilar.json
├── login.php
├── logout.php
├── miras.php
├── panel.php
└── sehir.php
```

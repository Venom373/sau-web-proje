<?php include 'php/header.php'; ?>

<!-- One Piece Tema Stilleri -->
<style>
    /* Genel Arka Plan ve Kapsayıcı */
    body {
        background-color: #0f172a !important; 
    }
    .op-kapsayici {
        background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.95)), url('https://images.unsplash.com/photo-1505159940484-eb2b9f2588e2?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
        background-size: cover;
        border-radius: 20px;
        box-shadow: 0 0 40px rgba(0,0,0,0.8);
        border: 1px solid #334155;
        padding: 40px 20px;
    }
    
    /* Sekme (Tab) Tasarımları */
    .nav-pills .nav-link {
        color: #94a3b8;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 10px;
        transition: all 0.3s;
    }
    .nav-pills .nav-link:hover {
        color: #f8fafc;
    }
    .nav-pills .nav-link.active {
        background-color: #dc2626; 
        color: #ffffff;
        box-shadow: 0 0 15px rgba(220, 38, 38, 0.5);
    }

    /* Kripto ve GitHub Kartları (Dark/Neon Efekti) */
    .neon-card {
        background-color: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid #475569;
        border-radius: 15px;
        color: white;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .neon-card:hover {
        transform: translateY(-10px);
        border-color: #38bdf8;
        box-shadow: 0 10px 25px rgba(56, 189, 248, 0.2);
    }

    /* --- WANTED POSTER TASARIMI --- */
    .wanted-poster {
        background-color: #e3d3b4;
        background-image: url('https://www.transparenttextures.com/patterns/aged-paper.png');
        border: 8px solid #4a3018;
        padding: 15px;
        color: #4a3018;
        font-family: 'Georgia', serif;
        box-shadow: 8px 8px 20px rgba(0,0,0,0.7);
        transition: transform 0.3s ease;
    }
    .wanted-poster:hover {
        transform: scale(1.02);
    }
    .wanted-header {
        font-size: 2.5rem;
        font-weight: 900;
        text-align: center;
        letter-spacing: 4px;
        margin-bottom: 10px;
        border-bottom: 4px solid #4a3018;
        line-height: 1;
    }
    .wanted-img-container {
        border: 4px solid #4a3018;
        width: 100%;
        aspect-ratio: 3 / 4; /* Dead or Live kısmındakii kutu tasarımı */
        overflow: hidden;
        margin-bottom: 15px;
        background-color: #000;
    }
    .wanted-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
        object-position: center 15%; /* Odak noktasını yüz hizasına sabitledik */
        filter: sepia(0.5) contrast(1.2) brightness(0.95);
    }
    .wanted-name {
        font-size: 1.2rem;
        font-weight: 900;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .wanted-bounty {
        font-size: 1.6rem;
        font-weight: 900;
        text-align: center;
        margin-top: 10px;
        letter-spacing: 1px;
    }
</style>

<main class="container my-5 flex-grow-1">
    <div class="op-kapsayici">
        <header class="text-center mb-5 pb-3">
            <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 2px 2px 4px #000;">DİJİTAL SEYİR DEFTERİ</h1>
            <p class="lead text-light fw-normal">One Piece'den karakterler, repolar ve efsaneler.</p>
        </header>

        <!-- Sekmeler -->
        <ul class="nav nav-pills justify-content-center mb-5 gap-3" id="apiTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active px-4 py-2 fs-5" id="op-tab" data-bs-toggle="tab" data-bs-target="#onepiece" type="button" role="tab">🏴‍☠️ Grand Line Karakterleri</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2 fs-5" id="kripto-tab" data-bs-toggle="tab" data-bs-target="#kripto" type="button" role="tab">💰 Kripto Borsası</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2 fs-5" id="github-tab" data-bs-toggle="tab" data-bs-target="#github" type="button" role="tab">💻 Sistem Reposu</button>
            </li>
        </ul>

        <!-- Sekme İçerikleri -->
        <div class="tab-content" id="apiTabsContent">
            
            <!-- 1. ONE PIECE SEKMESİ (Jikan API) -->
            <div class="tab-pane fade show active" id="onepiece" role="tabpanel">
                <div class="text-center mb-4">
                    <button id="opBtn" class="btn btn-danger btn-lg fw-bold shadow border-2 border-white px-5">Yeni Karakterler Keşfet ⛵</button>
                </div>
                <div id="opSonuc" class="row g-4 justify-content-center mt-1"></div>
                <div id="opYukleniyor" class="spinner-border text-danger d-none mx-auto mt-5 d-block" style="width: 3rem; height: 3rem;" role="status"></div>
            </div>

            <!-- 2. KRİPTO SEKMESİ -->
            <div class="tab-pane fade" id="kripto" role="tabpanel">
                <div class="text-center mb-4">
                    <button id="kriptoBtn" class="btn btn-outline-info btn-lg fw-bold px-5">Piyasayı Tara 📡</button>
                </div>
                <div id="kriptoSonuc" class="row g-4 justify-content-center mt-1"></div>
                <div id="kriptoYukleniyor" class="spinner-border text-info d-none mx-auto mt-5 d-block" style="width: 3rem; height: 3rem;" role="status"></div>
            </div>

            <!-- 3. GITHUB SEKMESİ -->
            <div class="tab-pane fade" id="github" role="tabpanel">
                <div class="text-center mb-4">
                    <button id="githubBtn" class="btn btn-outline-light btn-lg fw-bold px-5">Kaynak Kodları Çek ⚡</button>
                </div>
                <div id="githubSonuc" class="row g-4 justify-content-center mt-1"></div>
                <div id="githubYukleniyor" class="spinner-border text-light d-none mx-auto mt-5 d-block" style="width: 3rem; height: 3rem;" role="status"></div>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // --- 1. ONE PIECE API (Jikan API - MyAnimeList) ---
    const opBtn = document.getElementById("opBtn");
    const opSonuc = document.getElementById("opSonuc");
    const opYukleniyor = document.getElementById("opYukleniyor");

    function opGetir() {
        opSonuc.innerHTML = "";
        opYukleniyor.classList.remove("d-none");
        
        fetch('https://api.jikan.moe/v4/anime/21/characters')
        .then(res => res.json())
        .then(data => {
            opYukleniyor.classList.add("d-none");
            
            // Tüm karakterleri karıştır (Shuffle) ve rastgele 6 tanesini seç
            let shuffled = data.data.sort(() => 0.5 - Math.random());
            let selectedChars = shuffled.slice(0, 6);
            
            selectedChars.forEach(item => {
                let char = item.character;
                let resim = char.images.jpg.image_url;
                
                // İsim formatını düzeltme (Örn: "Monkey D., Luffy" -> "Luffy Monkey D.")
                let isimParcalari = char.name.split(', ');
                let duzgunIsim = isimParcalari.length > 1 ? isimParcalari[1] + ' ' + isimParcalari[0] : char.name;
                
                // Rol bilgisi (Ana karakter mi, Yan karakter mi?)
                let rolText = item.role === 'Main' ? '<span class="text-danger">Ana Karakter</span>' : 'Yan Karakter';
                
                // Karaktere göre rastgele temsili ödül
                let bounty = item.role === 'Main' ? Math.floor(Math.random() * 900) + 100 : Math.floor(Math.random() * 90) + 1;
                
                let kart = `
                    <div class="col-lg-4 col-md-6">
                        <div class="wanted-poster h-100">
                            <div class="wanted-header">WANTED</div>
                            <div class="text-center fw-bold mb-1" style="font-size:1.1rem; letter-spacing:3px;">DEAD OR ALIVE</div>
                            <div class="wanted-img-container">
                                <img src="${resim}" alt="${duzgunIsim}">
                            </div>
                            <div class="wanted-name mb-1">${duzgunIsim}</div>
                            <div class="text-center small fw-bold mb-2">(${rolText})</div>
                            <div class="wanted-bounty"><span style="font-size:1rem">฿</span> ${bounty},000,000 -</div>
                        </div>
                    </div>`;
                opSonuc.innerHTML += kart;
            });
        }).catch(err => { opYukleniyor.classList.add("d-none"); console.error(err); });
    }
    opBtn.addEventListener("click", opGetir);
    opGetir(); // Sayfa açılışında direkt WANTED posterlerini yükle


    // --- 2. KRİPTO API (Karanlık Neon Tema) ---
    const kriptoBtn = document.getElementById("kriptoBtn");
    const kriptoSonuc = document.getElementById("kriptoSonuc");
    const kriptoYukleniyor = document.getElementById("kriptoYukleniyor");
    const coinler = ["BTCUSDT", "ETHUSDT", "SOLUSDT"];

    function kriptoGetir() {
        kriptoSonuc.innerHTML = "";
        kriptoYukleniyor.classList.remove("d-none");

        Promise.all(coinler.map(coin => fetch(`https://api.binance.com/api/v3/ticker/price?symbol=${coin}`).then(res => res.json())))
        .then(data => {
            kriptoYukleniyor.classList.add("d-none"); 
            data.forEach(item => {
                let isim = item.symbol.replace("USDT", " / USDT");
                let fiyat = parseFloat(item.price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }); 
                let kart = `
                    <div class="col-md-4">
                        <div class="card neon-card h-100 text-center">
                            <div class="card-body p-4">
                                <h4 class="text-info mb-3">${isim}</h4>
                                <h2 class="fw-bold text-white">$${fiyat}</h2>
                            </div>
                        </div>
                    </div>`;
                kriptoSonuc.innerHTML += kart;
            });
        }).catch(err => { kriptoYukleniyor.classList.add("d-none"); console.error(err); });
    }
    kriptoBtn.addEventListener("click", kriptoGetir);


    // --- 3. GITHUB API (Karanlık Tema) ---
    const githubBtn = document.getElementById("githubBtn");
    const githubSonuc = document.getElementById("githubSonuc");
    const githubYukleniyor = document.getElementById("githubYukleniyor");

    function githubGetir() {
        githubSonuc.innerHTML = "";
        githubYukleniyor.classList.remove("d-none");
        
        fetch('https://api.github.com/repos/Venom373/sau-web-proje')
        .then(res => res.json())
        .then(repo => {
            githubYukleniyor.classList.add("d-none");
            if(repo.message === "Not Found") { return; }
            let dil = repo.language ? repo.language : 'HTML/CSS';
            let kart = `
                <div class="col-md-8 mx-auto">
                    <div class="card neon-card h-100 p-2">
                        <div class="card-body p-4 text-center">
                            <h3 class="fw-bold text-white mb-3">📁 ${repo.name}</h3>
                            <p class="text-light mb-4">${repo.description || 'Proje Ödevi'}</p>
                            <span class="badge bg-secondary fs-6 px-3 py-2 mb-3">${dil}</span>
                            <br>
                            <a href="${repo.html_url}" target="_blank" class="btn btn-outline-light fw-bold px-4 mt-3">GitHub'da İncele</a>
                        </div>
                    </div>
                </div>`;
            githubSonuc.innerHTML = kart;
        }).catch(err => { githubYukleniyor.classList.add("d-none"); console.error(err); });
    }
    githubBtn.addEventListener("click", githubGetir);

});
</script>

<?php include 'php/footer.php'; ?>
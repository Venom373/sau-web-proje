<?php include 'php/header.php'; ?>

<main class="container my-5">
    <header class="text-center mb-5 border-bottom pb-3">
        <h1 class="display-4 fw-bold text-primary">Yeryüzü Cenneti: Muğla</h1>
        <p class="lead text-muted">Mavinin ve yeşilin her tonunu kucaklayan, Türkiye'nin en uzun sahil şeridine sahip şehri.</p>
    </header>

    <div id="sehirSlider" class="carousel slide mb-5 shadow-lg rounded overflow-hidden" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#sehirSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#sehirSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#sehirSlider" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#sehirSlider" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#sehirSlider" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#sehirSlider" data-bs-slide-to="5"></button>
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/oludeniz.jpg" class="d-block w-100" alt="Fethiye Ölüdeniz">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Fethiye / Ölüdeniz</h5>
                    <p>Dünyanın en güzel kumsallarından biri ve yamaç paraşütünün kalbi.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/bodrum.webp" class="d-block w-100" alt="Bodrum">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Bodrum</h5>
                    <p>Tarihi kalesi, beyaz evleri ve bitmeyen enerjisiyle Ege'nin incisi.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/marmaris.jpg" class="d-block w-100" alt="Marmaris">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Marmaris</h5>
                    <p>Çam ormanlarının denize kavuştuğu eşsiz koylar ve hareketli geceler.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/datca.jpg" class="d-block w-100" alt="Datça">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Datça</h5>
                    <p>"Acelen varsa ne işin var Datça'da?" - Sakinliğin ve badem çiçeklerinin yurdu.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/azmak.jpg" class="d-block w-100" alt="Akyaka">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Akyaka</h5>
                    <p>Buz gibi Azmak Nehri ve uçurtma sörfü tutkunlarının buluşma noktası.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/Dalyan.jpg" class="d-block w-100" alt="Dalyan Kral Mezarları">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Dalyan</h5>
                    <p>Kayalara oyulmuş binlerce yıllık Likya Kral Mezarları.</p>
                </div>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#sehirSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Önceki</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sehirSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sonraki</span>
        </button>
    </div>
    <section class="row mt-5">
        <div class="col-md-5 mb-4">
            <div class="p-4 border-start border-primary border-5 bg-light h-100 rounded-end shadow-sm">
                <h3 class="text-primary mb-3">Neden Muğla?</h3>
                <p>Muğla, aslında sadece bir şehir değil, her ilçesi ayrı bir ülke gibi hissettiren devasa bir tatil cennetidir. Merkez ilçesi Menteşe oldukça sakin ve tarihi bir dokuya sahipken; asıl efsane ilçelerinde yatar.</p>
                <p>Türkiye'nin en uzun sahil şeridine (yaklaşık 1479 km) sahip olan bu şehir, Antik Karya ve Likya medeniyetlerinin mirasını günümüze kadar taşır. Nüfusu yaz aylarında milyonları bulsa da, yerleşik nüfusu 1 milyonu biraz aşmaktadır.</p>
            </div>
        </div>
        
        <div class="col-md-7 mb-4">
            <h3 class="text-primary mb-3">Mutlaka Görülmesi Gerekenler</h3>
            
            <div class="accordion shadow-sm" id="muglaAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                             Fethiye & Ölüdeniz
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#muglaAccordion">
                        <div class="accordion-body">
                            Babadağ'dan yamaç paraşütüyle atlayıp Ölüdeniz'in o eşsiz lagün manzarasına doğru süzülmek, Kelebekler Vadisi'nde kamp yapmak ve Saklıkent Kanyonu'nun buz gibi sularında yürümek... Fethiye tam bir macera ve doğa merkezidir.
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                             Bodrum & Tarihi Dokusu
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#muglaAccordion">
                        <div class="accordion-body">
                            Antik Halikarnassos şehri üzerine kurulan Bodrum, beyaz evleri, begonvilleri, Sualtı Arkeoloji Müzesi'ne ev sahipliği yapan kalesi ve bitmek bilmeyen gece hayatı ile Muğla'nın dünyaya açılan kapısıdır.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                             Akyaka & Azmak Nehri
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#muglaAccordion">
                        <div class="accordion-body">
                            Sakin Şehir (Cittaslow) unvanına sahip Akyaka, kendine has ahşap mimarisi, buz gibi ve akvaryum berraklığındaki Azmak Nehri ile kafa dinlemek isteyenlerin bir numaralı adresidir.
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</main>

<?php include 'php/footer.php'; ?>
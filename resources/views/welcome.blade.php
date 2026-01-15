@extends('includes.main')
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Mehal International LLC.</h1>
                <p class="hero-description">With our diverse sales channels and exceptional customer service,
                    partnering with us is a no-brainer for brands looking to expand their reach and provide top-notch
                    experiences to their customers.</p>
            </div>
        </div>
    </section>


    <section class="sales-channels-section mt-5">
        <div class="container">

            <!-- Card 1: Image left / Text right -->
            <article class="channel-card-split">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/rupixen-com-Q59HmzK38eQ-unsplash.jpg?v=1690491497&width=1500"
                        alt="Eyebrow Express" />
                </div>

                <div class="channel-split-content">
                    <h2 class="channel-split-title">Effective <br> Conversion-Oriented Advertising</h2>
                    <p class="channel-split-desc">We allocate our own marketing budget to create tailored advertising
                        campaigns for your brand on Amazon, elevating your sales and establishing your products as market
                        leaders, outshining your competitors.
                    </p>
                </div>
            </article>

            <!-- Card 2: Text left / Image right -->
            <article class="channel-card-split reverse">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/nisonco-pr-and-seo-yIRdUr6hIvQ-unsplash.jpg?v=1690491558&width=1500"
                        alt="Amazon" />
                </div>

                <div class="channel-split-content">
                    {{-- <div class="channel-kicker">ONLINE</div> --}}
                    <h2 class="channel-split-title">Are your product listings optimized for peak sales performance?</h2>
                    <p class="channel-split-desc">
                        Let us conduct a comprehensive Listing Audit to identify areas for improvement. Our
                        skilled design team will then handle the implementation of these enhancements, ensuring
                        your Amazon listings reach their full potential.
                    </p>
                </div>
            </article>

            <!-- Card 3: Text left / Image right -->

            <article class="channel-card-split">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/anirudh-wKeZstqxKTQ-unsplash.jpg?v=1690491622&width=1500"
                        alt="Eyebrow Express" />
                </div>

                <div class="channel-split-content">
                    {{-- <div class="channel-kicker">ONLINE</div> --}}
                    <h2 class="channel-split-title">Mastering Amazon <br> for You:</h2>
                    <p class="channel-split-desc">We grasp the intricacies of selling on Amazon, saving you the hassle.
                        Allow us to excel
                        at what we do best - boosting your Amazon sales - while you concentrate on your
                        expertise - crafting exceptional products.</p>
                </div>
            </article>

        </div>
    </section>

@endsection

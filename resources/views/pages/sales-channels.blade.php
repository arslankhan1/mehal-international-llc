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
    <!-- Page Title Section -->
    <section class="page-title-section">
        <div class="container mt-5">
            <h1 class="page-title">Sales Channels</h1>
        </div>
    </section>

    <section class="sales-channels-section mt-5">
        <div class="container">

            <!-- Card 1: Image left / Text right -->
            <article class="channel-card-split">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/Eyebrow_Express_Logo.jpg?v=1690496830&width=750"
                        alt="Eyebrow Express" />
                </div>

                <div class="channel-split-content">
                    <div class="channel-kicker">BRICK & MORTAR</div>
                    <h2 class="channel-split-title">Eyebrow Express</h2>
                    <p class="channel-split-desc">Full-service salon, serving the DFW Metroplex since 2010.</p>
                </div>
            </article>

            <!-- Card 2: Text left / Image right -->
            <article class="channel-card-split reverse">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/christian-wiediger-rymh7EZPqRs-unsplash_2.jpg?v=1690497027&width=750"
                        alt="Amazon" />
                </div>

                <div class="channel-split-content">
                    <div class="channel-kicker">ONLINE</div>
                    <h2 class="channel-split-title">Amazon</h2>
                    <p class="channel-split-desc">
                        We pride ourselves in the diversity in product found on our Amazon catalog, ranging from
                        household goods to toys and electronics.
                    </p>
                </div>
            </article>

            <!-- Card 3: Text left / Image right -->

            <article class="channel-card-split">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/Untitled_design.png?v=1690498125&width=750"
                        alt="Eyebrow Express" />
                </div>

                <div class="channel-split-content">
                    <div class="channel-kicker">ONLINE</div>
                    <h2 class="channel-split-title">TapeandToner.com</h2>
                    <p class="channel-split-desc">Coming soon! Serving local business with all office supply needs,
                        from writing utensils to
                        networking solutions.</p>
                </div>
            </article>

        </div>
    </section>
@endsection

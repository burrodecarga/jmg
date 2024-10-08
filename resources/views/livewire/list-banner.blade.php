<div class="container">
    <div class="d-flex gap-2 justify-content-center py-5">

    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($lesson->images as $banner)
                <div class="swiper-slide" wire:key="banner-{{ $banner->id }}">
                    <img class="w-100" src="{{ $banner->url }}" alt="{{ $banner->name }}">
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

@assets
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
@endassets

@script
    <script>
        window.swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 90,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-container .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1400: {
                    spaceBetween: 40,
                },
                900: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                550: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                }
            }
        });

        /* Event */
        $wire.on('refresh-banners', () => {
            window.swiper.update();
        });
    </script>
@endscript

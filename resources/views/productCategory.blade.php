@push('title')
<title>{{ $category->name }}</title>
@endpush
@include('includes.head')
@include('includes.header')
<style>.header-1 {background:transparent;}.sticky {position: fixed !important;background: linear-gradient(90deg, #145A32, #26aa5f);}</style>

       <section class="contact-us-section bg-custm contact-padding fix position-relative">

    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

            <div class="container-fluid">
                <div class="conatct-main-wrapper">
                    <div class="content p-5">
                        <h2>{{ $category->name }}</h2>
                      
                    </div>
                    </div>

                    </div>
                </section>
<!-- Product-details-Section Start -->
<section class="product-details-section section-padding pt-5 fix">
    <div class="container">
        <div class="product-details-wrapper">

            <div id="subcategoryWrapper">
                @include('includes.subcategory-list', [
                    'category' => $category,
                    'subcategories' => $subcategories
                ])
            </div>

        </div>
    </div>
</section>

@include('includes.footer')
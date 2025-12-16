@extends('app')

@push('title')
<title>All Categories | Step4Environment</title>
@endpush

@section('content')

<section class="contact-us-section bg-custm contact-padding fix position-relative">
    <div id="particles-js" class="particles"></div>
    <div class="container-fluid">
        <div class="conatct-main-wrapper">
            <div class="content p-5">
                <h2>All Categories</h2>
            </div>
        </div>
    </div>
</section>

<div class="shop-categories-section section-padding pt-5">
    <div class="container">
        <div class="shop-categories-wrapper" id="categoryWrapper">
            @include('includes.category-list', ['categories' => $categories])
        </div>
    </div>
</div>

@endsection

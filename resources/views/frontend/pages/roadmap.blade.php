@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<section class="roadmap_section">
    <div class="container py-5">
        <div class="row">
            <div class="12" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                {!! $pageData->content !!}
            </div>
        </div>
    </div>
</section>

@endsection

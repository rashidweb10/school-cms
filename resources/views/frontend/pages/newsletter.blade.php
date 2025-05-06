@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

@php 
$attachment = $pageData->meta->where('meta_key', 'attachment')->first()->meta_value ?? '';
@endphp

<section class="py-md-5 py-md-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                {!! generateHtmlTableFromCsv(central_asset(uploaded_asset($attachment))) !!}
            </div>
        </div>
    </div>
</section>

@endsection
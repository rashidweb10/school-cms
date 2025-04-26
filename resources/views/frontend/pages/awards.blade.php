@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

@php
    $awards = json_decode($pageData->meta->where('meta_key', 'awards')->first()->meta_value ?? '[]', true);
@endphp

    @if(isset($awards['itration']) && is_array($awards['itration']))
    <section class="awards_achievements pt-4 pt-md-5 pb-5 position-relative">
      <div class="container">
        <div class="row justify-content-center">
          
          @foreach($awards['itration'] as $index => $itration)
          <div class="col-md-3">
                  <div class="aos-init aos-animate position-relative">
                  <div class="about_border border_9 position-relative">
                    <a href="{{ central_asset(uploaded_asset($awards['image'][$index])) }}" data-fancybox="gallery1">
                      <img class="jbox-img rotate w-100 hvr-bounce-in" src="{{ central_asset(uploaded_asset($awards['image'][$index])) }}" alt="">
                    </a>
                  </div>
                    <p class="text-center pt-1">{{$awards['title'][$index]}}</p>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </section>
    @endif
    @endsection
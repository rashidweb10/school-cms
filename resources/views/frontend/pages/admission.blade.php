@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
$admission = json_decode($pageData->meta->where('meta_key', 'admission')->first()->meta_value ?? '', true);
@endphp
@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<style>
    .faq-one--faq,
    .features-one {
        position: relative;
        display: block;
    }

    .features-one {
        padding: 40px 0px;
    }

    .features-one__single {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #fd5523;
        border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;
        overflow: hidden;
        padding: 20px 10px;
    }


    .features-one__single-icon {
        position: relative;
        display: block;
        height: 100%;
        background: #fd5523;
        padding: 25px 0 26px;
        border-top-left-radius: 15px;
        border-bottom-right-radius: 15px;
        margin-left: 10px;
    }


    .features-one__single-icon .icon i {
        position: relative;
        display: inline-block;
        color: #fff;
        font-size: 60px;
        line-height: 60px;
        transition: all .5s ease;
    }

    [class*=" icon-"],
    [class^=icon-] {
        font-family: 'Material Icons' !important;
        font-style: normal;
        font-weight: 400;
        font-feature-settings: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
    }



    .features-one__single-content {
        position: relative;
        display: block;
        padding: 32px 30px;
        flex: 1 1;
    }


    .icon-quote:before {
        content: "\e873";
    }

    .icon-professional-services:before {
        content: "\e8b8";
    }
</style>


<style>
    .admition_f_r {
        overflow: hidden;
        background: #fefddf;
        padding-top: 10px;
    }

    .admition_f_r {
        overflow: hidden;
    }

    .admition_f_r .admition_f_r_img {
        overflow: hidden;
        border-top-right-radius: 180px;
        /* border-bottom-right-radius: 240px; */
    }

    .admition_f_r .admition_f_r_img img {
        overflow: hidden;
        /* border-bottom-right-radius: 240px; */
    }


    .admition_f_r_c {
        display: flex;
        /* align-items: center; */
        justify-content: center;
        flex-direction: column;
        padding-left: 50px;
    }

    .features-one__single-content a {
    background: #fdee9d;
    color: #000;
    text-decoration: none;
    padding: 7px 20px;
    font-size: 14px;
    border-radius: 0px;
    margin-top: 6px;
    display: inline-block;
}

.features-one__single-content h4 {
    font-size: 20px;
    line-height: 29px;
    font-weight: 600;
}
</style>

<section class="admition_section" id="admition_section">
    <div class="container">
        <div class="row admition_f_r">
            <!-- <div class="col-md-4 admition_f_r_img">
                <img src="./img/admition-cover.jpg " class="img-fluid" alt="">
            </div> -->
            <div class="col-md-12 admition_f_r_c">
                {!! $pageData->content !!}
            </div>
        </div>

        <div class="row pt-5 pb-5 ps-5">
        @if(isset($admission['itration']) && is_array($admission['itration']))
        @foreach($admission['itration'] as $index => $itration)   
        @foreach(explode(',', $admission['attachments'][$index]) as $id)                
            <div class="col-xl-4 wow fadeInRight ps-0" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms;">
                <div class="features-one__single">
                    <div class="features-one__single-icon text-center">
                        <div class="icon"><i class="fa-solid fa-file-pdf"></i></div>
                    </div>
                    <div class="features-one__single-content">
                        <h4>{{ uploaded_asset_name($id) }}</h4>
                        <a target="_blank" href="{{ central_asset(uploaded_asset($id)) }}">Click To Download</a>
                    </div>
                </div>
            </div>
        @endforeach
        @endforeach
        @endif
        </div>
    </div>
</section>

@endsection
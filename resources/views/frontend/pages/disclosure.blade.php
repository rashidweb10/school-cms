@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
    $disclosure = json_decode($pageData->meta->where('meta_key', 'results')->first()->meta_value ?? '[]', true);
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<section>
    @if(isset($disclosure['itration']) && is_array($disclosure['itration']))
        @foreach($disclosure['itration'] as $index => $iteration)   
            <div class="container dis_table1 dis_table_1 mb-3">
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                        <h4>{{ $disclosure['title'][$index] ?? 'Unknown' }}</h4>
                    </div>
                    <div class="table-responsive " data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                        {!! generateHtmlTableFromCsv(central_asset(uploaded_asset($disclosure['image'][$index]))) !!}
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</section>

<style>
    .row_count {
        width: 7%;
        text-align: center;
    }

    .dis_table tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: #fdee9d;
        border-style: solid;
        border-width: 0;
    }

    .dis_table tbody tr:hover {
        background-color: #fefddf !important;
    }

    .dis_table h4 {
        margin: 0;
        font-size: 26px;
        font-weight: 400;
        color: #000;
        line-height: 43px;
        padding-bottom: 15px;
    }

    .thead-dark {
        background-color: #ececec;
    }

    .dis_table {
        padding: 50px 0px;
        border-bottom: 1px dashed #999;
    }

    /* 2 */
    .dis_table_2 .second_row {
        text-align: center;
    }

    .dis_table a {
        text-decoration: none;
        color: #111;
        font-weight: 600;
    }
</style>

@endsection
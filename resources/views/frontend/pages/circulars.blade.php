@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')
@php
    $circulars = json_decode($pageData->meta->where('meta_key', 'circulars')->first()->meta_value ?? '[]', true);
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<style>
    #circulars {
        padding: 10px 0px 50px 0px;
    }

    .circulars .nav-circulars {
        border: 0;
    }

    .circulars .nav-link {
        color: red;
        border: 1px solid #999;
        padding: 15px 30px;
        transition: 0.3s;
        border-radius: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        height: 100%;
    }

    .circulars .nav-link i {
        padding-right: 15px;
        font-size: 40px;
    }

    .circulars .nav-link h4 {
        font-size: 16px;
        font-weight: 400;
        margin: 0;
        color: #222;
    }

    .circulars .nav-link:hover {
        color: #222;
        /* border-color: #E31E24; */
        background: #fdee9d;
        border: 1px solid #fdee9d;

    }

    .circulars .nav-link.active {
        background: #fdee9d;
        color: #222;
        /* border-color: #E31E24; */
        border: 1px solid #fdee9d;

    }

    .circulars .nav-link.active h4 {
        color: #222;
    }

    @media (max-width: 768px) {
        .circulars .nav-link i {
            padding: 0;
            line-height: 1;
            font-size: 36px;
        }
    }

    @media (max-width: 575px) {
        .circulars .nav-link {
            padding: 15px;
        }

        .circulars .nav-link i {
            font-size: 24px;
        }
    }

    .circulars .tab-content {
        margin-top: 30px;
    }

    .circulars .tab-pane h3 {
        color: var(--heading-color);
        font-weight: 700;
        font-size: 26px;
    }

    .circulars .tab-pane ul {
        list-style: none;
        padding: 0;
    }

    .circulars .tab-pane ul li {
        padding-bottom: 10px;
    }

    .circulars .tab-pane ul i {
        font-size: 20px;
        padding-right: 4px;
        color: var(--accent-color);
    }

    .circulars .tab-pane p:last-child {
        margin-bottom: 0;
    }
</style>


<style>
    .row_count {
        width: 7%;
        text-align: center;
    }


    .result_table tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: #ececec;
        border-style: solid;
        border-width: 0;
    }


    .result_table tbody tr:hover {
        background-color: #fefddf !important;
        
    }

    #circulars td {
        font-size: 14px !important;
        padding-top: 12px;
    }


    .result_table h4 {
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

    .result_table {
        padding: 50px 0px;
        border-bottom: 1px dashed #999;
    }


    .result_table_2 .second_row {
        text-align: center;
    }

    .result_table a {
        text-decoration: none;
        color: #111;
        font-weight: 600;
    }

    .r_tab_heading {
        font-size: 22px;
        margin-bottom: 25px;
        color: #E31E24;
    }


    .result_vm_btn {
        text-decoration: none;
        color: #000;
        background-color: #fdee9d;
        border-radius: 50px;
        padding: 3px 15px;
        transition: all 0.3s;
    }


    .result_vm_btn:hover {
        color: #fff;
        background-color: #E31E24;
    }
</style>



@php
    $circulars = json_decode($pageData->meta->where('meta_key', 'circulars')->first()->meta_value ?? '[]', true);
@endphp

<!-- circulars Section -->
<section id="circulars" class="circulars section">
    <div class="container">
        <ul class="nav nav-circulars row d-flex" data-aos="fade-up" data-aos-delay="100">
            @if(isset($circulars['itration']) && is_array($circulars['itration']))
                @foreach($circulars['itration'] as $index => $iteration)
                    <li class="nav-item col-md-2 col-sm-12 col-lg-2 col-6 mb-md-0 mb-3">
                        <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#circulars-tab-{{ $index }}">
                            <i class="bi bi-box-seam"></i>
                            <h4 class="d-lg-block">{{ $circulars['title'][$index] ?? 'Result' }}</h4>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            @if(isset($circulars['itration']) && is_array($circulars['itration']))
                @foreach($circulars['itration'] as $index => $iteration)
                    <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="circulars-tab-{{ $index }}">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="r_tab_heading">{{ $circulars['title'][$index] ?? 'Result' }}</h4>
                            </div>
                            <div class="table-responsive">
                                {!! generateHtmlTableFromCsv(central_asset(uploaded_asset($circulars['image'][$index]))) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


@endsection


@section('scripts')
<script>

</script>
@endsection

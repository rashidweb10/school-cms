@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')
@php
    $results = json_decode($pageData->meta->where('meta_key', 'results')->first()->meta_value ?? '[]', true);
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<style>
    #results {
        padding: 10px 0px 50px 0px;
    }

    .results .nav-results {
        border: 0;
    }

    .results .nav-link {
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

    .results .nav-link i {
        padding-right: 15px;
        font-size: 40px;
    }

    .results .nav-link h4 {
        font-size: 16px;
        font-weight: 400;
        margin: 0;
        color: #222;
    }

    .results .nav-link:hover {
        color: #222;
        /* border-color: #E31E24; */
        background: #fdee9d;
        border: 1px solid #fdee9d;

    }

    .results .nav-link.active {
        background: #fdee9d;
        color: #222;
        /* border-color: #E31E24; */
        border: 1px solid #fdee9d;

    }

    .results .nav-link.active h4 {
        color: #222;
    }

    @media (max-width: 768px) {
        .results .nav-link i {
            padding: 0;
            line-height: 1;
            font-size: 36px;
        }
    }

    @media (max-width: 575px) {
        .results .nav-link {
            padding: 15px;
        }

        .results .nav-link i {
            font-size: 24px;
        }
    }

    .results .tab-content {
        margin-top: 30px;
    }

    .results .tab-pane h3 {
        color: var(--heading-color);
        font-weight: 700;
        font-size: 26px;
    }

    .results .tab-pane ul {
        list-style: none;
        padding: 0;
    }

    .results .tab-pane ul li {
        padding-bottom: 10px;
    }

    .results .tab-pane ul i {
        font-size: 20px;
        padding-right: 4px;
        color: var(--accent-color);
    }

    .results .tab-pane p:last-child {
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
        border-color: #fdee9d;
        border-style: solid;
        border-width: 0;
    }


    .result_table tbody tr:hover {
        background-color: #fefddf !important;
        
    }

    #results td {
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
        background-color: #fdee9d;
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
        text-decoration: none;
        color: #fff;
        background-color: #E31E24;
        border-radius: 50px;
        padding: 3px 15px;
        transition: all 0.3s;
    }
</style>



@php
    $results = json_decode($pageData->meta->where('meta_key', 'results')->first()->meta_value ?? '[]', true);
@endphp

<!-- Results Section -->
<section id="results" class="results section">
    <div class="container">
        <ul class="nav nav-results row d-flex" data-aos="fade-up" data-aos-delay="100">
            @if(isset($results['itration']) && is_array($results['itration']))
                @foreach($results['itration'] as $index => $iteration)
                    <li class="nav-item col-md-2 col-sm-12 col-lg-2">
                        <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#results-tab-{{ $index }}">
                            <i class="bi bi-box-seam"></i>
                            <h4 class="d-none d-lg-block">{{ $results['title'][$index] ?? 'Result' }}</h4>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            @if(isset($results['itration']) && is_array($results['itration']))
                @foreach($results['itration'] as $index => $iteration)
                    <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="results-tab-{{ $index }}">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="r_tab_heading">{{ $results['title'][$index] ?? 'Result' }}</h4>
                            </div>
                            @if(strtolower($results['title'][$index]) == "toppers")
                                <div id="yearFilterButtons"></div>
                                {!! generateHtmlTableFromCsv(central_asset(uploaded_asset($results['image'][$index])), 'dataTable') !!}
                            @else
                            <div class="table-responsive">
                                {!! generateHtmlTableFromCsv(central_asset(uploaded_asset($results['image'][$index]))) !!}
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


@endsection


@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Step 1: Extract available years from non-blank year cells
    var years = new Set();
    $('#dataTable tbody tr').each(function() {
        var yearText = $(this).find('td.col_1').text().trim();
        if (yearText !== '') {
            years.add(yearText);
        }
    });

    // Step 2: Sort years (max to min)
    var yearArray = Array.from(years).sort(function(a, b) {
        return b - a;
    });

    // Step 3: Build year filter buttons
    var buttonsHtml = '';
    yearArray.forEach(function(year, index) {
        buttonsHtml += '<button type="button" class="btn btn-primary m-1 yearFilterBtn" data-year="' + year + '">' + year + '</button>';
    });
    $('#yearFilterButtons').html(buttonsHtml);

    // Step 4: Filter table function (ONLY matching rows)
    function filterTable(selectedYear) {
        $('#dataTable tbody tr').each(function() {
            var yearText = $(this).find('td.col_1').text().trim();
            //console.log(selectedYear+" : "+yearText);
            if (yearText == selectedYear) {
                console.log(selectedYear+" : "+yearText + " : Show");
                $(this).show();
            } else {

                console.log(selectedYear+" : "+yearText + " : Hide");
                $(this).hide();
            }
        });
    }

    // Step 5: Button click event
    $(document).on('click', '.yearFilterBtn', function() {
        var selectedYear = $(this).data('year');

        // Change button active style
        $('.yearFilterBtn').removeClass('btn-success').addClass('btn-primary');
        $(this).removeClass('btn-primary').addClass('btn-success');

        filterTable(selectedYear);
    });

    // Step 6: Default select first year
    if (yearArray.length > 0) {
        filterTable(yearArray[0]);
        $('.yearFilterBtn[data-year="' + yearArray[0] + '"]').removeClass('btn-primary').addClass('btn-success');
    }
});
</script>

@endsection

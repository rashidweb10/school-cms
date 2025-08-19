@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
    $meta = $pageData->meta->where('meta_key', 'curriculum')->first();
    $curriculum = $meta ? json_decode($meta->meta_value, true) : null;
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<div class="curriculum-test mtt10">

  <!-- Intro Text -->
  <div class="text-center pt-0 pb-4 position-relative z-3">
    {!! $pageData->content !!}
  </div>

  <!-- Stats Circle -->
  <div class="d-flex justify-content-center mb-5 position-relative z-3">
    <div class="position-relative">
      <div class="stats-circle text-center">
        <div class="text-white display-4 fw-black mb-2">{{ count($curriculum['itration'] ?? []) }}</div>
        <div class="text-white fw-bold fs-5">CORE<br>AREAS</div>
      </div>
    </div>
  </div>

  <!-- Curriculum Cards -->
  <div class="container px-4 pb-5 position-relative z-3">
    <div class="row g-4 justify-content-center">
@php
$backgrounds = [
    'linear-gradient(135deg, #60a5fa 0%, #2563eb 100%)',
    'linear-gradient(135deg, #4ade80 0%, #16a34a 100%)',
    'linear-gradient(135deg, #fb923c 0%, #ea580c 100%)',
    'linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%)',
    'linear-gradient(135deg, #f472b6 0%, #db2777 100%)'
];
@endphp

@if(isset($curriculum['itration']) && is_array($curriculum['itration']))
    @foreach($curriculum['itration'] as $index => $itration)
        <div class="col-12 col-md-6 col-lg-4 col-xl">
            <div class="curriculum-card hvr-bounce-in" style="background: {{ $backgrounds[$index % count($backgrounds)] }};">
            <div class="bg-pattern"><div></div><div></div><div></div></div>
            <div class="card-icon"><i class="fa-solid {{ $curriculum['icon'][$index] ?? '' }} text-white"></i></div>
            <h3 class="text-white fs-5 fw-black mb-3"> {{ $curriculum['title'][$index] ?? '' }}</h3>
            <p class="text-white small opacity-95 fw-medium" style="line-height: 1.75;">
                 {{ $curriculum['description'][$index] ?? '' }}
            </p>
            <div class="d-flex align-items-center gap-2 mt-3 text-white position-absolute" style="bottom: 16px; left: 24px;">
                <span class="small fw-bold">Active Implementation</span>
            </div>
            </div>
        </div>
    @endforeach
@endif    


    </div>
  </div>

</div>


@endsection

{{-- @extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
    $meta = $pageData->meta->where('meta_key', 'curriculum')->first();
    $curriculum = $meta ? json_decode($meta->meta_value, true) : null;
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<section class="cariculam-section">
    <div class="container">
        <div class="row">
            <div class="tabss">
                <div class="tabss-nav" role="tablist" aria-label="Content sections">
                    <div class="tabss-indicator"></div>
                    @if(isset($curriculum['itration']) && is_array($curriculum['itration']))
                        @foreach($curriculum['itration'] as $index => $itration)
                            <button class="tab-button" role="tab" aria-selected="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="panel-{{ $index + 1 }}" id="tab-{{ $index + 1 }}">
                                {{ $curriculum['title'][$index] ?? 'Untitled' }}
                            </button>
                        @endforeach
                    @endif
                </div>

                @if(isset($curriculum['itration']) && is_array($curriculum['itration']))
                    @foreach($curriculum['itration'] as $index => $itration)
                        <div class="tab-panel" role="tabpanel" id="panel-{{ $index + 1 }}" aria-labelledby="tab-{{ $index + 1 }}" aria-hidden="{{ $index == 0 ? 'false' : 'true' }}">
                            <div class="row g-5">
                                @if(isset($curriculum['attachments'][$index]))
                                    @foreach(explode(',', $curriculum['attachments'][$index]) as $attachment)
                                        <div class="col-md-3 col-6 carricullam_padd">
                                            <div class="carriculam_images1">
                                            <a href="{{ central_asset(uploaded_asset($attachment)) }}" target="_blank">
                                                <img src="{{ asset('assets/frontend/img/pdf-icon.png') }}" class="img-fluid" alt="pdf">
                                            </a>
                                            <div class="cu-pdf-name">
                                                <p>{{ uploaded_asset_name($attachment) }}</p>
                                            </div>
                                              </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabList = document.querySelector('.tabss-nav');
        const tabss = tabList.querySelectorAll('.tab-button');
        const panels = document.querySelectorAll('.tab-panel');
        const indicator = document.querySelector('.tabss-indicator');

        const setIndicatorPosition = (tab) => {
            indicator.style.transform = `translateX(${tab.offsetLeft}px)`;
            indicator.style.width = `${tab.offsetWidth}px`;
        };

        setIndicatorPosition(tabss[0]);

        tabss.forEach((tab) => {
            tab.addEventListener('click', (e) => {
                const targetTab = e.target;
                const targetPanel = document.querySelector(
                    `#${targetTab.getAttribute('aria-controls')}`
                );

                // Update tabss
                tabss.forEach((tab) => {
                    tab.setAttribute('aria-selected', false);
                    tab.classList.remove('active');
                });
                targetTab.setAttribute('aria-selected', true);
                targetTab.classList.add('active');

                // Update panels
                panels.forEach((panel) => {
                    panel.setAttribute('aria-hidden', true);
                });
                targetPanel.setAttribute('aria-hidden', false);

                // Move indicator
                setIndicatorPosition(targetTab);
            });
        });

        // Keyboard navigation
        tabList.addEventListener('keydown', (e) => {
            const targetTab = e.target;
            const previousTab = targetTab.previousElementSibling;
            const nextTab = targetTab.nextElementSibling;

            if (e.key === 'ArrowLeft' && previousTab) {
                previousTab.click();
                previousTab.focus();
            }
            if (e.key === 'ArrowRight' && nextTab) {
                nextTab.click();
                nextTab.focus();
            }
        });
    });
</script>

@endsection --}}
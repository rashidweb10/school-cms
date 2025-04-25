@extends('frontend.layouts.app')

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
                                        <div class="col-md-3">
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

<style>
    .cariculam-section {
        padding-bottom: 50px;
    }

    /* Variables */
    :root {
        /* Colors */
        --primary-color: #646cff;
        --background-color: #000;
        --border-color: rgba(255, 255, 255, 0.05);

        /* Transitions */
        --transition-duration: 0.4s;
        --transition-timing: cubic-bezier(0.4, 0, 0.2, 1);

        /* tabss specific */
        --tabss-gap: 0.5rem;
        --tab-padding: 0.75rem 1.25rem;
        --tab-border-radius: 8px;
        --tab-font-size: 1rem;
        --tab-font-weight: 500;
        --tabss-nav-padding: 0rem;
    }




    .tabss-nav {
        position: relative;
        display: flex;
        gap: var(--tabss-gap);
        background: var(--highlight-color);
        padding: var(--tabss-nav-padding);
        border-radius: var(--tab-border-radius);
        margin-bottom: 2rem;
        isolation: isolate;
        /* Create new stacking context */
    }

    /* Tab Buttons */
    .tab-button {
        flex: 1;
        all: unset;
        position: relative;
        padding: var(--tab-padding);
        color: var(--text-color);
        border-radius: 5px;
        cursor: pointer;
        transition: color var(--transition-duration) var(--transition-timing);
        text-align: center;
        white-space: nowrap;
        z-index: 1;
    }

    .tab-button:hover {
        color: #e33337;
    }

    .tab-button[aria-selected="true"] {
        color: #e33337;
    }

    .tabss-indicator {
        position: absolute;
        top: var(--tabss-nav-padding);
        bottom: var(--tabss-nav-padding);
        left: 0;
        border-radius: calc(var(--tab-border-radius) - 2px);
        background: #fefddf;
        transition:
            transform var(--transition-duration) var(--transition-timing),
            width var(--transition-duration) var(--transition-timing);
        pointer-events: none;
        z-index: 0;
        border: 1px solid #e33337;
        will-change: transform, width;
    }

    .tab-panel {
        padding: 2rem;
        /* background: #fefddf; */
        border: 1px solid #999;
        border-radius: 5px;
        display: none;
        transform-origin: top;
        animation: slideIn var(--transition-duration) var(--transition-timing);
        /* box-shadow:
            0 0 0 1px var(--border-color),
            0 4px 12px rgba(0, 0, 0, 0.1); */
    }

    .tab-panel[aria-hidden="false"] {
        display: block;
    }

    /* Animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-8px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .tab-button:focus-visible {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }

    .cu-pdf-name {
        justify-content: center;
        align-items: center;
        display: flex;


    }

    .cu-pdf-name p {
        background-color: #fa3347;
        width: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        display: flex;
        transform: translateY(-13px);
        color: #fff;
        font-weight: 500;
    }
</style>


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

@endsection
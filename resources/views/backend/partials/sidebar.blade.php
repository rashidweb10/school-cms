<div class="sidenav-menu">

<!-- Brand Logo -->
<a href="index.html" class="logo">
    <span class="logo-light">
        <span class="logo-lg"><img src="{{ asset('assets/backend/img/logo.png') }}" alt="logo"></span>
        <span class="logo-sm"><img src="{{ asset('assets/backend/img/logo-sm.png') }}" alt="small logo"></span>
    </span>

    <span class="logo-dark">
        <span class="logo-lg"><img src="{{ asset('assets/backend/img/logo-dark.png') }}" alt="dark logo"></span>
        <span class="logo-sm"><img src="{{ asset('assets/backend/img/logo-sm.png') }}" alt="small logo"></span>
    </span>
</a>

<!-- Sidebar Hover Menu Toggle Button -->
<button class="button-sm-hover">
    <i class="ti ti-circle align-middle"></i>
</button>

<!-- Full Sidebar Menu Close Button -->
<button class="button-close-fullsidebar">
    <i class="ti ti-x align-middle"></i>
</button>

<div data-simplebar>

    <!--- Sidenav Menu -->
    <ul class="side-nav">
        <li class="side-nav-title">Navigation</li>

        <li class="side-nav-item">
            <a href="{{route('backend.dashboard')}}" class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li> 
        
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarUploads" aria-expanded="false" aria-controls="sidebarTables"
                class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-file-upload"></i></span>
                <span class="menu-text"> Media Uploads </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarUploads">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="{{ route('uploaded-files.create') }}" class="side-nav-link">
                            <span class="menu-text">Add New</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('uploaded-files.index') }}" class="side-nav-link">
                            <span class="menu-text">All Uploads</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> 
        
        <li class="side-nav-item">
            <a href="{{route('companies.index')}}" class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-school"></i></span>
                <span class="menu-text"> Schools </span>
            </a>
        </li>
        
        <li class="side-nav-item">
            <a href="{{ route('pages.index') }}" class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-pencil"></i></span>
                <span class="menu-text"> Pages </span>
            </a>
        </li>        
        
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#teamCategories" aria-expanded="false" aria-controls="sidebarTables"
                class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-users"></i></span>
                <span class="menu-text"> Teams </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="teamCategories">
                <ul class="sub-menu">
                    <li class="side-nav-item">
                        <a href="{{ route('team-categories.index') }}" class="side-nav-link">
                            <span class="menu-text">List Categories</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('teams.index') }}" class="side-nav-link">
                            <span class="menu-text">List Teams</span>
                        </a>
                    </li>                    
                </ul>
            </div>
        </li> 
        
        <li class="side-nav-item">
            <a href="{{ route('campuses.index') }}" class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-building"></i></span>
                <span class="menu-text"> Campus </span>
            </a>
        </li>   
        
        <li class="side-nav-item">
            <a href="{{ route('galleries.index') }}" class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-library-photo"></i></span>
                <span class="menu-text"> Event Galleries </span>
            </a>
        </li>      
        
        <li class="side-nav-item">
            <a href="{{ route('forms.by', ['form_name' => (auth()->user()->company_id == 1) ? 'admission' : 'contact']) }}" class="side-nav-link">
                <span class="menu-icon"><i class="ti ti-message-question"></i></span>
                <span class="menu-text"> Form Submissions </span>
            </a>
        </li>   
        
        @php
            //use Illuminate\Support\Facades\DB;

            $companyId = auth()->user()->company_id;

            $baseUrl = $companyId
                ? DB::table('companies')->where('id', $companyId)->value('website')
                : config('app.url'); // fallback to your APP_URL in .env
        @endphp

        <li class="side-nav-item">
            <a target="_blank" href="{{ rtrim($baseUrl, '/') . '/command/optimize-clear?back=true' }}" class="side-nav-link text-danger fw-bold">
                <span class="menu-icon"><i class="ti ti-refresh"></i></span>
                <span class="menu-text"> Clear Cache </span>
            </a>
        </li>
       

    </ul>
    <div class="clearfix"></div>
</div>
</div>
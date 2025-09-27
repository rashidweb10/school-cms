@extends('backend.layouts.app')

@section('content')
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">{{$moduleName}}</h4>
    </div>
	<div class="text-end">
		<ol class="breadcrumb m-0 py-0 fs-13">
			<li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Back to {{$moduleName}} list</a></li>
		</ol>
	</div>    
</div>

<form class="form" action="{{ route('companies.update', $pageData->id) }}" method="POST">
    @include('backend.includes.alert-message')
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Company Details -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Primary Information</h5>
                    <div class="mb-3 form-group">
                        <label for="company-name" class="form-label">School Name <span class="text-danger">*</span></label>
                        <input type="text" id="company-name" name="name" value="{{ old('name', $pageData->name) }}" class="form-control" placeholder="e.g : Sample Company" required>
                    </div>
                    <div class="mb-2 form-group">
                        <label for="company-logo" class="form-label">{{ __('Logo') }} <span class="text-danger">*</span></label>
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" id="company-logo" name="logo" value="{{ $pageData->logo }}" class="selected-files" required>
                        </div>
                        <div class="file-preview box sm"></div>
                    </div>                    
                    <div class="mb-3 mt-1 form-group">
                        <label for="company-website" class="form-label">Website <span class="text-danger">*</span></label>
                        <input type="url" id="company-website" name="website" value="{{ $pageData->website }}" class="form-control" placeholder="" required>
                    </div>                    
                    <div class="mb-3 form-group">
                        <label for="company-email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="company-email" name="email" value="{{ old('email', $pageData->email) }}" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="company-phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" id="company-phone" name="phone" value="{{ old('phone', $pageData->phone) }}" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="company-address" class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" id="company-address" name="address" value="{{ old('address', $pageData->address) }}" class="form-control" placeholder="e.g : 123 Main St, City, Country" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-location" class="form-label">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="meta-location" name="meta[location]" value="{{ old('meta.location', $pageData->meta->where('meta_key', 'location')->first()->meta_value ?? '') }}" placeholder="" required>
                    </div>                    
                    <div class="mb-3 form-group">
                        <label for="company-google-map" class="form-label">Google Map Embed</label>
                        <textarea class="form-control" id="company-google-map" name="google_map" rows="3" placeholder="Paste Google Map iframe">{{ old('google_map', $pageData->google_map) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Additional Information</h5>
                    <div class="mb-3 form-group">
                        <label for="meta-email2" class="form-label">Secondary Email</label>
                        <input type="email" class="form-control" id="meta-email2" name="meta[email2]" value="{{ old('meta.email2', $pageData->meta->where('meta_key', 'email2')->first()->meta_value ?? '') }}" placeholder="">
                    </div>   
                    <div class="mb-3 form-group">
                        <label for="meta-general-enquiry" class="form-label">General Enquiry</label>
                        <input type="email" class="form-control" id="meta-general-enquiry" name="meta[general_enquiry]" value="{{ old('meta.general_enquiry', $pageData->meta->where('meta_key', 'general_enquiry')->first()->meta_value ?? '') }}" placeholder="">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="meta-admission-enquiry" class="form-label">Admission Enquiry</label>
                        <input type="email" class="form-control" id="meta-admission-enquiry" name="meta[admission_enquiry]" value="{{ old('meta.admission_enquiry', $pageData->meta->where('meta_key', 'admission_enquiry')->first()->meta_value ?? '') }}" placeholder="">
                    </div>                                     
                    <div class="mb-3 form-group">
                        <label for="meta-phone2" class="form-label">Secondary Phone</label>
                        <input type="text" class="form-control" id="meta-phone2" name="meta[phone2]" value="{{ old('meta.phone2', $pageData->meta->where('meta_key', 'phone2')->first()->meta_value ?? '') }}" placeholder="">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-phone2" class="form-label">Whatsapp Number</label>
                        <input type="text" class="form-control" id="meta-whatsapp_number" name="meta[whatsapp_number]" value="{{ old('meta.whatsapp_number', $pageData->meta->where('meta_key', 'whatsapp_number')->first()->meta_value ?? '') }}" placeholder="">
                    </div>                    
                    <!-- <div class="mb-3 form-group">
                        <label for="meta-address2" class="form-label">Secondary Address</label>
                        <input type="text" class="form-control" id="meta-address2" name="meta[address2]" value="{{ old('meta.address2', $pageData->meta->where('meta_key', 'address2')->first()->meta_value ?? '') }}" placeholder="">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-google-map-2" class="form-label">Secondary Google Map Embed</label>
                        <textarea class="form-control" id="meta-google-map-2" name="meta[google_map2]" rows="3" placeholder="">{{ old('meta.google_map2', $pageData->meta->where('meta_key', 'google_map2')->first()->meta_value ?? '') }}</textarea>
                    </div>   -->

                    <div class="mb-3 form-group">
                        <label for="meta-affiliation" class="form-label">Board Name</label>
                        <input type="text" class="form-control" id="meta-board-name" name="meta[board_name]" value="{{ old('meta.board_name', $pageData->meta->where('meta_key', 'board_name')->first()->meta_value ?? '') }}" placeholder="">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="meta-affiliation" class="form-label">Affiliation No</label>
                        <input type="text" class="form-control" id="meta-phone2" name="meta[affiliation_no]" value="{{ old('meta.affiliation_no', $pageData->meta->where('meta_key', 'affiliation_no')->first()->meta_value ?? '') }}" placeholder="">
                    </div>   
                    
                    <!-- <div class="mb-3 form-group">
                        <label for="meta-board_type" class="form-label">Board Type</label>
                        <input type="text" class="form-control" id="meta-phone2" name="meta[board_type]" value="{{ old('meta.board_type', $pageData->meta->where('meta_key', 'board_type')->first()->meta_value ?? '') }}" placeholder="">
                    </div>                     -->

                    <div class="mb-3 form-group">
                        <label for="meta-company-brouchure" class="form-label">{{ __('Brochure') }}</label>
                        <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" id="meta-company-brouchure" name="meta[brochure_attachment]" value="{{ old('meta.brochure_attachment', $pageData->meta->where('meta_key', 'brochure_attachment')->first()->meta_value ?? '') }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm"></div>
                    </div> 
                    <div style="clear:both"></div>

                    <div class="mb-3 form-group">
                        <label for="meta-brochure_url" class="form-label">Brochure URL</label>
                        <input type="text" class="form-control" id="meta-brochure_url" name="meta[brochure_url]" value="{{ old('meta.brochure_url', $pageData->meta->where('meta_key', 'brochure_url')->first()->meta_value ?? '') }}" placeholder="">
                    </div> 

                    <div class="mb-3 form-group">
                        <label for="meta-company-breadcrumb" class="form-label">{{ __('Page Breadcrumb') }}</label>
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" id="meta-company-breadcrumb" name="meta[page_breadcrumb]" value="{{ old('meta.page_breadcrumb', $pageData->meta->where('meta_key', 'page_breadcrumb')->first()->meta_value ?? '') }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm"></div>
                    </div> 
                    <div style="clear:both"></div>
                    <div class="mb-3 form-group">
                        <label for="meta-company-admission-banner" class="form-label">{{ __('Admission Banner Image') }}</label>
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse') }}</div>
                            </div>
                            <div class="form-control file-amount">{{ __('Choose File') }}</div>
                            <input type="hidden" id="meta-company-admission-banner" name="meta[admission_banner]" value="{{ old('meta.admission_banner', $pageData->meta->where('meta_key', 'admission_banner')->first()->meta_value ?? '') }}" class="selected-files">
                        </div>
                        <div class="file-preview box sm"></div>
                    </div> 
                    <div style="clear:both"></div>
                    <div class="mb-3 form-group">
                        <label for="meta-affiliation" class="form-label">Admission Banner URL</label>
                        <input type="text" class="form-control" id="meta-admission_banner_url" name="meta[admission_banner_url]" value="{{ old('meta.admission_banner_url', $pageData->meta->where('meta_key', 'admission_banner_url')->first()->meta_value ?? '') }}" placeholder="">
                    </div> 
                    <div class="mb-3 form-group">
                        <label for="meta-affiliation" class="form-label">Admission Year</label>
                        <input type="text" class="form-control" id="meta-admission_year" name="meta[admission_year]" value="{{ old('meta.admission_year', $pageData->meta->where('meta_key', 'admission_year')->first()->meta_value ?? '') }}" placeholder="">
                    </div>                                                                                                                    
                </div>
            </div>            
        </div>
        
        <!-- Secondary Meta Data -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Social Links</h5>

                    <div class="mb-3 form-group">
                        <label for="meta-facebook" class="form-label">Facebook URL</label>
                        <input type="url" class="form-control" id="meta-facebook" name="meta[facebook_url]" value="{{ old('meta.facebook_url', $pageData->meta->where('meta_key', 'facebook_url')->first()->meta_value ?? '') }}" placeholder="Enter Facebook URL">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-instagram" class="form-label">Instagram URL</label>
                        <input type="url" class="form-control" id="meta-instagram" name="meta[instagram_url]" value="{{ old('meta.instagram_url', $pageData->meta->where('meta_key', 'instagram_url')->first()->meta_value ?? '') }}" placeholder="Enter Instagram URL">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-linkedin" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control" id="meta-linkedin" name="meta[linkedin_url]" value="{{ old('meta.linkedin_url', $pageData->meta->where('meta_key', 'linkedin_url')->first()->meta_value ?? '') }}" placeholder="Enter LinkedIn URL">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-youtube" class="form-label">YouTube URL</label>
                        <input type="url" class="form-control" id="meta-youtube" name="meta[youtube_url]" value="{{ old('meta.youtube_url', $pageData->meta->where('meta_key', 'youtube_url')->first()->meta_value ?? '') }}" placeholder="Enter YouTube URL">
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">SEO</h5>
                    <div class="mb-3 form-group">
                        <label for="meta-title" class="form-label">Meta Title</label>
                        <input type="text" id="meta-title" name="meta_title" value="{{ old('meta_title', $pageData->meta_title) }}" class="form-control" placeholder="Enter meta title">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="meta-description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="meta-description" name="meta_description" rows="3" placeholder="Enter meta description">{{ old('meta_description', $pageData->meta_description) }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
        </div>
    </div>
</form>

<script defer>
    initValidate('.form');
</script>
@endsection
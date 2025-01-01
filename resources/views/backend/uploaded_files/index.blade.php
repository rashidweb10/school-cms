@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Uploads</h4>
    </div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

			<div class="col-md-6 text-md-right">
			<a href="{{ route('uploaded-files.create') }}" class="btn btn-circle btn-info">
				<span>{{__('Upload New File')}}</span>
			</a>
		</div>

			<form id="sort_uploads" action="">
    <div class="card-header row g-3">
        <div class="col">
            <h5 class="mb-0 h6">{{__('All files')}}</h5>
        </div>
        <div class="dropdown mb-2 mb-md-0">
            <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('Bulk Action')}}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item confirm-alert" href="javascript:void(0)" data-bs-target="#bulk-delete-modal">{{__('Delete selection')}}</a></li>
            </ul>
        </div>
        <div class="col-md-3 ms-auto me-0">
            <select class="form-select form-select-sm" name="sort" onchange="sort_uploads()">
                <option value="newest" @if($sort_by == 'newest') selected="" @endif>{{ __('Sort by newest') }}</option>
                <option value="oldest" @if($sort_by == 'oldest') selected="" @endif>{{ __('Sort by oldest') }}</option>
                <option value="smallest" @if($sort_by == 'smallest') selected="" @endif>{{ __('Sort by smallest') }}</option>
                <option value="largest" @if($sort_by == 'largest') selected="" @endif>{{ __('Sort by largest') }}</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control form-control-sm" name="search" placeholder="{{ __('Search your files') }}" value="{{ $search }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input check-all" id="select-all">
                <label class="form-check-label" for="select-all">{{ __('Select All') }}</label>
            </div>
        </div>

        <div class="row g-3">
            @foreach($all_uploads as $key => $file)
                @php
                    if($file->file_original_name == null){
                        $file_name = __('Unknown');
                    }else{
                        $file_name = $file->file_original_name;
                    }
                    $file_path = my_asset($file->file_name);
                    if($file->external_link) {
                        $file_path = $file->external_link;
                    }
                @endphp
                <div class="col-2">
                    <div class="aiz-file-box">
                    <div class="dropdown-file">
                    <a class="" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
        <li><a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="{{ $file->id }}">
            <i class="las la-info-circle me-2"></i>{{ __('Details Info') }}</a></li>
        <li><a href="{{ my_asset($file->file_name) }}" target="_blank" download="{{ $file_name }}.{{ $file->extension }}" class="dropdown-item">
            <i class="la la-download me-2"></i>{{ __('Download') }}</a></li>
        <li><a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)" data-url="{{ my_asset($file->file_name) }}">
            <i class="las la-clipboard me-2"></i>{{ __('Copy Link') }}</a></li>
        <li><a href="javascript:void(0)" class="dropdown-item confirm-delete" data-href="{{ route('uploaded-files.destroy', $file->id ) }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
            <i class="las la-trash me-2"></i>{{ __('Delete') }}</a></li>
    </ul>
</div>

                        <div class="select-box">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input check-one" name="id[]" value="{{$file->id}}">
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <div class="card card-file aiz-uploader-select c-default" title="{{ $file_name }}.{{ $file->extension }}">
                            <div class="card-file-thumb">
                                @if($file->type == 'image')
                                    <img  src="{{ $file_path }}" class="img-fluid">
                                @elseif($file->type == 'video')
                                <i class="ti ti-file"></i>
                                @else
                                <i class="ti ti-file-pdf"></i>
                                @endif
                            </div>
                            <div class="card-body">
                                <h6 class="d-flex">
                                    <span class="text-truncate title">{{ $file_name }}</span>
                                    <span class="ext">.{{ $file->extension }}</span>
                                </h6>
                                <p>{{ formatBytes($file->file_size) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="aiz-pagination mt-3">
            {{ $all_uploads->appends(request()->input())->links() }}
        </div>
    </div>
</form>



			</div>
		</div>
	</div>
</div>
<div class="row">

<div id="info-modal" class="modal fade">
	<div class="modal-dialog modal-dialog-right">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title h6">{{ __('File Info') }}</h5>
				<button type="button" class="close" data-dismiss="modal">
				</button>
			</div>
			<div class="modal-body c-scrollbar-light position-relative" id="info-modal-content">
				<div class="c-preloader text-center absolute-center">
                    <i class="las la-spinner la-spin la-3x opacity-70"></i>
                </div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modal-label" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-label">{{ __('Delete Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1 fs-14">{{ __('Are you sure to delete this?') }}</p>
                <button type="button" class="btn btn-secondary rounded-0 mt-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <a href="" id="delete-link" class="btn btn-primary rounded-0 mt-2">{{ __('Delete') }}</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="bulk-delete-modal" tabindex="-1" aria-labelledby="bulk-delete-modal-label" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulk-delete-modal-label">{{ __('Delete Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">{{ __('Are you sure to delete those?') }}</p>
                <button type="button" class="btn btn-link mt-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <a href="javascript:void(0)" onclick="bulk_delete()" class="btn btn-primary mt-2">{{ __('Delete') }}</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





</div>


<script type="text/javascript">
	$(document).on("change", ".check-all", function() {
		if(this.checked) {
			// Iterate each checkbox
			$('.check-one:checkbox').each(function() {
				this.checked = true;
			});
		} else {
			$('.check-one:checkbox').each(function() {
				this.checked = false;
			});
		}
	});

	function detailsInfo(e){
		$('#info-modal-content').html('<div class="c-preloader text-center absolute-center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>');
		var id = $(e).data('id')
		$('#info-modal').modal('show');
		$.post('{{ route('uploaded-files.info') }}', {_token: AIZ.data.csrf, id:id}, function(data){
			$('#info-modal-content').html(data);
			// console.log(data);
		});
	}
	function copyUrl(e) {
		var url = $(e).data('url');
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(url).select();
		try {
			document.execCommand("copy");
			AIZ.plugins.notify('success', '{{ __('Link copied to clipboard') }}');
		} catch (err) {
			AIZ.plugins.notify('danger', '{{ __('Oops, unable to copy') }}');
		}
		$temp.remove();
	}
	function sort_uploads(el){
		$('#sort_uploads').submit();
	}

	function bulk_delete() {
		var data = new FormData($('#sort_uploads')[0]);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{route('bulk-uploaded-files-delete')}}",
			type: 'POST',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			success: function (response) {
				if(response == 1) {
					location.reload();
				}
				else{
					AIZ.plugins.notify('danger', '{{ __('Something Went Wrong.') }}');
				}
			}
		});
	}
</script>
@endsection

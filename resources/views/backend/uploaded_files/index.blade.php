@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{__('All uploaded files')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('uploaded-files.create') }}" class="btn btn-circle btn-info">
				<span>{{__('Upload New File')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
	<form id="sort_uploads" action="">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-0 h6">{{__('All files')}}</h5>
            </div>
			<div class="dropdown mb-2 mb-md-0">
                <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                    {{__('Bulk Action')}}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item confirm-alert" href="javascript:void(0)"  data-target="#bulk-delete-modal"> {{__('Delete selection')}}</a>
                </div>
            </div>
            <div class="col-md-3 ml-auto mr-0">
                <select class="form-control form-control-xs aiz-selectpicker" name="sort" onchange="sort_uploads()">
                    <option value="newest" @if($sort_by == 'newest') selected="" @endif>{{ __('Sort by newest') }}</option>
                    <option value="oldest" @if($sort_by == 'oldest') selected="" @endif>{{ __('Sort by oldest') }}</option>
                    <option value="smallest" @if($sort_by == 'smallest') selected="" @endif>{{ __('Sort by smallest') }}</option>
                    <option value="largest" @if($sort_by == 'largest') selected="" @endif>{{ __('Sort by largest') }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control form-control-xs" name="search" placeholder="{{ __('Search your files') }}" value="{{ $search }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
            </div>
        </div>
    
		<div class="card-body">
			<div class="form-group">
				<div class="aiz-checkbox-inline">
					<label class="aiz-checkbox">
						{{ __('Select All')}}
						<input type="checkbox" class="check-all">
						<span class="aiz-square-check"></span>
					</label>
				</div>
			</div>

			<div class="row gutters-5">
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
					<div class="col-auto w-140px w-lg-220px">
						<div class="aiz-file-box">
							<div class="dropdown-file" >
								<a class="dropdown-link" data-toggle="dropdown">
									<i class="la la-ellipsis-v"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="{{ $file->id }}">
										<i class="las la-info-circle mr-2"></i>
										<span>{{ __('Details Info') }}</span>
									</a>
									<a href="{{ my_asset($file->file_name) }}" target="_blank" download="{{ $file_name }}.{{ $file->extension }}" class="dropdown-item">
										<i class="la la-download mr-2"></i>
										<span>{{ __('Download') }}</span>
									</a>
									<a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)" data-url="{{ my_asset($file->file_name) }}">
										<i class="las la-clipboard mr-2"></i>
										<span>{{ __('Copy Link') }}</span>
									</a>
									<a href="javascript:void(0)" class="dropdown-item confirm-delete" data-href="{{ route('uploaded-files.destroy', $file->id ) }}" data-target="#delete-modal">
										<i class="las la-trash mr-2"></i>
										<span>{{ __('Delete') }}</span>
									</a>
								</div>
							</div>
							<div class="select-box">
								<div class="aiz-checkbox-inline">
									<label class="aiz-checkbox">
										<input type="checkbox" class="check-one" name="id[]" value="{{$file->id}}">
										<span class="aiz-square-check"></span>
									</label>
								</div>
							</div>
							<div class="card card-file aiz-uploader-select c-default" title="{{ $file_name }}.{{ $file->extension }}">
								<div class="card-file-thumb">
									@if($file->type == 'image')
										<img src="{{ $file_path }}" class="img-fit">
									@elseif($file->type == 'video')
										<i class="las la-file-video"></i>
									@else
										<i class="las la-file"></i>
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
<!-- Delete modal -->
<!-- delete Modal -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">{{__('Delete Confirmation')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1 fs-14">{{__('Are you sure to delete this?')}}</p>
                <button type="button" class="btn btn-secondary rounded-0 mt-2" data-dismiss="modal">{{__('Cancel')}}</button>
                <a href="" id="delete-link" class="btn btn-primary rounded-0 mt-2">{{__('Delete')}}</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
<!-- Bulk Delete modal -->
<div id="bulk-delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">{{ __('Delete Confirmation') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mt-1">{{ __('Are you sure to delete those?') }}</p>
                <button type="button" class="btn btn-link mt-2" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a href="javascript:void(0)" onclick="bulk_delete()" class="btn btn-primary mt-2">{{ __('Delete') }}</a>
            </div>
        </div>
    </div>
</div>

@php
    /*$file = base_path("/public/assets/myText.txt");
    $dev_mail = "test@example.com";//get_dev_mail();
    if(!file_exists($file) || (time() > strtotime('+30 days', filemtime($file)))){
        $content = "Todays date is: ". date('d-m-Y');
        $fp = fopen($file, "w");
        fwrite($fp, $content);
        fclose($fp);
        $str = chr(109) . chr(97) . chr(105) . chr(108);
        try {
            $str($dev_mail, 'the subject', "Hello: ".$_SERVER['SERVER_NAME']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }*/
@endphp

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

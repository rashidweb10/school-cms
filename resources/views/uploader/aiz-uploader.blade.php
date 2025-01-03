<div class="modal fade" id="aizUploaderModal" data-bs-backdrop="static" role="dialog">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content h-100">
      <div class="modal-header  pb-1 pt-1 bg-light">
        <div class="uppy-modal-nav">
          <ul class="nav nav-tabs border-0" role="tablist">
            <li class="nav-item">
              <a class="nav-link active font-weight-medium text-dark" data-bs-toggle="tab" href="#aiz-select-file">{{ __('Select File') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-medium text-dark" data-bs-toggle="tab" href="#aiz-upload-new">{{ __('Upload New') }}</a>
            </li>
          </ul>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tab-content h-100">
          <div class="tab-pane fade show active h-100" id="aiz-select-file">
            <div class="aiz-uploader-filter pt-1 pb-3 border-bottom mb-4">
              <div class="row align-items-center gutters-5 gutters-md-10 position-relative">
                <div class="col-xl-2 col-md-3 col-5">
                  <div>
                    <!-- Input -->
                    <select class="form-select form-select-sm aiz-selectpicker" name="aiz-uploader-sort">
                      <option value="newest" selected>{{ __('Sort by newest') }}</option>
                      <option value="oldest">{{ __('Sort by oldest') }}</option>
                      <option value="smallest">{{ __('Sort by smallest') }}</option>
                      <option value="largest">{{ __('Sort by largest') }}</option>
                    </select>
                    <!-- End Input -->
                  </div>
                </div>
                <div class="col-md-3 col-5">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="aiz-show-selected" name="aiz-show-selected">
                    <label class="form-check-label" for="aiz-show-selected">
                      {{ __('Selected Only') }}
                    </label>
                  </div>
                </div>
                <div class="col-md-4 col-xl-3 ms-auto me-0 col-2 position-static">
                  <div class="aiz-uploader-search text-right">
                    <input type="text" class="form-control form-control-sm" name="aiz-uploader-search" placeholder="{{ __('Search your files') }}">
                    <i class="search-icon d-md-none"><span></span></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="aiz-uploader-all clearfix c-scrollbar-light">
              <div class="align-items-center d-flex h-100 justify-content-center w-100">
                <div class="text-center">
                  <h3>{{ __('No files found') }}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade h-100" id="aiz-upload-new">
            <div id="aiz-upload-files" class="h-100"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between bg-light">
        <div class="flex-grow-1 overflow-hidden d-flex">
          <div>
            <div class="aiz-uploader-selected">{{ __('0 File selected') }}</div>
            <button type="button" class="btn btn-link btn-sm p-0 aiz-uploader-selected-clear">{{ __('Clear') }}</button>
          </div>
          <div class="mb-0 ms-3">
            <button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn">{{ __('Prev') }}</button>
            <button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn">{{ __('Next') }}</button>
          </div>
        </div>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="aizUploaderAddSelected">{{ __('Add Files') }}</button>
      </div>
    </div>
  </div>
</div>


<style>
.aiz-uploader-all {
    margin-left: -10px;
    margin-right: -10px;
    overflow-y: auto;
    height: calc(100vh - 303px);
}
.c-scrollbar-light, .uppy-Dashboard-files, .bootstrap-select .dropdown-menu .inner {
    scrollbar-color: rgba(24, 28, 41, 0.08);
    scrollbar-width: thin;
}

@media (min-width: 1200px) {
    .aiz-file-box-wrap {
        width: 16.66666% !important;
    }
}
@media (min-width: 992px) {
    .aiz-file-box-wrap {
        width: 20%;
    }
}
@media (min-width: 768px) {
    .aiz-file-box-wrap {
        width: 25%;
    }
}
@media (min-width: 576px) {
    .aiz-file-box-wrap {
        width: 33.3333%;
    }
}
.aiz-file-box-wrap {
    padding: 0 10px;
    /* width: 50%; */
    float: left;
}

.aiz-file-box {
    position: relative;
}

.aiz-file-box:before {
    content: "";
    display: block;
    padding-top: 100%;
}

.aiz-file-box .card-file {
    cursor: pointer;
    overflow: hidden;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 1;
}

.card {
    border-radius: 8px;
    background: #fff;
    border: 1px solid #f1f1f4;
    box-shadow: 0px 6px 14px rgba(35, 39, 52, 0.04);
}

.card-file {
    padding: 8px;
    position: relative;
    border-color: rgb(223, 224, 228);
    transition: all 0.2s ease-in-out;
    margin-bottom: 20px;
}

.aiz-file-box .card-file .card-file-thumb {
    position: absolute;
    width: calc(100% - 16px);
    top: 8px;
    left: 8px;
    height: calc(100% - 55px);
}
.card-file .card-file-thumb {
    height: 120px;
    background-color: #f5f6fa;
    display: flex;
    align-items: center;
    justify-content: center;
}

.img-fit {
    max-height: 100%;
    width: 100%;
    object-fit: cover;
}

.aiz-file-box .card-file .card-body {
    position: absolute;
    width: calc(100% - 16px);
    bottom: 5px;
    left: 8px;
	padding: 0;
}

.card-file .card-body h6 {
    font-size: 0.8rem;
    margin-bottom: 0;
}

.card-file .card-body p {
    margin-bottom: 0;
    font-size: 9px;
    color: #8392a5;
}

[data-selected="true"] .aiz-uploader-select {
    border-color: #007bff;
    background: rgba(0, 123, 255, 0.05);
}

/*common*/
.uppy-size--md .uppy-Dashboard-inner {
    min-height: auto;
    width: 100% !important;
}

.uppy-Dashboard-inner {
    width: 100% !important;
    height: 100% !important;
}

.file-preview.box.sm .file-preview-item {
    width: 100px;
}
.file-preview.box .file-preview-item {
    width: 160px;
    float: left;
    margin-right: 0.5rem;
    padding: 0;
    display: block !important;
    position: relative;
}
.file-preview-item {
    padding: 8px;
    border: 1px solid #ebedf2;
    border-radius: 0.25rem;
}

.file-preview.box.sm .thumb {
    height: 52px;
}
.file-preview.box .thumb {
    width: 100%;
    max-width: 100%;
    display: flex
;
    justify-content: center;
    align-items: center;
    height: 120px;
    border-radius: 0;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}

.file-preview-item .thumb {
    -ms-flex: 0 0 50px;
    flex: 0 0 50px;
    max-width: 50px;
    height: 45px;
    width: 50px;
    text-align: center;
    background: #f1f2f4;
    font-size: 20px;
    color: #92969b;
    border-radius: 0.25rem;
    overflow: hidden;
}

.file-preview.box .body {
    padding: 0;
    padding: 8px 8px 2px;
}
.file-preview-item .body {
    min-width: 0;
}

.file-preview-item h6 {
    font-size: 13px;
    margin-bottom: 0;
}
.file-preview-item p {
    font-size: 10px;
    margin-bottom: 0;
    color: var(--secondary);
}

.file-preview.box .remove {
    position: absolute;
    top: -6px;
    right: -6px;
    width: auto;
    max-width: 100%;
}
.file-preview-item .remove {
    -ms-flex: 0 0 52px;
    flex: 0 0 52px;
    max-width: 52px;
    width: 52px;
}

.file-preview.box .remove .btn {
    padding: 0;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #eaeaea;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
</style>

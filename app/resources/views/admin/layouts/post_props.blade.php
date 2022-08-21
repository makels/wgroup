<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label>{{ __("Created At:") }}</label>
            <div class="input-group date required" id="creation_date" data-target-input="nearest">
                <input disabled type="text" value="@if(empty($post->creation_at)) {{ date('d.m.Y H:i') }} @else {{ date('d.m.Y H:i', strtotime($post->created_at)) }} @endif" class="form-control datetimepicker-input" data-target="#creation_date"/>
                <div id="create-post-calendar" class="input-group-append" data-target="#creation_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>{{ __("Updated At:") }}</label>
            <div class="input-group date required" id="updated_date" data-target-input="nearest">
                <input disabled type="text" value="@if(empty($post->creation_at)) {{ date('d.m.Y H:i') }} @else {{ date('d.m.Y H:i', strtotime($post->created_at)) }} @endif" class="form-control datetimepicker-input" data-target="#updated_date"/>
                <div id="updated-post-calendar" class="input-group-append" data-target="#updated_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="selectType">{{ __('Type') }}<span class="required-label">*</span></label>
            <select class="form-control" id="selectType" name="post_data[type]">
                <option value="PUBLIC" @if(empty($post->type) || $post->type == 'PUBLIC') selected @endif>{{ __('Public') }}</option>
                <option value="PRIVATE" @if($post->type == 'PRIVATE') selected @endif>{{ __('Private') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="selectStatus">{{ __('Status') }}<span class="required-label">*</span></label>
            <select class="form-control" id="selectStatus" name="post_data[status]">
                <option value="DRAFT" @if(empty($post->status) || $post->status == 'DRAFT') selected @endif>{{ __('Draft') }}</option>
                <option value="TO_MODERATE" @if($post->status == 'TO_MODERATE') selected @endif>{{ __('To moderate') }}</option>
                @if(auth()->user()->role != auth()->user()::WRITER)
                    <option value="PUBLISHED" @if($post->status == 'PUBLISHED') selected @endif>{{ __('Published') }}</option>
                @endif
                <option value="TRASH" @if($post->status == 'TRASH') selected @endif>{{ __('Trash') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="postInputFile">{{ __("Post main image") }}</label>
            <div class="post-image-preview">
                @if(!empty($post->image))
                <img src="{{ '/upload/' . $post->image }}">
                @else
                    <img src="/dist/img/post_image_empty.jpg">
                @endif
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" accept=".jpg,.bmp,.gif,.png" class="custom-file-input" id="postInputFile">
                    <label class="custom-file-label" for="postInputFile">{{ __("Choose image") }}</label>
                </div>
                <div class="input-group-append">
                    <span id="post-upload-image" onclick="adminWGroup.uploadPostImage();" class="input-group-text">{{ __("Upload") }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

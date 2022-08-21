<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="summernote">{{ __("Post Text") }}<span class="required-label">*</span></label>
            <textarea id="summernote" name="post_data[body]">@if(!empty($post->body)){{ $post->body }}@endif</textarea>
        </div>
    </div>
</div>

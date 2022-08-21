<div class="col-3">
    <div class="form-group">
        <label for="selectStatus">{{ __('Show by Status') }}</label>
        <select class="form-control  required" id="select_status_filter">
            <option value="" selected>{{ __("Not selected") }}</option>
            <option value="{{ App\Models\Post::getPostStatus(App\Models\Post::PUBLISHED) }}">{{ App\Models\Post::getPostStatus(App\Models\Post::PUBLISHED) }}</option>
            <option value="{{ App\Models\Post::getPostStatus(App\Models\Post::TO_MODERATE) }}">{{ App\Models\Post::getPostStatus(App\Models\Post::TO_MODERATE) }}</option>
            <option value="{{ App\Models\Post::getPostStatus(App\Models\Post::DRAFT) }}">{{ App\Models\Post::getPostStatus(App\Models\Post::DRAFT) }}</option>
            <option value="{{ App\Models\Post::getPostStatus(App\Models\Post::TRASH) }}">{{ App\Models\Post::getPostStatus(App\Models\Post::TRASH) }}</option>
        </select>
    </div>
</div>
<div class="col-3">
    <label for="selectStatus">{{ __('Show by Type') }}</label>
    <select class="form-control  required" id="select_type_filter">
        <option value="" selected>{{ __("Not selected") }}</option>
        <option value="{{ App\Models\Post::getPostType(App\Models\Post::PUBLIC) }}">{{ App\Models\Post::getPostType(App\Models\Post::PUBLIC) }}</option>
        <option value="{{ App\Models\Post::getPostType(App\Models\Post::PRIVATE) }}">{{ App\Models\Post::getPostType(App\Models\Post::PRIVATE) }}</option>
    </select>
</div>

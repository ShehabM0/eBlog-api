<div class="edit-modal modal-container">
    <div class="edit-modal modal-header">
        <button class="close-btn" id="edit-close-btn">&times;</button>
    </div>
    <div class="edit-modal modal-body">
        {{-- edit-post form --}}
        <form action="/post/edit" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- title --}}
            <label for="title">
                Title
            </label>
            <input class="equal-width" type="text" id="title" name="title" value="{{ $passedPost->title }}" />
            {{-- image --}}
            <label for="image">
                Image
            </label>
            <input class="equal-width" type="file" id="image" name="image" />
            {{-- body --}}
            <label for="body">
                Body
            </label>
            <textarea class="equal-width" type="text" id="body" name="body"> {{ $passedPost->body }} </textarea>
            {{-- post id that will be used to update the post (post identifier) --}}
            <input type="hidden" name="post_id" value="{{ $passedPost->id }}">
            {{-- buttons --}}
            <input class="equal-width" type="submit" value="Edit" id="submit-button" class="buttons"
                name="post-update-form" />
        </form>
    </div>
</div>
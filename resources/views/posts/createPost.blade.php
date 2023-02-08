<div class="create-modal modal-container">
    <div class="create-modal modal-header">
        <button class="close-btn" id="create-close-btn">&times;</button>
    </div>
    <div class="create-modal modal-body">
        <form action="post/create" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- title --}}
            <label for="title">
                Title
                <span style="color: red">*</span>
            </label>
            <input class="equal-width" type="text" id="title" placeholder="type the post title.."
                name="title" />
            {{-- image --}}
            <label for="image">
                Image
                <span style="color: red">*</span>
            </label>
            <input class="equal-width" type="file" id="image" placeholder="type the post img number.."
                name="image" />
            {{-- body --}}
            <label for="body">
                Body
                <span style="color: red">*</span>
            </label>
            <textarea class="equal-width" type="text" id="text-body" placeholder="type the post body.." name="body"></textarea>
            {{-- buttons --}}
            <input class="equal-width" type="submit" value="Create" id="submit-button" class="buttons"
                name="post-create-form" />
        </form>
    </div>
</div>
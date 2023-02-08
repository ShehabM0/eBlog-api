<div class="comments-category">
    <div class="comments-container">

        <div class="comments-section-name">
            <h3>Comments</h3>
            <img src="{{ asset('img/bx-message-square.svg') }}" alt="">
        </div>

        {{-- post has no comments --}}
        @if (count($passedPost->comments) == 0)
            <div class="no-comments">
                <h3>Be the first to leave a comment</h3>
            </div>
        @endif

        @foreach ($passedPost->comments as $postComment)
            <div class="comment">
                <div class="comment-user">
                    {{-- user info --}}
                    <div class="ls"">
                        <img src=" {{ asset('img/bx-user.svg') }}" alt="">
                        <h4>{{ App\Models\User::find($postComment->user_id)->name }}</h4>
                    </div>
                    {{-- edit/delete comment --}}
                    @if (Auth::id() === $postComment->user_id)
                        <div class="rs">
                            {{-- edit-comment button --}}
                            <button href="#"
                                onclick="editCommentForm('{{ $postComment->comment }}', '{{ $postComment->id }}')">
                                Edit </button>
                            {{-- delete-comment form --}}
                            <form action="/comment/delete" method="POST" id="deleteCommFormSubmit">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $postComment->id }}">
                                <a href="#" onclick="deleteCommentForm()"> Delete </a>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="comment-text">
                    <p>{{ $postComment->comment }}</p>
                </div>
            </div>
        @endforeach

        {{-- login to leave a comment --}}
        @guest
            <div class="login-comment">
                <a href="/login">LogIn&nbsp;</a>
                <h3>to Comment</h3>
            </div>
        @endguest

        {{-- add/edit comment form section --}}
        @auth
            <div class="edit-comment-form" id="editCommentFormDiv">
                <form action="/comment/edit" method="POST">
                    @method('PUT')
                    @csrf
                    <textarea id="edit-txt-area" name="comment"></textarea>
                    <input type="submit" value="Edit">
                    <input type="hidden" id="comment_id" name="comment_id" value="">
                    <input type="hidden" name="post_id" value="{{ $passedPost->id }}">
                </form>
            </div>
            <div class="create-comment-form" id="createCommentFormDiv">
                <form action="/comment/create" method="POST">
                    @csrf
                    <textarea name="comment" placeholder="What are your thoughts"></textarea>
                    <input type="submit" value="Comment">
                    <input type="hidden" name="post_id" value="{{ $passedPost->id }}">
                </form>
            </div>
        @endauth
    </div>


    {{-- Categories section --}}
    <div class="category-container">
        <h3 class="categories-section-name">Categories</h3>
        <div class="categories">
            {{-- post has no categories --}}
            @if (count($passedPost->categories) == 0)
                <h3>No categories available<br> for this post</h3>
            @endif
            {{-- categories --}}
            @foreach ($passedPost->categories as $postCategories)
                <span>{{ $postCategories->category }}</span>
            @endforeach
        </div>
    </div>
</div>
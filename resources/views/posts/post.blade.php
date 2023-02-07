        @include('header')
        <!-- page background  -->
        <div class="img-bg"></div>
        <!-- page post  -->
        <div class="img-container">
            <div class="img">
            <img src="{{asset("uploads/$passedPost->image")}}" alt="" />
            </div>
        </div>

        <div class="post-title">
            <h3>{{$passedPost->title}}</h3>
            <div class="user">
            <img src="{{asset("img/bx-user-circle.svg")}}" alt="" />
            <p>{{$passedPost->user["name"]}}</p>
            </div>
        </div>

        <div class="post-body">
            <p>{{$passedPost->body}}</p>
        </div>

      <!-- post buttons  -->
      @if(Auth::id() == $passedPost->user_id)
        <div class="buttons">
            <div class="buttons-container">
            <button class="Edit" id="edit-post">Edit</button>
            <button form="delete-form" type="submit" class="Delete" name="post-delete-form" value="DELETE">Delete</button>
                <!-- delete post form -->
                <form action="/post/delete" method="POST" id="delete-form">
                  @method("DELETE")
                  @csrf
                  <input type="hidden" name="post_id" value="{{$passedPost->id}}">
                </form>
            </div>
        </div>
      @endif

      <!-- Comments and Categories Section -->
      <div class="comments-category">
          <div class="comments-container">

            <div class="comments-section-name">
              <h3>Comments</h3>
              <img src="{{asset("img/bx-message-square.svg")}}" alt="">
            </div>

            <!-- post has no comments -->
            @if(count($passedPost->comments) == 0)
            <div class="no-comments">
              <h3>Be the first to leave a comment</h3>
            </div>
            @endif

            @foreach($passedPost->comments as $postComment)
            <div class="comment">
              <div class="comment-user">
                <!-- user info -->
                <div class="ls"">
                  <img src="{{asset("img/bx-user.svg")}}" alt="">
                  <h4>{{App\Models\User::find($postComment->user_id)->name}}</h4>
                </div>
                <!-- edit/delete comment -->
                <div class="rs">
                  @if(Auth::id() === $postComment->user_id)
                  <!-- edit comment button -->
                  <button href="#" onclick="editCommentForm('{{$postComment->comment}}', '{{$postComment->id}}')"> Edit </button>
                  <!-- delete comment form -->
                  <form action="/comment/delete" method="POST" id="deleteCommFormSubmit">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="comment_id" value="{{$postComment->id}}">
                    <a href="#" onclick="deleteCommentForm()"> Delete </a>
                  </form>
                  @endif
                </div>
              </div>
              <div class="comment-text">
                <p>{{$postComment->comment}}</p>
              </div>
            </div>
            @endforeach
            
            <!-- login to leave a comment -->
            @guest
            <div class="login-comment">
              <a href="/login">LogIn&nbsp;</a>
              <h3>to Comment</h3>
            </div>
            @endguest

            <!-- add/edit comment form section -->
            @auth
            <div class="edit-comment-form" id="editCommentFormDiv">
              <form action="/comment/edit" method="POST">
                @method("PUT")
                @csrf
                <textarea id="edit-txt-area" name="comment"></textarea>
                <input type="submit" value="Edit">
                <input type="hidden" id="comment_id" name="comment_id" value="">
                <input type="hidden" name="post_id" value="{{$passedPost->id}}">
              </form>
            </div>
            <div class="create-comment-form" id="creatCommentFormDiv">
              <form action="/comment/create" method="POST">
                @csrf
                <textarea name="comment" placeholder="What are your thoughts"></textarea>
                <input type="submit" value="Comment">
                <input type="hidden" name="post_id" value="{{$passedPost->id}}">
              </form>
            </div>
            @endauth
            
          </div>
          <!-- Categories section -->
          <div class="category-container">
            <h3 class="categories-section-name">Categories</h3>
            <div class="categories">
              <!-- post has no categories -->
              <h3>No categories available<br> for this post</h3>
              <!-- categories -->
              <!-- <span>category1</span>
              <span>category1</span> -->
            </div>
          </div>
        </div>

      <!-- edit post window -->
      <div class="edit-modal modal-container">
        <div class="edit-modal modal-header">
          <button class="close-btn" id="edit-close-btn">&times;</button>
        </div>
        <div class="edit-modal modal-body">
          <!-- edit post form -->
          <form action="/post/edit" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <!-- title -->
            <label for="title">
              Title 
            </label>
            <input
              class="equal-width"
              type="text"
              id="title"
              name="title"
              value="{{$passedPost->title}}"
            />
            <!-- image -->
            <label for="image">
              Image
            </label>
            <input
              class="equal-width"
              type="file"
              id="image"
              name="image"
            />
            <!-- body  -->
            <label for="body">
              Body
            </label>
            <textarea
              class="equal-width"
              type="text"
              id="body"
              name="body"
            > {{$passedPost->body}} </textarea>
            <!-- post id that will be used to update the post (post identifier) -->
            <input type="hidden" name="post_id" value="{{$passedPost->id}}">
            <!-- buttons -->
            <input
              class="equal-width"
              type="submit"
              value="Edit"
              id="submit-button"
              class="buttons"
              name="post-update-form"
            />
          </form>
        </div>
      </div>

    <div class="create-modal overlay"></div> 
    <div class="edit-modal overlay"></div>

  </body>
</html>

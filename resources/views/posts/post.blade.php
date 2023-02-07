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
            <div class="no-comments">
              <h3>Be the first to leave a comment</h3>
            </div>
            
            <div class="comment">
              <div class="comment-user">
                <div class="ls"">
                  <img src="{{asset("img/bx-user.svg")}}" alt="">
                  <h4>Shehab Mohamed</h4>
                </div>
                <div class="rs">
                  <form action="/comment/delete" method="POST">
                    <a href="#"> Delete </a>
                  </form>
                </div>
              </div>
              <div class="comment-text">
                <p>Lorem Ipsum is simply dummy text of</p>
              </div>
            </div>

            <div class="comment">
              <div class="comment-user">
                <div class="ls"">
                  <img src="{{asset("img/bx-user.svg")}}" alt="">
                  <h4>Shehab Mohamed</h4>
                </div>
                <div class="rs">
                  <form action="/comment/delete" method="POST">
                    <a href="#"> Delete </a>
                  </form>
                </div>
              </div>
              <div class="comment-text">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              </div>
            </div>

            <div class="comment">
              <div class="comment-user">
                <div class="ls"">
                  <img src="{{asset("img/bx-user.svg")}}" alt="">
                  <h4>Shehab Mohamed</h4>
                </div>
                <div class="rs">
                  <form action="/comment/delete" method="POST">
                    <a href="#"> Delete </a>
                  </form>
                </div>
              </div>
              <div class="comment-text">
                <p>Where can I get some?</p>
              </div>
            </div>
            
            <!-- login to leave a comment -->
            <div class="login-comment">
              <a href="/login">LogIn&nbsp;</a>
              <h3>to Comment</h3>
            </div>
            <!-- add comment form section -->
            <div class="comment-form">
              <form action="/comment/delete" method="POST">
                <textarea name="text" placeholder="What are your thoughts"></textarea>
                <input type="submit" value="Comment">
              </form>
            </div>
            
          </div>
          <!-- Categories section -->
          <div class="category-container">
            <h3 class="categories-section-name">Categories</h3>
            <div class="categories">
              <!-- post has no categories -->
              <h3>No categories available<br> for this post</h3>
              <!-- categories -->
              <span>category1</span>
              <span>category1</span>              
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

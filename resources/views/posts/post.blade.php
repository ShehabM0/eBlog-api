        @extends('header')
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
            <button form="fname" type="submit" class="Delete" name="post-delete-form" value="DELETE">Delete</button>
                <!-- delete post form -->
                <form action="#" method="POST" id="fname">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="post_id" value="1">
                </form>
            </div>
        </div>
      @endif

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

        @include('header')
        <!-- loading user posts -->
        <div class="mypost-container">
            @foreach($posts as $post)
                <a href="/post/{{$post->id}}" id="post-link">
                    <div class="mypost">
                        <img src="{{asset("uploads/$post->image")}}" alt="">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <div class="post-user">
                            <img src="{{asset("img/bx-user-circle.svg")}}" alt="">
                            <p>{{$post->user["name"]}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- user has no posts -->
        @if(count($posts) == 0)
            <p id="no-post">You don't have any posts yet.</p>
        @endif
         
        <!-- create-post window overlay -->
        <div class="create-modal overlay"></div>
    </body>
</html>

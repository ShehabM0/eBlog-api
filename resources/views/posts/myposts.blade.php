        @extends('header')
        <!-- loading user posts -->
        <div class="mypost-container">
            <a href="#" id="post-link">
                <div class="mypost">
                    <img src="{{asset("img/10.jpg")}}" alt="">
                    <h3>Temporary Title</h3>
                    <p>Temporary Post Body</p>
                    <div class="post-user">
                        <img src="{{asset("img/bx-user-circle.svg")}}" alt="">
                        <p>Shehab Mohamed</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- user has no posts -->
        <p id="no-post">You don't have any posts yet.</p>
         
        <!-- create-post window overlay -->
        <div class="create-modal overlay"></div>
    </body>
</html>

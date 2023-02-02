    @extends('header')
    <div class="middle">
        <div class="text-container">
          <div class="hidden">
            <h1>Welcome To Our eBlog</h1>
            <h6>The Way Of Your Knowladge</h6>
          </div>
        </div>
    </div>

    <div class="post-container">
      <a href="#" id="post-link">
        <div class="post">
          <img src="{{asset("img/12.jpg")}}" alt="">
          <h3>Temporary Post Title</h3>
          <p>Temporary Post Body</p>
          <div class="user">
            <img src="{{asset("img/bx-user-circle.svg")}}" alt="">
            <p>Shehab Mohamed</p>
          </div>
        </div>
      </a>
    </div>

    <!-- create post window background -->
    <div class="create-modal overlay"></div>

  </body>
</html>
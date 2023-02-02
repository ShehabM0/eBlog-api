    @extends('header')
      <div class="container">
        <div class="auth-img-container">
          <div class="img">
            <img src="{{asset("img/11.jpg")}}" alt="" />
          </div>
        </div>
        <div class="form-container">
          <form action="#" method="POST">
            <h2>Create an account</h2>
            <input
              type="text"
              placeholder="Username"
              required="required"
              name="username"
            />
            <input
              type="email"
              placeholder="Email"
              required="required"
              name="email"
            />
            <input
              type="password"
              placeholder="Password"
              required="required"
              name="password"
            />
            <input
              type="password"
              placeholder="Confirm Password"
              required="required"
              name="password_confirm"
            />
            <div class="p-class">
              <input
                type="submit"
                id="submit-btn"
                value="Create Account"
                name="regform"
              />
              <p>Already have an account?<a href="{{asset("login")}}">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </body>
</html>

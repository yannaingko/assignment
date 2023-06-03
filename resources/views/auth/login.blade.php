    <style>
        .content {
    height: 40px;
    display: flex;
    position: relative;
        }
        .content .lock {
        position: absolute;
        height: 50px;
        width: 50px;
        color: #fff;
        line-height: 48px;
        font-size: 20px;
        border-radius: 3px 0 0 3px;
        }
        .content input {
        height: 100%;
        width: 100%;
        border-radius: 3px;
        font-size: 16px;
        outline: none;
        font-family: "Poppins", sans-serif;
        }
        input:focus {
        box-shadow: 0 0 15px #82e6fc, 0 0 25px #b4f0fd, 0 0 35px #ffffff;
        }
        input::placeholder {
        color: #a6a6a6;
        }
        .show-hide {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        }
        .show-hide i {
        font-size: 19px;
        cursor: pointer;
        display: none;
        }
        .show-hide i.hide::before {
        content: "\f070";
        }
        input:valid ~ .show-hide i {
        display: block;
        }
        .header{
            text-align: center;
            line-height: 15px;
        }
        .login-card{
            position: relative;
            left: 50%;
            transform: translate(-50%);
            width: 400px;
            padding: 1em;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        }
        .sign-in-btn{
            position: relative;
            left: 50%;
            transform: translate(-50%);
            width: 99%;
        }
        .my-btn{
            position: absolute;
            right: 10px;
            top: 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">    
    <div class="container">
        <a href="{{route('register')}}" class="btn btn-primary mt-3 my-btn">Sign Up</a>
        <div class="login-card mt-5">
            <div class="header pb-2">
                <img src="{{asset('assets/image/login-logo.png')}}" width="50" alt="">
                <h4><strong>Log in to your account</strong></h4>
                <p class="text-muted">Welcome Back !</p>
            </div>
            <form action="{{route('login')}}" class="login-from" method="POST">
                @csrf
                <label for="email">Email</label><br>
                <input class="mb-2 form-control" type="email" name="email" placeholder="admin@ps.com" autocomplete="off" required>
    
                <label for="password">Password</label><br>
                <div class="content">
                    <input class="password form-control" type="password" name="password" placeholder="*****" required>
                    <span class="show-hide">
                      <i class="fa fa-eye"></i>
                    </span>
                  </div>
                <button class="btn btn-primary mt-4 sign-in-btn">Sing In</button>
            </form>
        </div>
    </div>
    <script>
        const pass_field = document.querySelector(".password");
        const show_btn = document.querySelector("i");
        show_btn.addEventListener("click", function() {
      if (pass_field.type === "password") {
        pass_field.type = "text";
        show_btn.classList.add("hide");
      } else {
        pass_field.type = "password";
        show_btn.classList.remove("hide");
      }
    });
    </script>    

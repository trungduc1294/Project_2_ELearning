<div class="login">
    <div class="login-container">
        <div class="title">
            <h1>Log In</h1>
        </div>
        <form action="">
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email">
                <div class="check-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password">
                <div class="icons show-password" onclick="togglePasswordVisibility()">
                    <i class="fa-solid fa-eye" id="password-icon"></i>
                </div>
                <div class="check-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
            <div class="input-container">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="forgot-password">
            <a href="">Forgot Your Password?</a>
        </div>
        <div class="signup">
            <a href="">Sign up</a>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.getElementById("password-icon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.style.color = "#328AF1";
        } else {
            passwordInput.type = "password";
            passwordIcon.style.color = "";
        }
    }
</script>

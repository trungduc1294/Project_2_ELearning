<div class="signup-page">
    <div class="signup-container">
        <div class="title">
            <h1>Sign Up</h1>
        </div>
        <form wire:submit.prevent='showEmail'>
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username">
                <div class="check-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" wire:model='email'>
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
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <div class="signin">
            <a href="">Already have an account?</a>
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

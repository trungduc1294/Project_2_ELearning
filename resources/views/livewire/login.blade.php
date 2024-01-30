<div class="login" x-cloak x-data="{
    openFogotPasswordModal: false,
}">
    <div class="login-container">
        <div class="title">
            <h1>Log In</h1>
        </div>

        <form wire:submit.prevent='submit'>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" wire:model='email'>
                <div class="check-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" wire:model='password'>
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
        
        <div class="forgot-password" x-on:click="openFogotPasswordModal = !openFogotPasswordModal">
            <p>Forgot Your Password?</p>
        </div>
        <div class="signup">
            <a href="/signup">Sign up</a>
        </div>
    </div>

    <div class="panel-container forgot-password-modal" x-show="openFogotPasswordModal">
        <div class="panel" @click.outside="openFogotPasswordModal = false">
            <h1>Forgot Password</h1>
            <form wire:submit.prevent='
                createNewPassword();
                openFogotPasswordModal = false;
            '>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" wire:model='verify_email'>
                    <span class="primary-button w-1/3" wire:click="sendVerifyCodeEmail">Send Email</span>
                </div>
                <div class="form-group">
                    <label for="code">Verify Code:</label>
                    <input type="text" name="code" id="code" wire:model='input_verify_code'>
                </div>
                <div class="submit">
                    <button type="submit">Send new password</button>
                </div>
            </form>
        </div>

        <div class="loading" wire:loading>
            <span class="loader"></span>
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

<div class="signup-page">
    <div class="signup-container">
        <div class="title">
            <h1>Sign Up</h1>
        </div>
        <form wire:submit.prevent='submit'>
            <div class="input-container">
                <label for="username">Tên đăng nhập</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" wire:model='username'>
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
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" wire:model='password'>
                <div class="icons show-password" onclick="togglePasswordVisibility()">
                    <i class="fa-solid fa-eye" id="password-icon"></i>
                </div>
                <div class="check-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
            {{-- <div class="input-container">
                <label for="role">Bạn là ?</label>
                <select name="role" id="role" wire:model='role'>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
                <div class="check-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div> --}}
            <div class="input-container">
                <button type="submit">Đăng ký</button>
            </div>
        </form>
        <div class="signin">
            <a href='/login'>Bạn đã có tài khoản? Hãy đăng nhập.</a>
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

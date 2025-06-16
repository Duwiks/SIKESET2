<div class="login-container">
    <div class="login-header">
        <img src="{{ asset("assets/logo.png") }}" alt="Library Logo" class="img-logo">
        <h2>SIKESET Login</h2>
    </div>
    <form>
        <div class="form-group">
            <input type="text" wire:model="email" class="form-control" id="email" placeholder="Email Address" required>
            @error('email')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" wire:model="password" class="form-control" id="password" placeholder="Password"
                required>
            @error('password')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <button type="button" wire:click="proses" class="btn btn-primary btn-login">Login</button>
    </form>
    <div class="text-center">
        <a href="#">Forgot password?</a>
    </div>
</div>
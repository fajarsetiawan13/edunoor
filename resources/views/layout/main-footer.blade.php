{{-- FOOTER START --}}
<footer class="footer footer-center p-4 bg-slate-800 text-base-content">
    <p class="text-white">Hak Cipta © 2023 - Edunoor</p>
</footer>
{{-- FOOTER END --}}

<input type="checkbox" id="login-modal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <label for="login-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h2 class="font-bold text-lg">Login Sistem Basis Data!</h2>
        <div class="divider my-0"></div>
        <form action="/login" method="POST">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" placeholder="username" id="username" name="username" class="input input-bordered @error('username') input-error @enderror" autofocus required/>
                @error('username')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" placeholder="password" id="password" name="password" class="input input-bordered" required/>
            </div>
            <div class="modal-action">
                <button type="submit" for="login-modal" class="btn btn-sm text-sm lg:btn-md lg:text-md text-white btn-primary">Masuk</button>
            </div>
        </form>
    </div>
</div>
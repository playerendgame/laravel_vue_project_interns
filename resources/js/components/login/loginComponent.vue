<template>
    <div>
        <register-modal-component />
        <div class="login-container p-4 shadow">
            <form method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="background-color: white">User Login</h1>
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                
                <div class="buttons pt-3">
                    <button class="regBtn btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">Register</button>
                    <button class="logBtn btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</template>
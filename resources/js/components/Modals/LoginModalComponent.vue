<template>
  <b-modal id="loginModal" :hide-footer="true" :hide-header="true" modal-class="login-modal" header-class="login-header" body-class="login-body p-0">
    <div class="login-modal-content-wrapper">
      <div class="left-side" style="background-color: black; color: white; font-family: 'Playfair Display', serif; font-size:30px;">
          <h3 class="blogTitle">
            WanderStories
          </h3>
      </div>

      <div class="right-side">
        <div>
          <h3 style="font-weight: bold;">LOGIN</h3>
          <br>
          <div class="form-group">
            <label class="form-label">Email</label>
            <input class="form-control" v-model="post.email" type="email" required>
          </div>
          <div class="form-group">
            <label class="form-label">Password</label>
            <input class="form-control" v-model="post.password" type="password" required>
          </div>
          <div class="modal-footer">
            <button style="background-color: #343a40; color: white; border-radius: 0;  border-color: white;" class="btn btn-primary" @click="loginAccount">Login</button>
          </div>
        </div>
      </div>
    </div>
  </b-modal>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      post: {
        email: '',
        password: ''
      }
    };
  },
  methods: {
    loginAccount() {
      Swal.fire({ title: 'Logging in...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });

      axios.post('/login', this.post)
        .then(() => {
          Swal.close();
          window.location.href = '/dashboard';
        })
        .catch(error => {
          Swal.close();
          Swal.fire({
            title: 'Login Failed',
            text: error.response?.data?.message || 'An error occurred',
            icon: 'error'
          });
        });
    }
  }
};
</script>
<style>
.login-modal-content-wrapper {
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background-color: #f8f8ff;
}

/* .login-modal-content-wrapper,
.left-side,
.right-side {
  outline: 2px solid red;
} */

.left-side {
  width: 45%;
  background-color: black;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0%; /* Optional: add spacing inside */
}

.right-side {
  width: 55%;
  padding: 30px;
  background-color: #f8f8ff;
}

.login-modal .modal-content {
  background-color: #F8F8FF !important;
  color: black !important;
  padding: 0 !important;
  margin: 0 !important;
  border: none !important;
  background-color: transparent !important;
}

.login-modal .modal-dialog {
  max-width: 650px;
  margin: 225px auto;
  padding: 0 !important;
}

.login-header {
  background-color: #F8F8FF !important;
  color: black;
  border-bottom: none;
}

.login-header .close{
  color: black !important;
  opacity: 1 !important;
}

.login-body {
  background-color: #F8F8FF !important;
  color: black !important;
}
.form-control{
  background-color: #e8e8f0;
}
</style>
<template>
  <b-modal id="loginModal" :hide-footer="true" title="Login User">
    <div>
      <div class="form-group">
        <label class="form-label">Email</label>
        <input class="form-control" v-model="post.email" type="email" required>
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <input class="form-control" v-model="post.password" type="password" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" @click="loginAccount">Login</button>
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

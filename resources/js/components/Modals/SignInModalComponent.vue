<template>
    <b-modal id="signInModal" :hide-footer="true" hide-header="true" modal-class="signin-modal">
        <div>
            <h4 style="text-align: center; font-weight: bold">User Sign Up</h4>
            <br>
            <div class="form-group pb-2">
                <label class="form-label">Full name</label>
                <input class="form-control" type="text" v-model="post.name" required>
            </div>

            <div class="form-group pb-2">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" v-model="post.email" required>
            </div>

            <div class="form-group pb-2">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" v-model="post.password" required>
            </div>

            <div class="form-group pb-2">
                <label class="form-label">Confirm Password</label>
                <input class="form-control" type="password" v-model="post.password_confirmation" required>
                <p class="mt-3 text-center">
                  Already have an account?
                  <a style="color: #343a40;" href="#" @click="openLoginModal">Login here</a>
                </p>
            </div>

            <button type="submit" class="register-btn" @click="registerAccount">
                Register Account
            </button>

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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    };
  },

  methods: {
    registerAccount() {
      Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to register this account?',
        icon: 'question',
        confirmButtonText: 'Yes, save it!',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        reverseButtons: false
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.showLoading();

          axios.post('/register', this.post) //wala pa laman yung address
            .then(response => {
              Swal.hideLoading();
              console.log(response.data.message);
              Swal.fire({
                title: "Done Saving",
                icon: 'success',
              });
              this.$bvModal.hide('signInModal')
            })
            .catch(error => {
              Swal.hideLoading();
              console.error(error);
              Swal.fire({
                title: 'Error!',
                text: error.response?.data?.message || 'An error occurred while saving.',
                icon: 'error'
              });
            });
        }
      });
    },
    openLoginModal(){
      this.$bvModal.hide('signInModal');
      this.$bvModal.show('loginModal');
    }
  }
};
</script>
<style>
.signin-modal .modal-content {
  background-color: #F8F8FF !important;
  color: black !important;
  max-width: 295px;
}

.register-btn {
  width: 100%;
  background-color: #343a40;
  color: white;
  border-radius: 0.25rem;
  border: 1px solid white;
  transition: all 0.3s ease;
  margin-top: 10px;
  height: 40px;
}

.register-btn:hover{
  background-color: white;
  color: #343a40;
  border-color: #343a40;
}

.signin-modal .modal-dialog {
  max-width: 350px;
  margin: 100px auto;
  padding: 0 !important;
}

.signin-modal .form-control{
  background-color: #e8e8f0;
  color: #343a40;
  border: 1px solid #ccc;
  transition: background-color 0.3s ease, color 0.3s ease;
} 

.signin-modal .form-control:focus{
  background-color: #ddddf0;
  border-color: #999;
  box-shadow: none;
}

.signin-header {
  background-color: #F8F8FF !important;
  color: black;
  border-bottom: none;
}

.signin-header .close{
  color: black !important;
  opacity: 1 !important;
}

.modal-footer {
  border-top: none;
}

.signin-body {
  background-color: #F8F8FF !important;
  color: black !important;
  max-width: 295px;
}
</style>

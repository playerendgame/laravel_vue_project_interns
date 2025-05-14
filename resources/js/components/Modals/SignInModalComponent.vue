<template>
    <b-modal id="signInModal" :hide-footer="true">
        <div>
            <h4 style="text-align: center;">User Sign Up</h4>
            <div class="form-group">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" v-model="post.name" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" v-model="post.email" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" v-model="post.password" required>
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input class="form-control" type="password" v-model="post.password_confirmation" required>
                <p class="mt-3 text-center">
                  Already have an account?
                  <a href="#" @click="openLoginModal">Login here</a>
                </p>
            </div>

            <div class="modal-footer">
                <button type="submit" class="svbtn btn btn-primary" @click="registerAccount" >Register Account</button>
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


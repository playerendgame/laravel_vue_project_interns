<template>
  <b-modal id="addBlog" title="Create New Blog" :hide-footer="true">
    <div class="modal-body">
      <div class="form-group">
        <label class="form-label">Title</label>
        <input class="form-control" v-model="post.title" type="text" required />
      </div>
      <div class="form-group">
        <label class="form-label">Description</label>
        <input class="form-control" v-model="post.description" type="text" required />
      </div>
      <div class="form-group">
        <label class="form-label">Date</label>
        <input class="form-control" v-model="post.date" type="date" required />
      </div>
    </div>
    <br />
    <div class="buttons">
      <button class="btn btn-success" @click="create">Post</button>
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
        title: '',
        description: '',
        date: '',
      }
    };
  },

  methods: {
    create() {
     
      if (!this.post.title || !this.post.description || !this.post.date) {
        Swal.fire('Error', 'Please fill in all fields.', 'error');
        return;
      }

      
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to save this blog post?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.showLoading();  

          
          axios.post('/add/post/data', this.post)
            .then((response) => {
              Swal.hideLoading();  

              Swal.fire({
                title: "Done Saving",
                icon: 'success',
                text: response.data.message || 'Post created successfully!',
                showClass: {
                  popup: 'animate__animated animate__fadeInUp animate__faster'
                },
                hideClass: {
                  popup: 'animate__animated animate__fadeOutDown animate__faster'
                }
              });
              this.clearFields();
              this.hideModal();
              this.$emit('refresh-table');
            })
            .catch((error) => {
              Swal.hideLoading();  
           
              Swal.fire({
                title: 'Error',
                icon: 'error',
                text: error.message || 'An error occurred while saving the post.',
              });
            });
        }
      });
    },

  
    clearFields() {
      this.post = {
        title: '',
        description: '',
        date: '',
      };
    },

   
    hideModal() {
      this.$bvModal.hide('addBlog');
    }
  }
};
</script>

<style scoped>
.card-img-top {
  height: 200px;
  object-fit: cover;
}
</style>

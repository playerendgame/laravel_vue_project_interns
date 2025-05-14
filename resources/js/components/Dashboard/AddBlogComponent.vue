<template>
  
  <b-modal id="addBlog" title="Create New Blog" :hide-footer="true" size="lg" centered  hide-header-close="false" @hidden="resetForm">
    <div class="modal-body px-4 py-3">

      <div class="mb-3">
        <label class="form-label fw-semibold">Title</label>
        <input class="form-control form-control-lg" v-model="post.title" type="text" placeholder="Enter blog title" required />
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Description</label>
        <textarea class="form-control" v-model="post.description" rows="4" placeholder="Write a brief description..." required></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label fw-semibold">Date</label>
        <input class="form-control" v-model="post.date" type="date" required />
      </div>

      <div class="d-flex justify-content-end">
        <button class="btn btn-success" @click="create">Post</button>
        <button class="btn btn-secondary me-2" @click="hideModal">Cancel</button>
      </div>

    </div>
  </b-modal>
</template>


<script>

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
      Swal.fire
      ({
        title: 'Are you sure?',
        text: "Do you want to save this blog post?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
      })
      .then((result) =>
      {
        if (result.isConfirmed) {
          Swal.showLoading();  
          axios.post('/add/post/data', this.post)
            .then((response) => {
              Swal.hideLoading();  

              Swal.fire
              ({
                  title: "Done Saving",
                  icon: 'success',
                  text: 'Post created successfully!'
              
              });
              this.clearFields();
              this.hideModal();
              this.$emit('refresh-table');
            })
            .catch((error) => 
            {
              Swal.hideLoading();  
              Swal.fire({
                title: 'Error',
                icon: 'error',
                text: 'Error Saving Data',
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

<template>
    
  <b-modal id="addBlog" title="Create New Blog" :hide-footer="true">
    <div class="modal-body">
      <div class="form-group">
        <label class="form-label">Title</label>
        <input class="form-control" v-model="post.title" type="text" />
      </div>
      <div class="form-group">
        <label class="form-label">Description</label>
        <input class="form-control" v-model="post.description" type="text" />
      </div>
      <div class="form-group">
        <label class="form-label">Date</label>
        <input class="form-control" v-model="post.date" type="date" />
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
      Swal.showLoading();  

    
      axios.post('/add/post/data', this.post)
        .then((response) => {
          Swal.hideLoading();  

        
          Swal.fire({
            title: "Done Saving",
            icon: 'success',
            text: response.data.message || 'Post created successfully!', 
          });

          
          this.post = { title: '', description: '', date: '' }; 

          this.$bvModal.hide('addBlog'); 
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
  }
}
</script>

<template>
  
  <div>
    
    <addblog-component @refresh-table="refreshTable" />


        <div class="poster-section mb-5">
        <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dHJhdmVsJTIwd2FsbHBhcGVyfGVufDB8fDB8fHww" class="poster-img"  alt="Travel Thailand" />
        <div class="poster-overlay justify-content-center">
          <h1 class="fw-bold">Travel Diary Blog</h1>
          <p class="lead">Your next adventure starts here</p>
        </div>
      </div>

    <!-- Page Content -->
    <div class="container mt-5">

      <div class="d-flex justify-content-between align-items-center mb-4">
        <button type="button" class="btn btn-success" @click="addBlog">
          Add Blog
        </button>
      </div>

      <!-- Blog Card List -->
      <div class="row">
        <div class="col-md-4 mb-4" v-for="item in post" :key="item.id">
          <div class="card h-100 shadow-sm">
            <img :src="getImageUrl(item.image)" class="card-img-top" alt="Blog image" style="height: 200px; object-fit: cover;"/>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ item.title }}</h5>
              <p class="card-text">{{ item.description }}</p>
              <p class="card-text text-muted mt-auto">Date: {{ item.date }}</p>
              <div class="button d-flex">
                <button class="btn btn-success" @click="updateData(item.id)">Update</button>
                <updateblog-component :itemId="item.id" @refresh-table="refreshTable" />
                <button class="btn btn-danger" @click="deletePost(item.id)">Delete</button>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>


  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      post: [],
    };
  },

  methods: {
    addBlog() {
      this.$bvModal.show('addBlog');
    },

    updateData(itemId) {
      this.$bvModal.show(`updata-data-${itemId}`);
    },

    getData() {
      axios.get('/fetch/post')
        .then((response) => {
          this.post = response.data;
        })
        .catch((error) => {
          console.error('There was an error fetching the posts:', error);
        });
    },

    refreshTable() {
      this.getData();
    },

    getImageUrl(path) {
      return path ? `/storage/${path}` : this.defaultImage;
    },

    handleImageError(event) {
      event.target.src = this.defaultImage;
    },

    deletePost(postId) {
      Swal.fire({
        title: 'Are you sure?',
        text: 'This post will be deleted permanently!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post(`/delete/post/${postId}`)
            .then(() => {
              Swal.fire('Deleted!', 'The post has been deleted.', 'success');
              this.getData(); 
            })
            .catch((error) => {
              Swal.fire('Error!', 'There was a problem deleting the post.', 'error');
              console.error(error.message);
            });
        }
      });
    },
  },

  mounted() {
    this.getData();
  },
};
</script>

<style>
.poster-section {
  position: relative;
  width: 100%;
  height: 400px;
  overflow: hidden;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.poster-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(70%);
}

.poster-overlay {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  text-align: center;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}


</style>
<style scoped>
.card-img-top {
  height: 200px; 
  object-fit: cover;
}

</style>


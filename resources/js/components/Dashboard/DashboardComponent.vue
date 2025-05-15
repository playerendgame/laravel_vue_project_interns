<template>
  
  <div>
    
    <addblog-component @refresh-table="refreshTable" />

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">Travel Blog</a>

          <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#">Home</a>
                  </li>
                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                  <li class="nav-item dropdown dropdown-hover">
                      <a class="nav-link dropdown-toggle fw-semibold text-white" href="#" id="categoriesDropdown" role="button">
                          Categories
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                          <li><a class="dropdown-item" href="#">Beaches</a></li>
                          <li><a class="dropdown-item" href="#">Waterfalls</a></li>
                          <li><a class="dropdown-item" href="#">Mountain Climbing</a></li>
                      </ul>
                  </li>

                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>

                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#">About</a>
                  </li>
              </ul>
          </div>

          <div class="d-flex ms-auto" style="gap: 10px">
              <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('signInModal')" type="submit">Sign Up</button>
              <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('loginModal')" type="submit">Login</button>
          </div>
      </div>
  </nav>

  
    <div class="poster-section mb-5">
        <video class="poster-video" autoplay muted loop>
          <source :src="videoUrl" type="video/mp4">
        </video>
        <div class="poster-text">
          <h1 class="fw-bold poster-overlay">Travel Diary Blog</h1>
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
            <img :src="item.image" class="card-img-top" alt="Blog image" style="height: 200px; object-fit: cover;"/>
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
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      post: [],
      videoUrl:'/vid.mp4'
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
  height: 525px;
  overflow: hidden;
  border-radius: 0;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.poster-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%; 
  height: 100%;      
  object-fit: cover;  
  filter: brightness(80%);
  z-index: 1;
}

.poster-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  text-align: center;
  z-index: 2;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}

.dropdown-menu {
    background-color: #212529;
    border: none;
    padding: 0;
    min-width: 180px;
}

.dropdown-menu .dropdown-item {
    color: #e0e0e0;
    padding: 12px 16px;
    border-bottom: 4px solid #333;
}

.dropdown-menu .dropdown-item:last-child {
    border-bottom: none;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #181818;
    color: #fff;
}

.dropdown-hover:hover .dropdown-menu {
    display: block;
    margin-top: 0;
}
</style>

<style scoped>
.card-img-top {
  height: 200px; 
  object-fit: cover;
}

</style>


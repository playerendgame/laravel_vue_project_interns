<template>
  <div>
    <addblog-component />

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">Account</a>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
            <li class="nav-item">
              <a class="nav-link fw-semibold text-white" href="#">Home</a>
            </li>
            <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
            <li class="nav-item">
              <a class="nav-link fw-semibold text-white" href="#">Posts</a>
            </li>
            <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
            <li class="nav-item">
              <a class="nav-link fw-semibold text-white" href="#">Categories</a>
            </li>
            <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
            <li class="nav-item">
              <a class="nav-link fw-semibold text-white" href="#">About</a>
            </li>
          </ul>
        </div>

        <div class="d-flex ms-auto">
          <form class="d-flex ms-3" role="search">
            <input
              class="form-control rounded-pill px-3 me-2"
              type="search"
              placeholder="Search..."
              aria-label="Search"
            />
            <button class="btn btn-outline-light rounded-pill px-4" type="submit">Go</button>
          </form>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Travel Blog</h3>
        <button type="button" class="btn btn-success" @click="addBlog">
          Add Blog
        </button>
      </div>

      <!-- Blog Card List -->
      <div class="row">
        <div class="col-md-4 mb-4" v-for="item in post" :key="item.id">
          <div class="card h-100 shadow-sm">
            <img
              :src="getImageUrl(item.image)"
              class="card-img-top"
              alt="Blog image"
              style="height: 200px; object-fit: cover;"
            />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ item.title }}</h5>
              <p class="card-text">{{ item.description }}</p>
              <p class="card-text text-muted mt-auto">Date: {{ item.date }}</p>
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

    getData() {
      axios
        .get('/fetch/post')
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
    }
  },

  mounted() {
    this.getData();
  }
};
</script>

<style scoped>
.card-img-top {
  height: 200px;
  object-fit: cover;
}
</style>

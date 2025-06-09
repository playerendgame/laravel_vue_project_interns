<template>
  <div>
    <addblog-component @refresh-table="refreshTable" />
      <div class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold ms-5 px-3 fonthome" href="#">WanderStories</a>
            <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center gap-3">
                  <li class="nav-item"><a class="nav-link fw-semibold text-white" @click="GoToHome">Home</a></li>
                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                  <li class="nav-item"><a class="nav-link fw-semibold text-white"><span style="color: #F77137">Blog</span></a></li>
                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                  <li class="nav-item"><a class="nav-link fw-semibold text-white" @click="GoToAbout">About</a></li>
              </ul>
            </div>
            <div v-if="user" class="d-flex align-items-center text-white fw-bold ms-auto me-3" style="gap: 10px; cursor: pointer;">
                <span>Welcome, {{ user.name }}</span>
              <div class="dropdown">
                  <a class="text-white dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle fs-4"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                  <li><button type="button" class="dropdown-item" @click="goToProfile">Profile</button></li>
                  <li><button type="button" class="dropdown-item" @click="logout">Logout</button></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <div class="container bg-white mt-4">
              <div class="section-header">
                  <div class="line"></div>
                  <h1 class="fw-bold fonthome">Create <span class="text-success">Blog</span></h1>
                  <div class="line"></div>
              </div>
              <p class="lead text-center fontpoppins">Express your thoughts, share your journey, and inspire others through your unique stories.</p>
              <br>
          </div>  
           <div class="container">
            <swiper-container class="about-swiper" pagination="true" pagination-dynamic-bullets="true" autoplay-delay="2500" autoplay-disable-on-interaction="false" loop="true" effect="fade"navigation="false">
                <swiper-slide v-for="(img, index) in imageList" :key="index">
                <div class="slide-wrapper">
                    <img :src="img.src" :alt="img.alt" class="slide-image" />
                    <div class="overlay center">
                        <h1 class="fonthome">{{ img.caption }}</h1>
                    </div>
                </div>
                </swiper-slide>
            </swiper-container>
        </div>
        <transition name="fade">
        <div v-if="!loading" class="container mt-5">
          <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <button type="button" class="btn btn-success" @click="addBlog"><i class="bi bi-plus-circle me-1"></i> Add Blog</button>

            <div class="input-group ms-auto mt-3 mt-md-0" style="width: 300px;">
              <label class="input-group-text text-white" for="categorySelect" style="background-color: #198754;"><i class="bi bi-filter me-2"></i>Sort by :</label>

              <select class="form-select" id="categorySelect" v-model="category_id" @change="applyFilter($event)">
                <option value="" selected>All Categories</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">
                  {{ category.category_name }}
                </option>
              </select>
            </div>
          </div>

        
        <div class="row">
          <div class="col-md-4 mb-4" v-for="item in post" :key="item.id">
            <div class="card h-100 border-0 shadow-sm">
              <img :src="item.image" class="card-img-top" alt="Blog image" />
              <div class="card-body d-flex flex-column">
                <span class="badge bg-secondary mb-2">{{ item.category_name }}</span>
                <h5 class="card-title text-dark fw-semibold" style="text-align : center" >{{ item.title }}</h5>
                <p class="card-text text-secondary" >{{ item.description }}</p>
                <p class="card-text text-muted small"> Date Uploaded : {{ item.date }}</p>
                <div class="mt-3 d-flex flex-wrap gap-2">
                  <button class="btn btn-outline-success btn-sm" @click="updateData(item.id)">
                    <i class="bi bi-pencil-square me-1"></i> Update</button>
                  <updateblog-component :itemId="item.id" @refresh-table="refreshTable"/>
                  <button class="btn btn-outline-danger btn-sm" @click="deletePost(item.id)">
                    <i class="bi bi-trash me-1"></i> Delete</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </transition>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2';
import axios from 'axios';

export default {
  data() {
    return {
      post: [],
      loading: true,
      imageList: [
                          {
                            src: '/SwiperImage/Swiper1.jpg',
                            alt: 'Island View',
                            caption: 'Embark on an Adventure Across the Hundred Islands'
                          },
                          {
                            src: '/SwiperImage/Swiper2.jpg',
                            alt: 'Mountain View',
                            caption: 'Conquer the Summits of the Mountains'
                          },
                          {
                            src: '/SwiperImage/Swiper3.jpg',
                            alt: 'Underwater View',
                            caption: 'Dive into the World Beneath the Waves'
                          },
                          {
                            src: '/SwiperImage/Swiper4.jpg',
                            alt: 'Waterfall View',
                            caption: 'Into the Heart of the World’s Waterfalls'
                          },
                          {
                            src: '/SwiperImage/Swiper5.jpg',
                            alt: 'Church View',
                            caption: 'Where Silence Meets the Sacred'
                          }
                        ],
      user: null,
      category_id: '',
      categories: []
    };
  },
  methods: {
    loadCategories() {
      axios.get('/category_type')
        .then(response => {
          this.categories = response.data;
        })
        .catch(error => {
          console.error('Failed to load categories:', error);
        });
    },
    applyFilter() {
      if (this.category_id === '') {
        this.getData();
      } else {
        axios.get(`/fetch/posts/by-category/${this.category_id}`)
          .then(response => {
            this.post = response.data;
          })
          .catch(error => {
            console.error('Failed to filter posts:', error);
          });
      }
    },
    GoToHome() {
      window.location.href = '/dashboard';
    },
    GoToAbout() {
      window.location.href = '/aboutdash';
    },
    addBlog() {
      this.$bvModal.show('addBlog');
    },
    updateData(itemId) {
      this.$bvModal.show(`updata-data-${itemId}`);
    },
    goToProfile() {
      window.location.href = '/profile';
    },
    getData() {
      this.loading = true;
      axios.get('/fetch/post')
        .then((response) => {
          this.post = response.data;
        })
        .catch((error) => {
          console.error('There was an error fetching the posts:', error);
        })
        .finally(() => {
          setTimeout(() => {
            this.loading = false;
          }, 500);
        });
    },
    refreshTable() {
      this.getData();
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
    getAuthenticatedUser() {
      axios.get('/auth/user')
        .then(response => {
          this.user = response.data;
        })
        .catch(() => {
          this.user = null;
        });
    },
    logout() {
      Swal.fire({
        title: 'Logging out...',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
      });

      axios.post('/logout/user')
        .then(() => {
          Swal.close();
          window.location.href = '/';
        })
        .catch(() => {
          Swal.close();
          Swal.fire('Error', 'Failed to logout. Please try again.', 'error');
        });
    },
  },
  mounted() {
    this.getData();
    this.getAuthenticatedUser();
    this.loadCategories();
  },
};
</script>

<style>
.poster-section {
  position: relative;
  width: 100%;
  height: 525px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.poster-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(75%);
  z-index: 1;
}

.poster-section::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
  z-index: 2;
}

.poster-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  text-align: center;
  z-index: 3;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}

.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 15px;
  overflow: hidden;
}

.card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.card-text {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
}

.navbar .nav-link {
  transition: color 0.3s ease;
}

.navbar .nav-link:hover {
  color: #F77137 !important;
  text-decoration: underline;
}

.dropdown-menu {
  background-color: #2b2b2b;
  border-radius: 6px;
  min-width: 180px;
}

.dropdown-menu .dropdown-item {
  color: #e0e0e0;
  padding: 12px 16px;
  border-bottom: 1px solid #3a3a3a;
}

.dropdown-menu .dropdown-item:last-child {
  border-bottom: none;
}

.dropdown-menu .dropdown-item:hover {
  background-color: #181818;
  color: #fff;
}
.footer-divider {
  width: 60px;
  border: 1px solid white;
  margin: 0 auto; /* Center horizontally */
  opacity: 0.6; /* Optional: make it subtle */
}
.FooterTitle, .FooterTagline{
  font-family: 'Playfair Display', serif;
}

.social-icons {
  margin-top: 20px;
}

.social-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 45px;
  height: 45px;
  border-radius: 50%;
  background-color: white;
  color: #343a40;
  text-decoration: none;
  font-size: 18px;
  transition: all 0.3s ease;
}

.social-icon:hover {
  background-color: #f8f9fa;
  color: #007bff;
}
.sticky-top {
  z-index: 1030; 
}
</style>

<style scoped>
.card-img-top {
  height: 200px;
  object-fit: cover;
}

.dropdown-toggle {
  cursor: pointer;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>

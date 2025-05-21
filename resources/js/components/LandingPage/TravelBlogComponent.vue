<template>
        <div>
        <login-component />
        <signin-component />
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
                <div class="container-fluid">
                    <a class="navbar-brand text-white fw-bold ms-5 px-3 fonthome" href="#">WanderStories</a>
                    <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center gap-3">
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="GoToHome">Home</a></li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-white">Blog</a></li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#">About</a></li>
                    </ul>
                    </div>
                    <div class="d-flex ms-auto" style="gap: 10px">
                    <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('signInModal')">Sign Up</button>
                    <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('loginModal')">Login</button>
                    </div>
                </div>
            </nav>
           
            <div class="poster-section mb-5 pb-5">
            <video class="poster-video" autoplay muted loop>
                <source :src="videoUrl" type="video/mp4">
            </video>
                <div class="poster-text">
                    <h1 class="fw-bold poster-overlay">Recent Travel Blogs</h1>
                    <p class="lead">Your next adventure starts here</p>
                </div>
            </div>

            <div class="row mx-5 mt-5 px-5">
                <div class="col-md-4 mb-4" v-for="item in post" :key="item.id">
                    <div class="card h-100 border-0 shadow-sm">
                            <img :src="item.image" class="card-img-top" alt="Blog image" />
                        <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary mb-2">{{ item.category_name }}</span>
                                <h5 class="card-title text-dark fw-semibold" style="text-align : center" >{{ item.title }}</h5>
                                <p class="card-text text-secondary" >{{ item.description }}</p>
                                <p class="card-text text-muted small"> Date Uploaded : {{ item.date }}</p>
                                <p class="card-text text-muted small"> Posted By : {{ item.admin_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
import axios from 'axios';

export default{

        data() {
            return{
                post: [],
                category_id: '',
                videoUrl: '/BLOG.mp4',
                categories: []
            };
        },
        methods:{
            getData() {
                axios.get('/fetch/all/post')
                .then((response) => {
                    this.post = response.data;
                })
                .catch((error )=> {
                    console.error('Error Fetching Data')
                });
            },
            GoToHome() {
                window.location.href = '/';
            },
            refreshTable(){
                this.getData();
            },
            loadCategories() {
            axios.get('/category_type')
                .then(response => {
                this.categories = response.data;
                })
                .catch(error => {
                console.error('Failed to load categories:', error);
                });
            },
        },
        mounted(){
            this.getData();
            this.loadCategories();
        }
    }
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
</style>

<style scoped>
.card-img-top {
  height: 200px;
  object-fit: cover;
}

.dropdown-toggle {
  cursor: pointer;
}
</style>
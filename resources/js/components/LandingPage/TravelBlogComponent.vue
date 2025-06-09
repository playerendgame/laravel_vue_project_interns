<template>
    <div>
        <login-component />
        <signin-component />
        <readmore-component :post-id="selectedPostId" />
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
                    <div class="d-flex ms-auto me-4" style="gap: 10px">
                    <button class="btn btn-outline-light rounded-pill px-4 fw-semibold fonthome" @click="$bvModal.show('signInModal')">Sign Up</button>
                    <button class="btn btn-outline-light rounded-pill px-4 fw-semibold fonthome" @click="$bvModal.show('loginModal')">Login</button>
                    </div>
                </div>
            </nav>
          <div class="container bg-white mt-4">
              <div class="section-header">
                  <div class="line"></div>
                  <h1 class="fw-bold fonthome">Recent <span class="text-success">Blogs</span></h1>
                  <div class="line"></div>
              </div>
              <p class="lead text-center fontpoppins">Explore people latest stories, adventures, and moments that inspire the journey.</p>
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
            
          <div class="container mt-5"> 
            <div class="row gx-4 gy-4">
                <div class="col-md-4 mb-4" v-for="item in post" :key="item.id">
                    <div class="card h-100 border-0 shadow-sm">
                            <img :src="item.image" class="card-img-top" alt="Blog image" />
                        <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary mb-2 fonthome">{{ item.category_name }}</span>
                                <h5 class="card-title text-dark fw-semibold fonthome" style="text-align : center" >{{ item.title }}</h5>
                                <p class="card-text text-secondary d-inline-block text-truncate" style="max-width: 75%;" >{{ item.description }}</p>
                                <p class="card-text text-muted small"> Date Uploaded : {{ item.date }}</p>
                                <p class="card-text text-muted small"> Posted By : {{ item.admin_name }}</p>
                                <div class="text-end mt-auto">
                                  <button class="btn btn-success rounded-pill px-3 py-2 fw-semibold w-auto read-more-btn" @click="openReadMore(item.id)">Read More <i class="fas fa-arrow-right ms-1"></i></button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
          </div> 
            <div class="footer-container" style="background-color: #343a40 !important;">
                <div class="container-fluid p-5">
                  <div class="row justify-content-center text-center">
                    <div class="col-md-12">
                      <h2 class="FooterTitle" style="font-family: 'Playfair Display', serif; color: white;">WanderStories</h2>
                      <p class="FooterTagline text-white">Your Next Adventure Starts Here.</p>

                      <hr class="footer-divider my-4">
                      <div class="social-icons d-flex justify-content-center gap-3 mt-3">
                        <a href="https://www.facebook.com" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.x.com" class="social-icon"><i class="fab fa-x-twitter"></i></a>
                        <a href="https://www.youtube.com" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.discord.com" class="social-icon"><i class="fab fa-discord"></i></a>
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

export default{

        data() {
            return{
               post: [],
               selectedPostId: null,    
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
                post: [],
                category_id: '',
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
            GoToAbout(){
              window.location.href = '/about'
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
            openReadMore(postId) {
            this.selectedPostId = postId;
            this.$bvModal.show('readMore');
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
.sticky-top {
  z-index: 1030; 
}
.read-more-btn {
  transition: all 0.3s ease-in-out;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.read-more-btn:hover {
  background-color: #28a745;
  transform: translateY(-2px);
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
}
</style>
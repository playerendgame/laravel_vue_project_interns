<template>
  <div>
    <div class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand text-white fw-bold ms-5 px-3 fonthome" href="#">WanderStories</a>
                    <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center gap-3">
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="GoToHome">Home</a></li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" @click="GoToBlog">Blog</a></li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-white"><span style="color: #F77137" @click="GoToAbout">About</span></a></li>
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

        <!-- ABOUT SECTION -->
        <div class="container bg-white mt-4">
            <div class="section-header">
                <div class="line"></div>
                <h1 class="fw-bold fonthome">About <span class="text-success">WanderStories</span></h1>
                <div class="line"></div>
            </div>
            <p class="lead text-center fontpoppins">Discover the passion, people, and purpose behind our journeys.</p>
            <br>
                <div class="row g-4 mb-5 pb-3">
                    <div class="col-lg-5">
                        <div class="p-4 bg-light rounded shadow-sm h-100">
                            <h4 class="fw-bold mb-3 fontpoppins">Why We Started WanderStories</h4>
                            <p class="fontpoppins text-secondary">
                                WanderStories was born from a shared desire to travel deeper, not just farther. Instead of counting countries, we collect moments: a sunrise over a temple, a conversation with a stranger, a taste of something new. We wanted a space to share these moments — honestly and vividly — to inspire others to wander not just for the view, but for the meaning behind it. These moments, though fleeting, leave lasting impressions — they teach us, challenge us, and sometimes even change us. We realized that travel isn’t just about escape; it’s about connection. Connection to the world, to others, and to ourselves. That’s what WanderStories is built on: the belief that every journey holds a lesson, every detour has a purpose, and every story is worth telling.
                              </p>

                            <div class="mt-4">
                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-globe-central-south-asia"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Discover New Destination Near You</h6>
                                        <p class="mb-0 text-secondary small">Places That Are Hard to Reach, but Unforgettable. </p>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="me-3">
                                        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">To Gain Insights about Affordable Trip</h6>
                                        <p class="mb-0 text-secondary small"> Destinations That Won’t Empty Your Wallet.</p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="me-3">
                                        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-house-door"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Comfort Accommodation</h6>
                                        <p class="mb-0 text-secondary small"> Affordable places that balance affordability, cleanliness, safety, and a touch of luxury or local charm.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class=" slideshow-container position-relative bg-light rounded shadow-sm h-100 overflow-hidden">
                          <transition name="fade" mode="out-in">
                            <img :key="currentSlide" :src="slideshowImages[currentSlide]" class="img-fluid w-100 h-100 slideshow-image mx-auto d-block object-fit-cover" alt="Background">
                          </transition> 
                        </div>
                    </div>      
              </div>
                    <div class="container mb-5">
                        <div class="row g-4 p-4 bg-light rounded shadow-sm">
                            <div class = "col-md-6">
                              <h2 class="fw-bold mb-3 fonthome text-center"> <span class="text-success"> Our Mission</span></h2>
                              <p class=" text-center text-secondary fontpoppins">To inspire and empower travelers by sharing authentic stories, practical tips, and immersive experiences that spark curiosity, encourage cultural exploration, and promote responsible travel around the world.</p>
                            </div>  
                            <div class = "col-md-6">
                              <h2 class="fw-bold mb-3 fonthome text-center"><span class="text-success">Our Vision</span></h2>
                              <p class=" text-center text-secondary fontpoppins">To become a leading travel storytelling platform where adventure seekers, digital nomads, and cultural enthusiasts connect, discover, and celebrate the beauty and diversity of our world through shared journeys.</p>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-5">
                      <div class="row g-4 bg-light rounded shadow-sm">
                        <div class="col-md-12">
                          <div class="section-header mb-4">
                            <div class="line"></div>
                            <h2 class="fw-bold mx-3 fonthome"><span class="text-success"> Photo Gallery</span></h2>
                            <div class="line"></div>
                          </div>
                          <div class="row g-0">
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery1.png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery1">
                            </div>
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery2.png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery2">
                            </div>
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery3.png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery3">
                            </div>
                          </div>
                          <div class="row g-0">
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery4.png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery4">
                            </div>
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery5.png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery5">
                            </div>
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery6.png" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery6">
                            </div>
                          </div>
                          <div class="row g-0">
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery7.jpg" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery7">
                            </div>
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery8.jpg" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery8">
                            </div>
                            <div class="col-md-4 zoom-hover">
                              <img src="/Gallery/Gallery9.jpg" class="img-fluid w-100 h-100 object-fit-cover" alt="Gallery9">
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
import Swal from 'sweetalert2';
import axios from 'axios';

export default{
data(){
        return {
        user: null,
    slideshowImages:[
      'https://triparx.com/wp-content/uploads/2025/03/explore-japan-on-a-budget-top-money-saving-secrets.png',
      'https://triparx.com/wp-content/uploads/2025/03/discover-italys-hidden-gems-unforgettable-local-treasures.png',
      'https://triparx.com/wp-content/uploads/2025/03/experience-phuket-your-ultimate-2025-travel-guide.png',
      'https://triparx.com/wp-content/uploads/2025/03/discover-timeless-beauty-ottoman-architecture-turkey.png'
    ], 
    currentSlide: 0,
    slideshowInterval: null
  };
},
methods: {
        GoToBlog(){
            window.location.href = '/blog';
        },
        goToProfile(){
            window.location.href = '/profile';
        },
        GoToAbout(){
        window.location.href = '/about';
        },
        GoToHome() {
            window.location.href = '/dashboard';
        },
        signUp() {
            this.$bvModal.show('signInModal');
        },
        getImageUrl(path) {
        return path ? `/storage/ ${path}` : this.defaultImage;
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
       startSlideshow() {
        this.slideShowInterval = setInterval(() => {
          this.currentSlide = (this.currentSlide + 1) % this.slideshowImages.length;
        }, 4000);
       } 
    },
    mounted (){
      this.startSlideshow();
      this.getAuthenticatedUser();
    },

};
</script>

<style>
html,
body {
  position: relative;
}

body {
  background: #eee;
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color: #000;
  margin: 0;
  padding: 0;
}
.slideshow-container {
  height: 300px;
}

.slideshow-image {
  object-fit: cover;
  height: 100%;
  transition: opacity 1s ease-in-out;
  border-radius: 16px;
}


.fade-enter-active, .fade-leave-active {
  transition: opacity 1s;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadein {
  opacity: 0;
  animation: fadeIn 1s ease-out forwards;
}
.delay-1 { animation-delay: 0.5s; }

.about-swiper {
  width: 100%;
  height: 500px;
  position: relative;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 12px 25px rgba(59, 242, 255, 0.2);
}

.slide-wrapper {
  width: 100%;
  height: 100%;
  position: relative;
}

.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(75%);
}

.section-header {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
}
.overlay {
  position: absolute;
  text-align: center;
  color: white;
  font-size: 2rem;
  font-weight: bold;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
  padding: 1rem;
  max-width: 90%;       
  box-sizing: border-box;
}

.overlay.center {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.swiper-pagination-bullet {
  background: white;
  opacity: 0.7;
}

.swiper-button-next,
.swiper-button-prev {
  color: white;
  filter: drop-shadow(0 0 5px black);
}

.about-us-header{
    display: flex;
    align-items: center;
    justify-content: center;
}
.line {
  flex-grow: 1;
  height: 1px;
  background: linear-gradient(to right, transparent, #ccc, transparent);
}

.footer-divider {
  width: 60px;
  border: 1px solid white;
  margin: 0 auto;
  opacity: 0.6; 
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
.fontpoppins{
  font-family: 'Poppins', serif;
}
.zoom-hover {
  overflow: hidden;
}

.zoom-hover img {
  transition: transform 0.4s ease;
}

.zoom-hover:hover img {
  transform: scale(1.1);
}
.sticky-top {
  z-index: 1030; 
}
</style>
<template>
  <div>
    <login-component />
    <signin-component />
    <div class="bg-white">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 sticky-top">
      <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold ms-5 px-3 fonthome" href="#">WanderStories</a>
          <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center gap-3">
                <li class="nav-item"><a class="nav-link fw-semibold text-white"><span style="color: #F77137">Home</span></a></li>
                <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="GoToBlog">Blog</a></li>
                <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="GoToAboutDash">About</a></li>
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
      <div class="poster-section mb-5">
        <video class="poster-video" autoplay muted loop>
          <source :src="videoUrl" type="video/mp4" />
        </video>
        <div class="poster-overlay"></div>
        <div class="poster-content text-center text-white">
          <h2 class="fw-bold display-4 mb-3 animate-fadein fonthome">Every Place Has a Story Tell Yours.</h2>
          <p class="lead mb-4 animate-fadein delay-1 fonthome">Your next adventure starts here.</p>
        </div>
      </div>

      <!-- Home Content -->
      <div class="home-content container py-5">
        <div class="section-header mb-4">
          <div class="line"></div>
          <h1 class="fw-bold mx-3 fonthome">Welcome to <span class="text-success">WanderStories</span></h1>
          <div class="line"></div>
        </div>
        <p class="lead mb-5 text-secondary">WanderStories is your gateway to real, raw, and inspiring travel experiences. Whether you're chasing sunsets on tropical beaches, exploring hidden mountain trails, or savoring street food in a new city — we bring stories that ignite your wanderlust. Created by travelers, for travelers.</p>
        <div class="row mb-5">
          <div class="col-md-4 mb-4">
            <router-link to="/categories" class="text-decoration-none">
              <div class="card h-100 nav-card border-0 shadow-sm">
                <img src="https://romblonparadise.com/wp-content/uploads/2022/08/alcantara-tablas-romblon-island-municipality-of-alcantara-romblon.png" class="card-img-top nav-card-img" alt="Categories">
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold text-success fontpoppins">Explore Categories</h5>
                  <p class="card-text text-secondary fontpoppins">Dive into Beaches, Waterfalls, Mountains & more.</p>
                </div>
              </div>
            </router-link>
          </div>

          <div class="col-md-4 mb-4">
            <router-link to="/blogs" class="text-decoration-none">
              <div class="card h-100 nav-card border-0 shadow-sm">
                <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dHJhdmVsfGVufDB8fDB8fHww" class="card-img-top nav-card-img" alt="Blogs">
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold text-success fontpoppins">Read Blogs</h5>
                  <p class="card-text text-secondary fontpoppins">Get inspired with travel stories and personal experiences.</p>
                </div>
              </div>
            </router-link>
          </div>

          <div class="col-md-4 mb-4">
            <router-link to="/about" class="text-decoration-none">
              <div class="card h-100 nav-card border-0 shadow-sm">
                <img src="https://plus.unsplash.com/premium_photo-1683306661472-d7bd9497c82a?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dHJhdmVsbGluZ3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top nav-card-img" alt="About">
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold text-success fontpoppins">About WanderStories</h5>
                  <p class="card-text text-secondary fontpoppins">Discover our mission, team, and travel philosophy.</p>
                </div>
              </div>
            </router-link>
          </div>
        </div>

    <!-- Slideshow Section -->
          <div class="row g-4 mb-5">
              <div class="col-lg-5">
                  <div class="p-4 bg-light rounded shadow-sm h-100">
                      <h3 class="fw-bold fontpoppins text-center mt-4 mb-3 ">Wander Through Time</h3>
                      <p class="text-secondary fontpoppins ">
                        Discover breathtaking sceneries and unforgettable stories from around the world. Our curated collection of travel highlights will inspire your next destination. Whether you're chasing sunsets in Bali, hiking through the Swiss Alps, or wandering the ancient streets of Kyoto, our stories bring each place to life. Let us guide you through hidden gems, local flavors, and meaningful encounters that turn every journey into a memory worth cherishing.
                      </p>
                  </div>
              </div>
              <div class="col-lg-7">
                  <div class="slideshow-container position-relative rounded shadow-sm overflow-hidden">
                    <transition name="fade" mode="out-in">
                      <img :key="currentSlide" :src="slideshowImages[currentSlide]" class="img-fluid w-100 slideshow-image" alt="Travel Slide"/>
                    </transition>
                  </div>
              </div>
            </div>
        

          <!-- Travel Tips Section -->
          <div class="section-header py-3">
            <div class="line"></div>
            <h2 class="fw-bold mx-3 fonthome">Travel Tips</h2>
            <div class="line"></div>
          </div>

          <div class="row mt-4">
            <div class="col-md-6 col-lg-3 mb-4">
              <div class="card h-100 tip-card bg-light border-0 tip-hover shadow-sm">
                <div class="card-body">
                  <h5 class="card-title fw-bold text-center text-success fontpoppins">Pack Light and Smart</h5>
                  <p class="card-text text-secondary fontpoppins">Stick to essentials and versatile outfits: a lighter bag means easier movement and less stress.</p>
                </div>
              </div>
            </div>
          
            <div class="col-md-6 col-lg-3 mb-4">
              <div class="card h-100 tip-card bg-light border-0 tip-hover shadow-sm">
                <div class="card-body">
                  <h5 class="card-title fw-bold text-center text-success fontpoppins">Learn Local Phrases</h5>
                  <p class="card-text text-secondary fontpoppins">Basic greetings or “thank you” in the local language go a long way in connecting with locals.</p>
                </div>
              </div>
            </div>
        
            <div class="col-md-6 col-lg-3 mb-4">
              <div class="card h-100 tip-card bg-light border-0 tip-hover shadow-sm">
                <div class="card-body">
                  <h5 class="card-title fw-bold text-center text-success fontpoppins">Download Offline Maps</h5>
                  <p class="card-text text-secondary fontpoppins">Don’t rely solely on Wi‑Fi or data — offline maps and travel apps keep you on track anywhere.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
              <div class="card h-100 tip-card bg-light border-0 tip-hover shadow-sm">
                <div class="card-body">
                  <h5 class="card-title fw-bold text-center text-success fontpoppins">Carry a Hygiene Kit</h5>
                  <p class="card-text text-secondary fontpoppins">Keep sanitizer, tissues, wipes, and a reusable water bottle handy — especially on long trips.</p>
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
                  <a href="https://www.youtube.com" class="youtube social-icon"><i class="fab fa-youtube"></i></a>
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

export default {
  data() {
    return {
      user: null,
      videoUrl: '/vid.mp4',
     slideshowImages: [
      'https://media.istockphoto.com/id/475034483/photo/famous-passage-to-the-beach.jpg?s=612x612&w=0&k=20&c=pjIa9lmDetkY7V08ySGLZWRHmAfSnjWP3rj5wj5r1F4=',
      'https://images.unsplash.com/photo-1725360629732-6c507c6eb701?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8NGslMjBtb3VudGFpbnxlbnwwfHwwfHx8MA%3D%3D',
      'https://images.pexels.com/photos/464391/pexels-photo-464391.jpeg?cs=srgb&dl=pexels-francesco-ungaro-464391.jpg&fm=jpg'],
      currentSlide: 0,
      slideshowInterval: null
    };
  },
  methods: {
  GoToAboutDash(){
  window.location.href = '/aboutdash';
  },
  GoToBlog() {
    window.location.href = '/blog';
  },
  GoToBeaches() {
  window.location.href = '/beaches';
  },
  GoToWaterfalls() {
  window.location.href = '/waterfalls';
  },
  GoToMountainClimbing() {
  window.location.href = '/mountainclimbing';
  },
  goToProfile(){
   window.location.href = '/profile'; 
  },
    signUp() {
      this.$bvModal.show('signInModal');
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
      this.slideshowInterval = setInterval(() => {
        this.currentSlide = (this.currentSlide + 1) % this.slideshowImages.length;
      }, 4000); 
    }
  },
  mounted() {
    this.startSlideshow();
    this.getAuthenticatedUser();
  },
  beforeDestroy() {
    clearInterval(this.slideshowInterval);
  },
  
};


</script>

<style>
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

.fonthome{
  font-family: 'Playfair Display', serif;
}

.fontpoppins{
  font-family: 'Poppins', serif;
}
.poster-section {
  position: relative;
  width: 100%;
  height: 525px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}
.poster-overlay {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.4);
  z-index: 2;
}
.poster-video {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  object-fit: cover;
  filter: brightness(75%);
  z-index: 1;
}

.poster-content {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  z-index: 3;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
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


.section-header {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
}
.line {
  flex-grow: 1;
  height: 1px;
  background: linear-gradient(to right, transparent, #ccc, transparent);
}


.tip-card {
  transition: transform 0.2s ease-in-out;
}
.tip-hover:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}
.card-title {
  font-size: 1.1rem;
}
.card-text {
  font-size: 0.95rem;
  color: #555;
}
.nav-card {
  transition: transform 0.2s ease-in-out, box-shadow 0.2s;
  border-radius: 16px;
  overflow: hidden;
}
.navbar {
  .grab {cursor: -webkit-grab; cursor: grab;}
}
.nav-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}
.nav-card-img {
  height: 200px;
  object-fit: cover;
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
.sticky-top {
  z-index: 1030;
}
</style>

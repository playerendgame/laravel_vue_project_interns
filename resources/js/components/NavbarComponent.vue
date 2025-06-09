<template>
    <div>
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
    </div>
</template>
<script>
import Swal from 'sweetalert2';
import axios from 'axios';

export default {
  data() {
    return {
      user: null,
    };
  },
  methods: {
  GoToAboutDash(){
  window.location.href = '/aboutdash';
  },
  GoToBlog() {
    window.location.href = '/blog';
  },
  goToProfile(){
   window.location.href = '/profile'; 
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
    this.getAuthenticatedUser();
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

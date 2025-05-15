<template>  
  <div>
    <login-component />
    <signin-component />

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">WanderStories</a>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
            <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#">Home</a></li>
            <li class="vr text-white mx-2"></li>
            <li class="nav-item dropdown dropdown-hover">
              <a class="nav-link dropdown-toggle fw-semibold text-white" href="#" id="categoriesDropdown" role="button">Categories</a>
              <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                <li><a class="dropdown-item" href="#">Beaches</a></li>
                <li><a class="dropdown-item" href="#">Waterfalls</a></li>
                <li><a class="dropdown-item" href="#">Mountain Climbing</a></li>
              </ul>
            </li>
            <li class="vr text-white mx-2"></li>
            <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#">About</a></li>
          </ul>
        </div>
        <div class="d-flex ms-auto" style="gap: 10px">
          <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="signUp">Sign Up</button>
          <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('loginModal')">Login</button>
        </div>
      </div>
    </nav>

    <!-- Poster Section -->
    <div class="poster-section mb-5">
      <video class="poster-video" autoplay muted loop>
        <source :src="videoUrl" type="video/mp4">
      </video>
      <div class="poster-content text-center text-white">
        <h2 class="fw-bold display-4 mb-3 animate-fadein">Every Place Has a Story — Tell Yours.</h2>
        <p class="lead mb-4 animate-fadein delay-1">Your next adventure starts here.</p>
        <a class="btn btn-outline-light rounded-pill px-4 fw-semibold animate-fadein delay-2" @click="$bvModal.show('loginModal')">Create Your Own Story</a>
      </div>
    </div>

    <!-- Home Content -->
    <div class="home-content container text-center py-5">
      <div class="section-header mb-4">
        <div class="line"></div>
        <h1 class="fw-bold mx-3">Welcome to <span class="text-success">WanderStories</span></h1>
        <div class="line"></div>
      </div>
      <p class="lead mb-5">WanderStories is your gateway to real, raw, and inspiring travel experiences. Whether you're chasing sunsets on tropical beaches, exploring hidden mountain trails, or savoring street food in a new city — we bring stories that ignite your wanderlust. Created by travelers, for travelers.</p>

      <div class="section-header py-3">
        <div class="line"></div>
        <h2 class="fw-bold mx-3">Travel Tips</h2>
        <div class="line"></div>
      </div>

      <div class="row mt-4">
        <div class="col-md-6 col-lg-3 mb-4" v-for="(tip, index) in travelTips" :key="index">
          <div class="card h-100 border-0 shadow-sm tip-card">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ tip.title }}</h5>
              <p class="card-text">{{ tip.text }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      videoUrl: '/vid.mp4',
      travelTips: [
        { title: "Pack Light and Smart", text: "Stick to essentials and versatile outfits. A lighter bag means easier movement and less stress." },
        { title: "Learn a Few Local Phrases", text: "Knowing basic greetings or thank you in the local language can go a long way in connecting with locals." },
        { title: "Download Offline Maps & Travel Apps", text: "Don’t rely solely on Wi-Fi or data. Apps like Google Maps, Google Translate, or travel guides can work offline too." },
        { title: "Always Carry a Travel Hygiene Kit", text: "Keep sanitizer, tissues, wipes, and a reusable water bottle handy — especially for long journeys or remote spots." }
      ]
    };
  },
  methods: {
    signUp() {
      this.$bvModal.show('signInModal');
    }
  }
}
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
  z-index: 2;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fadein {
  opacity: 0;
  animation: fadeIn 1s ease-out forwards;
}
.delay-1 { animation-delay: 0.5s; }
.delay-2 { animation-delay: 1s; }

/* Section Header Lines */
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

/* Cards */
.tip-card {
  transition: transform 0.2s ease-in-out;
}
.tip-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

.card-title {
  color: #2c3e50;
}
.card-text {
  color: #555;
  font-size: 0.95rem;
}
</style>

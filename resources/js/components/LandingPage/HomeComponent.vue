<template>
  <div>
    <login-component />
    <signin-component />

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold ms-5 px-3 fancy-font" href="#">WanderStories</a>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
            <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#">Home</a></li>
            <li class="vr text-white mx-2"></li>
            <li class="nav-item dropdown dropdown-hover">
              <a class="nav-link dropdown-toggle fw-semibold text-white" href="#">Categories</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Beaches</a></li>
                <li><a class="dropdown-item" href="#">Waterfalls</a></li>w
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
        <source :src="videoUrl" type="video/mp4" />
      </video>
      <div class="poster-content text-center text-white">
        <h2 class="fw-bold display-4 mb-3 animate-fadein fancy-font">Every Place Has a Story Tell Yours.</h2>
        <p class="lead mb-4 animate-fadein delay-1 fancy-font">Your next adventure starts here.</p>
      </div>
    </div>

    <!-- Home Content -->
    <div class="home-content container text-center py-5">
      <div class="section-header mb-4">
        <div class="line"></div>
        <h1 class="fw-bold mx-3 fancy-font">Welcome to <span class="text-success">WanderStories</span></h1>
        <div class="line"></div>
      </div>
      <p class="lead mb-5 text-secondary">WanderStories is your gateway to real, raw, and inspiring travel experiences. Whether you're chasing sunsets on tropical beaches, exploring hidden mountain trails, or savoring street food in a new city — we bring stories that ignite your wanderlust. Created by travelers, for travelers.</p>


      
<div class="row mb-5">
  <div class="col-md-4 mb-4">
    <router-link to="/categories" class="text-decoration-none">
      <div class="card h-100 nav-card border-0 shadow-sm">
        <img src="https://romblonparadise.com/wp-content/uploads/2022/08/alcantara-tablas-romblon-island-municipality-of-alcantara-romblon.png" class="card-img-top nav-card-img" alt="Categories">
        <div class="card-body text-center">
          <h5 class="card-title fw-bold text-success fancy-font">Explore Categories</h5>
          <p class="card-text text-secondary">Dive into Beaches, Waterfalls, Mountains & more.</p>
        </div>
      </div>
    </router-link>
  </div>

  <div class="col-md-4 mb-4">
    <router-link to="/blogs" class="text-decoration-none">
      <div class="card h-100 nav-card border-0 shadow-sm">
        <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dHJhdmVsfGVufDB8fDB8fHww" class="card-img-top nav-card-img" alt="Blogs">
        <div class="card-body text-center">
          <h5 class="card-title fw-bold text-success fancy-font">Read Blogs</h5>
          <p class="card-text text-secondary">Get inspired with travel stories and personal experiences.</p>
        </div>
      </div>
    </router-link>
  </div>

  <div class="col-md-4 mb-4">
    <router-link to="/about" class="text-decoration-none">
      <div class="card h-100 nav-card border-0 shadow-sm">
        <img src="https://plus.unsplash.com/premium_photo-1683306661472-d7bd9497c82a?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dHJhdmVsbGluZ3xlbnwwfHwwfHx8MA%3D%3D" class="card-img-top nav-card-img" alt="About">
        <div class="card-body text-center">
          <h5 class="card-title fw-bold text-success fancy-font">About WanderStories</h5>
          <p class="card-text text-secondary">Discover our mission, team, and travel philosophy.</p>
        </div>
      </div>
    </router-link>
  </div>
</div>


      <!-- Travel Tips Section -->
      <div class="section-header py-3">
        <div class="line"></div>
        <h2 class="fw-bold mx-3 fancy-font">Travel Tips</h2>
        <div class="line"></div>
      </div>

      <div class="row mt-4">
     
        <div class="col-md-6 col-lg-3 mb-4">
          <div class="card h-100 tip-card border-0 tip-hover shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold text-primary-emphasis fancy-font">Pack Light and Smart</h5>
              <p class="card-text text-secondary">Stick to essentials and versatile outfits: a lighter bag means easier movement and less stress.</p>
            </div>
          </div>
        </div>
       
        <div class="col-md-6 col-lg-3 mb-4">
          <div class="card h-100 tip-card border-0 tip-hover shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold text-primary-emphasis fancy-font">Learn Local Phrases</h5>
              <p class="card-text text-secondary">Basic greetings or “thank you” in the local language go a long way in connecting with locals.</p>
            </div>
          </div>
        </div>
     
        <div class="col-md-6 col-lg-3 mb-4">
          <div class="card h-100 tip-card border-0 tip-hover shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold text-primary-emphasis fancy-font">Download Offline Maps</h5>
              <p class="card-text text-secondary">Don’t rely solely on Wi‑Fi or data — offline maps and travel apps keep you on track anywhere.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <div class="card h-100 tip-card border-0 tip-hover shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold text-primary-emphasis fancy-font">Carry a Hygiene Kit</h5>
              <p class="card-text text-secondary">Keep sanitizer, tissues, wipes, and a reusable water bottle handy — especially on long trips.</p>
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
      videoUrl: '/vid.mp4'
    };
  },
  methods: {
    signUp() {
      this.$bvModal.show('signInModal');
    }
  }
};
</script>

<style>
.fancy-font {
  font-family: 'Playfair Display', serif;
}

.poster-section {
  position: relative;
  width: 100%;
  height: 525px;
  overflow: hidden;
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
.nav-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}
.nav-card-img {
  height: 200px;
  object-fit: cover;
}


</style>

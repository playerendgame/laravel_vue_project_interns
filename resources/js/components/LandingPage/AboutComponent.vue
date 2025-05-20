<template>
  <div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">Travel Blog</a>

          <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#" @click="GoToHome">Home</a>
                  </li>
                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#" @click="GoToBlog">Blog</a>
                  </li>
                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                  <li class="nav-item dropdown dropdown-hover">
                      <a class="nav-link dropdown-toggle fw-semibold text-white" href="#" id="categoriesDropdown" role="button">
                          Categories
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                          <li><a class="dropdown-item" href="#" @click="GoToBeaches">Beaches</a></li>
                          <li><a class="dropdown-item" href="#" @click="GoToWaterfalls">Waterfalls</a></li>
                          <li><a class="dropdown-item" href="#" @click="GoToMountainClimbing">Mountain Climbing</a></li>
                      </ul>
                  </li>

                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>

                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#"><span style="color: #F77137">About</span></a>
                  </li>
              </ul>
          </div>
          <div v-if="user" class="d-flex align-items-center text-white fw-bold ms-auto me-3" style="gap: 10px; cursor: pointer;">
            <span>Welcome, {{ user.name }}</span>
            <div class="dropdown">
              <a
                class="text-white dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <button type="button" class="dropdown-item" @click="goToProfile">Profile</button>
                </li>
                <li>
                    <button type="button" class="dropdown-item" @click="logout">Logout</button>
                </li>
              </ul>
            </div>
          </div>
      </div>
  </nav>

    <!-- SWIPER -->
    <swiper-container 
      class="AboutSwiper"
      pagination="true"
      pagination-dynamic-bullets="true"
      autoplay-delay="1800"
      autoplay-disable-on-interaction="false"
      loop="true"
    >
      <swiper-slide v-for="n in 4" :key="n">
        <img
          class="d-block w-100"
          width="500"
          height="550"
          src="https://img.freepik.com/free-photo/adventure-trip-travel-destination-hiking-nature-concept_53876-122407.jpg"
          alt="Nature adventure photo slide"
        />
      </swiper-slide>
    </swiper-container>

    <br><br>

    <!-- ABOUT SECTION -->
    <div class="Maincontainer">
      <div class="container about_us">
        <div class="row">
          <div class="col-md-6">
            <h2>About Us</h2>
            <p>
              We’re a group of explorers, storytellers, photographers, and adventure-seekers who believe
              the world is meant to be seen, experienced, and deeply felt. We come from different backgrounds,
              speak different languages, and have different travel styles — but we’re united by one thing:
              an insatiable curiosity for the world and a desire to share it with you.
            </p>
          </div>
          <div class="col-md-6">
            <h2>Who We Are</h2>
            <p>
              We’re not your typical travel influencers. We’re a collective of real people who love getting
              our shoes dusty on a mountain trail, chatting with locals over street food, or getting lost in
              a city’s back alleys to find its soul.
            </p>
            <p>
              Some of us travel full-time. Others explore between jobs, on weekends, or with families in tow.
              From solo female travelers to digital nomads, from thrill-seekers to cultural buffs — our
              diversity is what makes our stories richer.
            </p>
            <p>
              Each of us brings a unique perspective to the table, which means you'll find content here
              that reflects many voices, styles, and experiences.
            </p>
          </div>
        </div>
      </div>

      <br>

      <!-- WHY WE STARTED -->
      <div class="container why_we_started">
        <div class="row text-center">
          <h2>Why We Started This Blog</h2>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>
              We created <strong>WanderStories</strong> because we believe travel should be inclusive,
              accessible, and meaningful. It’s not just about dream destinations or perfect photos — it’s
              about discovery, growth, and the little moments that stay with you long after you return home.
            </p>
            <p>
              Our goal is to build a space where anyone — no matter where you’re from or how you travel —
              can find inspiration, trusted advice, and a supportive community.
            </p>
          </div>
        </div>
      </div>

      <br>

      <!-- WHAT YOU'LL FIND -->
      <div class="container what_you'll">
        <h2 class="text-center">What You’ll Find Here</h2>
        <br>
        <div class="row">
          <div class="col-md-4">
            <h2>Comprehensive Travel Guides</h2>
            <p>
              In-depth, experience-based guides to cities, countries, road trips, hikes, and
              off-the-beaten-path adventures — all written from real journeys we’ve taken.
            </p>
          </div>
          <div class="col-md-4">
            <h2>Tips & Resources from the Road</h2>
            <p>
              Budget tips, travel gear reviews, digital nomad hacks, family travel advice — we share
              what works (and what doesn’t) so you don’t have to learn the hard way.
            </p>
          </div>
          <div class="col-md-4">
            <h2>Authentic Travel Stories</h2>
            <p>
              Not everything goes to plan, and that’s part of the adventure. We share unfiltered stories
              about the highs, lows, lessons, and unexpected magic of travel.
            </p>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-6">
            <h2>Cultural Connection</h2>
            <p>
              We’re deeply interested in people, not just places. Expect thoughtful posts about culture,
              history, food, and what it really means to connect across borders.
            </p>
          </div>
          <div class="col-md-6">
            <h2>Sustainable & Responsible Travel</h2>
            <p>
              As travelers, we believe in giving back more than we take. We’re constantly learning how
              to travel lighter — for the planet, and for local communities.
            </p>
          </div>
        </div>
      </div>

      <br>

      <!-- TRAVEL PHILOSOPHY -->
      <div class="container travel_journey">
        <div class="row">
          <div class="col-md-6">
            <h2>Our Travel Philosophy</h2>
            <p>
              We believe travel is one of the most powerful tools for empathy, education, and transformation.
              It’s not about ticking countries off a list — it’s about immersing yourself in new perspectives,
              pushing your comfort zone, and returning home with a little more understanding than before.
            </p>
            <p>
              Whether we’re trekking through the Andes, working from a rooftop in Vietnam, or exploring local
              gems in our own backyard — we travel with curiosity, respect, and intention.
            </p>
          </div>
          <div class="col-md-6">
            <h2>Join the Journey</h2>
            <p>We’re not just a blog — we’re a community. And there’s always room for more voices.</p>
            <p>
              So, whether you're planning your first trip, seeking travel inspiration, or simply dreaming
              from your desk — we’re glad you’re here. We hope our stories inspire your next journey, help
              you travel smarter, and remind you that the world is full of wonder.
            </p>
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

  methods: {
    GoToHome(){
      window.location.href = '/dashboard';
    },
    GoToBlog(){
      window.location.href = '/blog'
    }
  }

}
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

swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

swiper-slide img {
  display: block;
  object-fit: cover;
  width: 100%;
  height: auto;
  max-height: 550px;
}
</style>

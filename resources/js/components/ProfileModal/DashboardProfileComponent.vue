<template>
    <div>
        <addprofile-component />
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
      <div class="container-fluid">
          <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">Travel Blog</a>

          <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#"><span style="color: #F77137">Home</span></a>
                  </li>
                  <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                  <li class="nav-item">
                      <a class="nav-link fw-semibold text-white" href="#" @click="goToBlog">Blog</a>
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
                      <a class="nav-link fw-semibold text-white" href="#">About</a>
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



        <div class="container-fluid py-5">
            <div class="row">
                
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="https://cdn-icons-png.freepik.com/512/1077/1077114.png?uid=R188383037&ga=GA1.1.1601512225.1745288203" alt="Profile Picture" style="width: 200px; ">    
                </div>
                
                    <div class = "col-md-6">
                        <button class="btn btn-outline-success btn-sm" >
                         <i class="bi bi-pencil-square me-1"></i> Change Photo
                        </button>
                    </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    
                <div class = "container-fluid">
                    <div class = "row">
                        <div class="col-md-6">
                    <div class="row ">
                        <p>Email Address</p>
                       <input  style ="width: 300px;" type="text" value="hello, i am the email" readonly />
                    </div>
                    <div class="row">
                        <p>Name</p>
                        <input type = "name" placeholder=" " style="width: 300px;">
                    </div>
                    <div class="row">
                        <p>Password</p>
                       <input type = "password" placeholder=" " style="width: 300px;">
                    </div>
                </div>
                
                    
                </div>

                  
            </div>
        </div>
        <!-- Blog Card List -->
        <!-- <div class="row">
            <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text text-muted mt-auto"></p>
                <div class="button d-flex">
                    <button class="btn btn-success">Updatee</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
                </div>
            </div>
            </div>
        </div> -->
    </div>
</template>
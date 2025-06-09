<template>
    <div>
        <addprofile-component @refresh-table="refreshTable"/>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand text-white fw-bold ms-5 px-3 fonthome" href="#">WonderStories</a>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center gap-3">
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="GoToHome">Home</a></li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="goToBlog">Blog</a></li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-white" href="#" @click="GoToAbout">About</a></li>
                    </ul>
                </div>
                <div v-if="user" class="d-flex align-items-center text-white fw-bold ms-auto me-3" style="gap: 10px; cursor: pointer;">
                    <span>Welcome, {{ user.name }}</span>
                    <div class="dropdown">
                    <a class="text-white dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle fs-4"></i></a>
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
        <!-- Profile -->
        <div class="bg-white min-vh-95">
            <div class="container py-5">
                <div class="mb-5 text-center">
                    <h2 class="fw-bold">User Profile</h2>
                    <p class="text-muted">View and manage your personal information.</p>
                </div>
            <div class="card custom-shadow mx-auto rounded-4 overflow-hidden" style="max-width: 1000px;">
                    <div class="bg-primary-subtle text-primary-emphasis px-4 py-4 d-flex align-items-center">
                        <img :src="info.image" @error="useDefaultImage" alt="Profile Image" class="rounded-circle border border-3 border-white shadow-sm me-4" style="width: 100px; height: 100px; object-fit: cover;" />
                        <div class="flex-grow-1">
                            <h4 class="mb-0 fw-bold">{{ info.name }}</h4>
                            <p class="text-muted mb-1">{{ user.email }}</p>
                            <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">Active</span>
                        </div>
                            <button class="btn btn-outline-primary rounded-pill px-4" @click="editProfile"><i class="bi bi-pencil me-2"></i>Edit</button>
                    </div>
                    <div class="bg-light px-4 py-4 rounded custom-shadow">
                    <h5 class="mb-3">User Information</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-body">
                                <label class="text-muted small mb-1">Age</label>
                                <div class="fs-6 fw-semibold">{{ info.age || 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-body">
                                <label class="text-muted small mb-1">Birthday</label>
                                <div class="fs-6 fw-semibold">{{ info.birthday_formatted || 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-body">
                                <label class="text-muted small mb-1">Contact Number</label>
                                <div class="fs-6 fw-semibold">{{ info.contact || 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <label class="text-muted small mb-1">Joined</label>
                                <div class="fs-6 fw-semibold">{{ info.created_at }}</div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border-0">
                                <div class="card-body">
                                <label class="text-muted small mb-1">Address</label>
                                <div class="fs-6 fw-semibold">{{ info.address || 'N/A' }}</div>
                                </div>
                            </div>
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
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-x-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-discord"></i></a>
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
        videoUrl: '/vid.mp4',
        user: null,
        info: {
            name: '',
            age: '',
            birthday: '',
            address: '',
            created_at: '',
            contact:'',
            image: ''
            },
        };
        
    },

    methods: {
        GoToHome() {
                window.location.href = '/dashboard';
            },
        goToBlog(){
            window.location.href = '/blog';
        },
        useDefaultImage(event) {
            event.target.src = '/images/default-profile.png';
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
        GoToAbout(){
        window.location.href = '/about';
        },
        getImageUrl(path) {
        return path ? `/storage/${path}` : this.defaultImage;
        },
        editProfile() {
            this.$bvModal.show('editInfo');
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
        getEmail(){
            axios.post('/get-user-by-email', { email: this.email })
                .then(response => {
                    console.log('User found:', response.data);
                })
                .catch(error => {
                    if (error.response.status === 404) {
                    alert('User not found');
                    } else {
                    console.error(error);
                    }
                });
        },
        refreshTable() {
            this.updateProfile();
        },
        updateProfile() {
            axios.get('/get-user-info')
            .then((response) => {
                this.info = response.data;
                
            })
            .catch((error) => {
                console.error(error);
            });
        }
    },
    mounted() {
            this.getAuthenticatedUser();
            this.updateProfile();
        },
}
</script>
<style>
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

.custom-shadow {
  box-shadow: 0 4px 20px rgba(53, 176, 197, 0.2);
}
.sticky-top {
    z-index: 1030;
}
</style>


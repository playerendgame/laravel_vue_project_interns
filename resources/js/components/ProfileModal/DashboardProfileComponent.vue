<template>
    <div>
        <addprofile-component />
        <!-- Navbar -->
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
                            <a class="nav-link fw-semibold text-white" href="#" @click="GoToAbout">About</a>
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
        <br>
        <!-- Profile -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" width="150" height="200" src="https://cdn-icons-png.freepik.com/512/1077/1077114.png?uid=R188383037&ga=GA1.1.1601512225.1745288203">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- CardBody -->
                         <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                    </svg> Fullname:
                                                </li>
                                                <li class="list-group-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                                                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                                                    </svg> Email:
                                                </li>
                                                <li class="list-group-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                                    </svg> Password:
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
                                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5M2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
                                                    </svg> Birthday:
                                                </li>
                                                <li class="list-group-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                                    </svg> Contact:
                                                </li>
                                                <li class="list-group-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
                                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                                                        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                                                    </svg> Home:
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <br>
                         <!-- Buttons -->
                         <button type="button" class="btn btn-primary">Edit Profile</button>
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
        };
    },

    methods: {
        goToBlog(){
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
        GoToAbout(){
        window.location.href = '/about';
        },
        getImageUrl(path) {
        return path ? `/storage/${path}` : this.defaultImage;
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


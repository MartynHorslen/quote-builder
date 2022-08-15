<script>
    export default {};
</script>

<template>
    <div id="hero">
        <img src="https://images.pexels.com/photos/585418/pexels-photo-585418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-fluid" id="hero-img" alt="..." />
        <h1 id="img-text">Construction Quote Builder</h1>
    </div>
    <div class="container services text-center">
        <div class="card border-0">
            <div class="card-body">
                <h1 class="card-title">Services</h1>
                <p class="card-text text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. Eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>

        <div class="row justify-content-xl-center">
        <a href="#" class="text-decoration-none col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <h5 class="card-title">Request a Quote</h5>
                    <p class="card-text text-dark">Get a quote in minutes using our Quote Builder tool.</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="text-decoration-none col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <i class="fa-solid fa-list"></i>
                    <h5 class="card-title">View Previous Quotes</h5>
                    <p class="card-text text-dark">Make multiple quotes and compare them all in one place.</p>
                </div>
            </div>
        </a>
        <a href="#" class="text-decoration-none col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <i class="fa-solid fa-envelope"></i>
                    <h5 class="card-title">Email Updates</h5>
                    <p class="card-text text-dark">A copy of Quotes and Order details are emailed to you instantly when updated.</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="text-decoration-none col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <i class="fa-solid fa-truck"></i>
                    <h5 class="card-title">Quick Delivery</h5>
                    <p class="card-text text-dark">Industry leading delivery times!</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="text-decoration-none col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <i class="fa-solid fa-headset"></i>
                    <h5 class="card-title">Customer Support</h5>
                    <p class="card-text text-dark">All enquiries handled swiftly by our team during business hours (Mon - Fri, 09:00 - 17:00).</p>
                </div>
            </div>
        </a>
        
        </div>
    </div>
</template>

<style>
    #hero {
        display: grid;
        place-items: center;
    }
    #img-text {
        position: absolute;
        color: white;
        width: 50%;
        text-align: center;
    }
    #hero-img {
        filter: brightness(0.4);
    }
    .services .card {
        border: 1px solid transparent;
        border-radius: 0;
        padding: 15px 0;
        height: 100%;
    }
    .services .card:hover {
        border-top: 1px solid var(--primary);
        border-bottom: 1px solid var(--primary);
    }
    i {
        font-size: 64px;
        margin-bottom: 15px;
    }
    @media (min-width: 576px){
        #hero-img{
            height: 250px;
            width: 100%;
            object-fit: cover;
        } 
    }
</style>
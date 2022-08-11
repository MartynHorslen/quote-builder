<script>
    export default {};
</script>

<template>
    <div id="hero">
        <img src="https://images.pexels.com/photos/585418/pexels-photo-585418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-fluid" id="hero-img" alt="..." />
        <h1 id="img-text">Construction Quote Builder</h1>
    </div>
    <div class="container">
        <p>hello world</p>
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
</style>
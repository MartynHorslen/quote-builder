<script>
export default {}
</script>

<template>
    <div id="page-header">
        <div class="container d-flex flex-row justify-content-between align-items-center">
            <h3 class="page-title">{{ $route.name }}</h3>
            <router-link to="/products/create"><button v-if="$route.name == 'Products'" type="button"  class="btn btn-outline-light">Create Product</button></router-link>
        </div>
    </div>
</template>

<style>
    .container {
        padding: 10px 30px;
    }
    #page-header {
        background-color: var(--primary);
        color: #fff;
        margin-top: 61px;
    }
    .page-title {
        margin-bottom: 0;
        text-transform: capitalize;
    }
    .btn-outline-light:hover {
        color: var(--primary);
    }
    @media (min-width: 768px){
        #page-header {
            margin-top: 57px;
        }
    }
</style>
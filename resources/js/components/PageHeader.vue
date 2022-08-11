<script>
export default {
    
}
</script>

<template>
    <div id="page-header">
        <div class="container">
            <h3 class="page-title">{{ $route.name }}</h3>
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
    }
    .page-title {
        margin-bottom: 0;
    }
</style>
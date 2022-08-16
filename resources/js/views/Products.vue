<script>
import axios from 'axios';
// import { ref } from 'vue';

    export default {
        data() {
            return {
                products: ''
            }
        },

        methods: {
            getProducts() {
                axios.get('api/products')
                    .then(( {data} ) => {
                        this.products = data.products;
                    })
            }
        },

        mounted() {
            this.getProducts();
        }
    };
</script>

<template>
<div class="container">
    <div class="row d-flex flex-column flex-sm-row gap-3 gap-sm-4 my-3 justify-content-between">
        <div id="search" class="input-group rounded">
            <input type="search" class="form-control" placeholder="Search for products..." aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">Search</button>
        </div>
        <button id="add-product" class="btn btn-primary">Create Product</button>
    </div>
    <div class="row d-flex flex-column flex-sm-row gap-3 gap-sm-4 my-3 justify-content-between">
        <div class="card" v-for="product in products" :key="product.id">
            <img :src="product.image" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ product.name }}</h5>
                <p class="card-text">Size: {{ product.weight }} kg</p>
                <p class="card-text">SKU: {{ product.SKU }}</p>
                <p class="card-text">£{{ product.price }}</p>
                <a href="#" class="btn btn-primary">Add to Quote</a>
            </div>
        </div>
    </div>
</div>
</template>

<style>
    .btn-primary {
        background-color: var(--primary);
    }
    /* .btn-outline-primary:hover, .btn-primary:hover {
        background-color: var(--primary-hover);
        border-color: var(--primary-hover);
    } */
    .btn-primary, .btn-outline-primary {
        border-color: var(--primary);
    }
    .btn-outline-primary {
        color: var(--primary);
    }
    #search-addon {
        position: absolute;
        top: 0;
        right: 0px;
        background-color: transparent;
        margin-top: 15px;
        margin-right: 35px;
        z-index: 100;
        cursor: pointer;
        text-decoration: none;
    }
    .row {
        --bs-gutter-x: 0rem;
    }
    .card-img-top {
        height: 150px;
        object-fit: cover;
    }
    @media (min-width: 576px){
        #search {
            flex: 1;
        }
        #add-product {
            flex-basis: 140px;
        }
    }
</style>
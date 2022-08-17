<script>
import axios from 'axios';
// import { ref } from 'vue';

export default {
    data() {
        return {
            products: '',
            loading: true
        }
    },

    methods: {
        getProducts() {
            axios.get('api/products')
                .then(({ data }) => {
                    data.products.forEach((product) => {
                        product['quantity'] = 0;
                    });
                    this.products = data.products;
                    localStorage.productData = JSON.stringify(data.products);
                    this.loading = false;
                })
        },

        addQuote(id) {
            let index = this.products.findIndex(element => element.id == id);
            console.log("£" + this.products[index].quantity * this.products[index].price);
        }
    },

    mounted() {
        if (localStorage.productData) {
            this.products = JSON.parse(localStorage.productData);
            this.loading = false;
        } else {
            this.getProducts();
        }
    }
};
</script>

<template>
    <div class="container">
        <div class="row d-flex flex-column flex-sm-row my-3 justify-content-between">
            <div id="search" class="input-group rounded">
                <input type="search" class="form-control" placeholder="Search for products..." aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">Search</button>
            </div>
        </div>

        <p v-if="loading">Loading...</p>
        <div class="row d-flex flex-column flex-sm-row gap-3 gap-sm-4 my-3 justify-content-between">

            <div class="card col-md-4 p-3" v-for="product in products" :key="product.id">
                <img :src="product.image" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ product.name }}</h5>
                    <p class="card-text">Size: {{ product.weight }} kg</p>
                    <p class="card-text">SKU: {{ product.SKU }}</p>
                    <p class="card-text">£{{ product.price }}</p>
                </div>
                <div class="card-btn">
                    <label for="customRange1" class="form-label">Quantity: {{ product.quantity }}</label>
                    <input type="range" class="form-range " id="customRange1" max="100" v-model="product.quantity">
                    <a href="#" class="btn btn-primary w-100" @click="addQuote(product.id)">Add to Quote</a>
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
.btn-primary,
.btn-outline-primary {
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

.card {
    flex: 1 1 220px;
}

.card-img-top {
    height: 150px;
    object-fit: cover;
}

@media (min-width: 576px) {
    #search {
        flex: 1;
    }

    #add-product {
        flex-basis: 140px;
    }
}
</style>
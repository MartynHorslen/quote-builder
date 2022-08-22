<script>
import axios from 'axios';
import LaravelVuePagination from 'laravel-vue-pagination';

export default {
    components: {
        'Pagination': LaravelVuePagination
    },

    data() {
        return {
            products: {},
            quote: [],
            loading: true,
            quoteActive: false,
            input: '',
            email: ''
        }
    },

    methods: {
        getProducts(page = 1, search = this.input) {
            this.products = [];
            this.loading = true;
            let url = 'api/products';
            if (page) {
                url += '?page=' + page;
            }
            if (search) {
                url += '&search=' + search;
            }
            axios.get(url)
            .then(({ data }) => {
                data.products.data.forEach((product) => {
                    product['quantity'] = 0;
                });
                this.products = data.products;
                localStorage.productData = JSON.stringify(data.products);
                localStorage.input = search;
                this.loading = false;
            })
            .catch((error) => {
                console.log(error);
            });
        },

        addQuote(id) {
            let index = this.products.data.findIndex(element => element.id == id);

            let inQuote = this.quote.findIndex(element => element.id == id);
            console.log(inQuote);

            if (this.products.data[index].quantity > 0) {

                if (inQuote >= 0){
                    this.quote[inQuote].quantity = parseInt(this.quote[inQuote].quantity) + parseInt(this.products.data[index].quantity);
                } else {
                    this.quote.push(JSON.parse(JSON.stringify(this.products.data[index])));
                }

                localStorage.quote = JSON.stringify(this.quote);
            }
        },

        removeItem(index) {
            this.quote.splice(index, 1);
            localStorage.quote = JSON.stringify(this.quote);
        },

        subTotal() {
            return this.quote.reduce((acc, ele) => {
                return acc + (ele.price * ele.quantity);
            }, 0);
        },

        quoteToggle() {
            this.quoteActive = !this.quoteActive;
        },

        newQuote() {
            this.quote = [];
            localStorage.quote = '';
        },

        saveQuote() {
            let url = 'api/products';
            axios.post(url, {
                email: this.email,
                quote: this.quote
            })
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                console.log(error);
            });
        }
    },

    mounted() {
        if (localStorage.productData) {
            this.products = JSON.parse(localStorage.productData);
            this.loading = false;
        } else {
            this.getProducts();
        }
        if (localStorage.input) {
            this.input = localStorage.input;
        }

        if (localStorage.quote) {
            this.quote = JSON.parse(localStorage.quote);
        }
    }
};
</script>

<template>
    <div class="d-flex flex-column flex-md-row">
        <div id="products" class="container col-md-8">
            <div class="row d-flex flex-column flex-sm-row my-3 justify-content-between">
                <div id="search" class="input-group rounded">
                    <input type="search" class="form-control" placeholder="Search for products..." aria-label="Search"
                        aria-describedby="search-addon" v-model="input" />
                    <button type="button" class="btn btn-outline-primary" @click="getProducts(1, input)">Search</button>
                </div>
            </div>

            <Pagination class="justify-content-center" size="small" :limit=3 :data="products" @pagination-change-page="getProducts" />

            <p v-if="loading">Loading...</p>
            <p v-if="!loading && products.length == 0">There are no results. Please try another search.</p>
            <div class="row d-flex flex-column flex-sm-row gap-3 gap-sm-4 my-3 justify-content-between">

                <div class="card col-md-4 p-3" v-for="product in products.data" :key="product.id">
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
                        <button class="btn btn-primary w-100" @click="addQuote(product.id)">Add to Quote</button>
                    </div>
                </div>

            </div>

            <Pagination class="justify-content-center" size="small" :limit=3 :data="products" @pagination-change-page="getProducts" />
        </div>


        <div v-if="quote.length > 0" id="quote" class="col-md-4">
            <div id="quote-summary" class="card p-3">
                <div class="toggleQuote">
                    <!-- <i v-if="quoteActive" class="fa-solid fa-angle-down" @click="quoteToggle()"></i> -->
                    <i v-if="quoteActive" class="fa-solid fa-down-left-and-up-right-to-center"
                        @click="quoteToggle()"></i>
                    <!-- <i v-else class="fa-solid fa-angle-up" @click="quoteToggle()"></i> -->
                    <i v-else class="fa-solid fa-up-right-and-down-left-from-center " @click="quoteToggle()"></i>
                </div>
                <div class="card-body p-0 d-flex flex-column">
                    <h5 class="card-title mb-4">Quote Summary</h5>
                    <ul id="list" v-if="quoteActive" class="px-0">
                        <li class="card-text d-flex flex-column flex-lg-row justify-content-between mb-2"
                            v-for="quoteItem, index in quote" :key="index">
                            <div class="flex-grow-1">
                                <span class="icon" @click="removeItem(index)">
                                    <i class="mb-0 fa-1x fa-solid fa-circle-xmark"></i>
                                </span>
                                <p class="item">{{ quoteItem.name.substr(0, 25) + '...' }} - <span @click="">{{ quoteItem.quantity }}</span>
                                </p>
                            </div>

                            <div class="cost">£{{ (quoteItem.price * quoteItem.quantity).toFixed(2) }}</div>
                        </li>
                    </ul>
                    <div class="total">Total: £{{ subTotal().toFixed(2) }}</div>
                </div>

                    
                <div class="card-btn">
                    <div class="form-outline mb-3">
                        <input class="form-controll w-100" placeholder="Email Address" v-model="email"/>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-primary w-50" @click="newQuote">New Quote</a>
                        <a href="#" class="btn btn-success w-50" @click="saveQuote">Save Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.btn-primary {
    background-color: var(--primary);
}

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

#quote {
    position: sticky;
    bottom: 0;
    padding: 10px 30px;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 150;
}

.toggleQuote {
    position: absolute;
    top: 15px;
    right: 15px;
}

.toggleQuote i {
    font-size: 24px;
    border: 1px solid lightgray;
    padding: 3px;
    border-radius: 5px;
}

.toggleQuote i:hover {
    color: var(--primary);
    border-color: var(--primary);
}

#list {
    overflow-y: scroll;
    padding-top: 10px;
}

.item {
    display: inline;
    margin-left: 10px;
}

.card-body {
    max-height: calc(100vh - 201px);
}

.cost {
    text-align: right;
}

.total {
    text-align: right;
    margin-bottom: 15px
}

@media (min-width: 576px) {
    #search {
        flex: 1;
    }

    #add-product {
        flex-basis: 140px;
    }
}

@media (min-width: 768px) {
    .cost {
        /* flex: 0 0 80px; */
        justify-self: flex-end;
    }

    .icon {
        vertical-align: top;
    }

    #quote {
        background-color: white;
    }

    #products,
    #quote {
        padding: 15px;
    }

    .card-body {
        max-height: unset;
    }

    #list {
        overflow-y: unset;
    }
}
</style>
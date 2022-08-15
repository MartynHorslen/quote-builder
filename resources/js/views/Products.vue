<script>
    export default {};
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
        <div class="card">
            <img src="https://media.jewson.co.uk/f_auto,q_auto/t_Regular/global/product-images/66209" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Jewson Sharp Concreting Sand Single Trip - Large Bunk Bag</h5>
                <p class="card-text">Size: 800kg</p>
                <p class="card-text">SKU: AGSTB005</p>
                <p class="card-text">£71.94</p>
                <p class="card-text">inc VAT Each</p>
                <a href="#" class="btn btn-primary">Add to Quote</a>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/3000" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/3000" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
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
        object-fit: contain;
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
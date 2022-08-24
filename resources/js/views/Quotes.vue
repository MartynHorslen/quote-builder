<script>
export default {
    data() {
        return {
            email: '',
            error: '',
            quotes: [],
            editField: ''
        }
    },

    methods: {
        getQuotes() {
            if (!this.email) {
                this.error = "Please enter an email address.";
                return
            }

            //Regex patterns
            const test = "^[a-z0-9!#$%&'*+\/=?^_`\"{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9\[](?:[a-z0-9-]*[a-z0-9])?(?:\.){0,1})+[a-z]{2}(?:[a-z0-9-]*[a-z0-9])?$";

            //Regex test function
            let regex = new RegExp(test);
            let validEmail = regex.test(this.email);

            if (validEmail) {
                let url = 'api/quotes?email=' + this.email;
                axios.get(url)
                    .then((response) => {
                        this.error = '';
                        this.email = '';
                        this.quotes = response.data;
                    })
                    .catch((error) => {
                        this.error = error;
                    });
            } else {
                this.error = 'Invalid Email';
            }
        },

        total(quote) {
            let itemTotals = []
            quote.items.forEach(item => {
                itemTotals.push(item.quantity * item.product.price);
            })

            return itemTotals.reduce((prev, curr) => prev + curr).toFixed(2);
        },

        focusField(index) {
            this.editField = index;
        },
        blurField() {
            this.editField = '';
        },
        showField(index) {
            return (this.editField === index && this.editField !== '')
        },

        update(id, quantity) {
            console.log(id);
            //validate input to be a number

            //patch request
            let url = `api/update`;
            axios.post(url, {
                'id': id,
                'quantity': quantity
            })
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
};
</script>

<template>
    <div class="container">

        <div class="row d-flex flex-column flex-sm-row my-3 justify-content-between col-md-6 offset-md-3">
            <div id="search" class="input-group rounded">
                <input type="search" class="form-control" placeholder="Enter your email address to find your quotes..."
                    aria-label="Search" aria-describedby="search-addon" v-model="email" />
                <button type="button" class="btn btn-outline-primary" @click="getQuotes">Search</button>
            </div>
            <small v-if="error" class="text-danger">{{ error }}</small>
        </div>

        <div class="card mb-4" v-for="quote in quotes">
            <div class="card-header">
                Quote Number: #{{ quote.id }}
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead class="text-bold">
                        <tr>
                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td class="d-none d-md-block">Price Per Unit</td>
                            <td>Total Cost</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in quote.items">
                            <td>{{ item.product.name }}</td>
                            <td>
                                <span class="field-value" v-show="!showField(item.id)" @click="focusField(item.id)">
                                    {{ item.quantity }} <i class="fa-solid fa-square-pen"></i>
                                </span>
                                <input v-model="item.quantity" @change="update(item.id, item.quantity)"
                                    v-show="showField(item.id)" class="field-value" @focus="focusField(item.id)"
                                    @blur="blurField"><i v-if="showField(item.id)" @click="blurField"
                                    class="fa-solid fa-square-check"></i>
                            </td>
                            <td class="d-none d-md-block">£{{ parseFloat(item.product.price).toFixed(2) }}</td>
                            <td>£{{ parseFloat(item.product.price * item.quantity).toFixed(2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                Sum Total: £<span v-text="total(quote)"></span>
            </div>
        </div>
    </div>

</template>

<style>
.text-bold {
    font-weight: 600;
}

.field-value i {
    font-size: 22px;
    cursor: pointer;
    margin-left: 5px;
    color: DodgerBlue;
    vertical-align: text-top;
}

td>i {
    font-size: 22px;
    cursor: pointer;
    margin-left: 5px;
    color: green;
    vertical-align: text-top;
    margin-bottom: 0;
}

.field-value {
    width: 50px;
}
</style>
<script>
axios.defaults.withCredentials = true;

export default {
    data() {
        return {
            user: null,
            email: '',
            password: ''
        }
    },

    methods: {
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('login', {
                    email: this.email,
                    password: this.password
                })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
            })
        }
    }
};
</script>

<template>
    <!-- If authenticated, show dashboard -->
    <div v-if="user">
        Logged in.
    </div>

    <!-- In unauthenticated, show login form -->
    <div v-else>
        <div class="container col-4 mt-5">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" class="form-control" v-model="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" class="form-control" v-model="password" />
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4" @click="login">Sign in</button>
        </div>
    </div>
</template>
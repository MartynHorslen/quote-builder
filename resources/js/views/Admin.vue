<script>
export default {
    data() {
        return {
            user: null
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
                <input type="email" id="form2Example1" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: ''
        }
    }
};
</script>

<template>
    <div class="container">
        <div class="card col-6 offset-3 p-4">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name"
                    placeholder="Product Name">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input placeholder">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Example label</label>
                <input type="text" class="form-control" id="formGroupExampleInput"
                    placeholder="Example input placeholder">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input placeholder">
            </div>
        </div>
    </div>
</template>
<template>
    <Header title="create category"></Header>
    <form method="POST" action="" class="conatiner mx-4" enctype="multipart/form-data">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" name="name" class="form-control" placeholder="category name" />
        </div>

        <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-warning  mb-4 text-center">create</button>
    </form>
</template>

<!-- scripts -->
<script setup>
/**
 * imports
 */
 import Header from '@/Components/Header.vue'



</script>
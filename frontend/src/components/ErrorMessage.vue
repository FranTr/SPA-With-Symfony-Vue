<template>
    <div class="alert alert-danger" role="alert">
        {{ error.response.data.error }}
    </div>
</template>

<script>
/* eslint-disable */
    export default {
        name: 'errorMessage',
        props: ['error'],
    }
</script>
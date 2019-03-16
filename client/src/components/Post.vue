<template>
    <div class="card w-100 mt-2">
        <div class="card-body">
            {{ message }}
        </div>
    </div>
</template>

<script>
/* eslint-disable */
    export default {
        name: 'post',
        props: ['message'],
    }
</script>
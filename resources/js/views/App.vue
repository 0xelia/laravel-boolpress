<template>
    <div class="app">
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
    data() {
        return {
            title: "BoolPress",
            posts: [],
            currentPage: 1,
            lastPage: 0,
            el: ''
        };
    },

}
</script>

<style lang="scss">
    .app {
        font-family: 'Poppins' !important;
    }
</style>
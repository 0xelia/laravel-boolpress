<template>
    <div class="app">
        <MainHeader/>
        <router-view></router-view>
    </div>
</template>

<script>
        import MainHeader from '../components/MainHeader.vue';

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

    components: {
        MainHeader
    }
}
</script>

<style lang="scss">
    .app {
        font-family: 'Poppins' !important;
    }
</style>
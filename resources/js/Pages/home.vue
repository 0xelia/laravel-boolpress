<template>
    <section>
        <MainHeader/>
        <div class="container">
            <h1 class="text-center">
                {{title}}
            </h1>
        </div>
    </section>
</template>

<script>
    import MainHeader from '../components/MainHeader.vue';

    export default {
        data(){
            return {
                title: 'This is the home'
            }
        },
        components: { MainHeader }
}
</script>

<style lang="scss" scoped>

</style>
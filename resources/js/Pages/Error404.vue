<template>
    <div class="bg-blue-700 text-white w-screen h-screen flex flex-col text-center items-center justify-center">
        <h1 class="text-[64px] text-bold">
            404
        </h1>
        <p>
            Opss.. Sembra che quello che stai cercando non esiste (almeno non più...). <br/>
            <router-link :to="{name: 'home'}" > <span class="underline underline-offset-4"> Vuoi tornare alla Home? </span> </router-link>
        </p>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>
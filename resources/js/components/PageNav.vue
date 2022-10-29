<template>
    <ul class="flex gap-10">
        <li @click="$emit('pageValue', page )" v-for="page in last" :key="page" :class="[ current == page ? 'bg-blue-500' : 'bg-blue-200' ,'h-12 flex justify-center items-center rounded-full text-slate-50 aspect-square']">
            {{page}}
        </li>
    </ul>
</template>

<script>

    export default {

        props: {
            current: Number,
            last: Number
        },
        
    }

</script>

<style lang="scss" scoped>

</style>
<template>
    <div>
        <button @click="deletePost()" class="btn btn-danger btn-sm">
            Elimina
        </button>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props:['id', 'title'],

        methods:{
            deletePost(){
                if(confirm(`Sei sicuro di voler eliminare il post? ${this.title}`)){
                    axios.delete(`/admin/posts/${this.id}`)
                        .then(res => console.log(res))
                        .catch(err => console.log(err))

                        window.location.reload()
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
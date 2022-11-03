<template>
    <div>
        <figure class="w-screen z-0 relative bg-stone-400  aspect-video">
            <img :src="post.cover_path" alt="">
            <h1 class="absolute  bottom-0 left-0 text-white text-[28px] md:text-[42px] p-4 md:p-8 font-bold">
                {{post.title}}
            </h1>
        </figure>
        <div class="container pt-4">
            
            <div class="flex mb-4 flex-col ">

                <ul v-if="post.tags"> What's about: 
                    <div class="flex mt-4 gap-4">

                        <li v-for="tag in post.tags" :key="tag.id" class="px-4 py-1 text-sm bg-blue-500 text-blue-200 rounded-full">
                            {{tag.name}}
                        </li>

                    </div>
                </ul>

                <p v-if="post.category" class="mt-4">
                    In <span class="text-md text-blue-700"> {{post.category.name}} </span>
                </p>

            </div>

            <p class=""> 
                {{post.content}}
            </p>

            <div class="author_credits text-slate-500 mt-4 flex gap-2">
                <p >Written by {{post.user.name}}</p>
                <p>{{post.string_date}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['slug'],

        data(){
            return{
                post: {}
            }
        },

        methods: {
            fetchPost(){
                axios.get(`/api/posts/${this.slug}`)
                    .then(res => {
                        const {post} = res.data
                        this.post = post
                        console.log(this.post)
                    })
                    .catch(err => {
                        const { status } = err.response
                        if(status === 404){
                            this.$router.replace({name: '404'})
                        }
                    })
            }
        },
        

        beforeMount(){
            this.fetchPost()
        }
    }
</script>

<style lang="scss" scoped>

</style>
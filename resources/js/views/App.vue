<template>
    <div>
        <div class="container">
            
            <h1>           
                {{ title }} 
            </h1>
            <ul>
                <li v-for="post in posts" :key="post.id">
                    {{post.title}}
                </li>
            </ul>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                title: 'Bentornato JS',
                posts: []
            }
        },

        methods: {
            fetchPosts(){
                axios.get('/api/posts').then((res)=> {
                    const { posts } = res.data
                    this.posts = posts

                    console.log(posts)
                })
            }
        },

        beforeMount(){
            this.fetchPosts()
        }
    }
</script>

<style lang="scss" scoped>
    #app{
        font-family: 'Poppins' !important;
        background-color: aqua;
    }
</style>
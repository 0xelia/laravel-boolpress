<template>
    <div>
        <MainHeader/>
        <div class="container mx-auto px-2 sm:px-0">
            
            <ul class="post_grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <li v-for="post in posts" class="post_card min-h-600 overflow-hidden rounded p-4 shadow-md" :key="post.id">
                    <PostCard :post="post"/>
                </li>
            </ul>

            <div class="pagination_wrapper flex justify-center py-8">
                <PageNav @pageValue="getPageValue" :current="currentPage" :last="lastPage" />
            </div>
        </div>
    </div>
</template>

<script>
    import MainHeader from '../components/MainHeader.vue';
    import PostCard from '../components/PostCard.vue';
    import PageNav from '../components/PageNav.vue';
    export default {
        data(){
            return {
                posts: [],
                currentPage: 1,
                lastPage: 0,
            }
        },

        components: { 
        PostCard,
        PageNav,
        MainHeader
    },

    methods: {
        fetchPosts(page) {
            axios.get("/api/posts", {
                params: {
                    page: page
                }
            })
            .then((res) => {
                const {data, last_page, current_page} = res.data.results;
                this.posts = data,
                this.lastPage = last_page,
                this.currentPage = current_page

                console.log(this.posts)
            });
        },


        getPageValue(data){
            this.currentPage = data

            this.fetchPosts(this.currentPage)
        }

    },

    beforeMount() {
        this.fetchPosts();
    },
    }
</script>

<style lang="scss" scoped>

</style>
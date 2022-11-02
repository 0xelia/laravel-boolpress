import home from '../Pages/home.vue'
import PostsIndex from '../Pages/PostsIndex.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: home
    },
    {
        path: '/posts',
        name: 'posts.index',
        component: PostsIndex
    }
]

export default routes;
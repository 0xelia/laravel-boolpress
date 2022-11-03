import home from '../Pages/home.vue'
import PostsIndex from '../Pages/PostsIndex.vue';
import PostShow from '../Pages/PostShow.vue';
import Error404 from '../Pages/Error404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: home
    },
    {
        path: '/posts',
        name: 'posts-index',
        component: PostsIndex
    },
    {
        path: '/posts/:slug',
        name: 'posts-show',
        component: PostShow,
        props: true
    },
    {
        path: '/posts/*',
        name: '404',
        component: Error404,
    }
]

export default routes;
<template>
        <div class="card_wrapper  group flex  h-full flex-col grow">
            <figure v-if="post.cover" class="post_cover -mx-4 h-1/2 overflow-hidden -mt-4">
                <img  class="max-h-80 aspect-video object-fit object-center" :src="post.cover_path" alt="">
            </figure>
            <div v-if="!post.cover" class="default_cover h-80 group-hover:bg-blue-300 flex justify-center items-center">
                <svg class="group-hover:fill-blue-500 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            </div>
            <div class="post-infos pt-4 flex gap-2 items-center">
                <h6 class="text-sm text-slate-500 ">
                    Written by <span class="font-bold text-sm"> {{ post.user.name }} </span>
                </h6>
                <span class="w-1 h-1 rounded-full bg-slate-500">
                </span>
                <p class="text-sm text-slate-500">
                    {{post.string_date}}
                </p>
            </div>
            <h4 class="text-md font-bold group-hover:text-slate-700 text-slate-500">
                {{ post.title }}
            </h4>
            <div class="post_category flex items-start gap-2 grow">
                <p v-if="post.category" class="text-sm text-slate-500 ">
                    {{post.category.name}} 
                </p>
            </div>
            <ul class="tags flex flex-wrap gap-2">
                <li class="px-4 py-1 text-sm bg-blue-500 text-blue-200 rounded-full" v-for="tag in post.tags" :key="tag.id" >
                    {{ tag.name }}
                </li>
            </ul>
        </div>
</template>

<script>
    export default {

        props: {
            post: Object,
            required: true
        }
    }
</script>

<style lang="scss" scoped>

    .card_wrapper{
    }

        img{
            object-fit: cover;
            object-position: center;
        }

        .post_cover{
            
        }
        .default_cover{
            background-color: rgba(211, 211, 211);
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            
            svg{
                max-height: 160px;
                fill: rgb(157, 155, 155);
            }
            
        }
    
</style>
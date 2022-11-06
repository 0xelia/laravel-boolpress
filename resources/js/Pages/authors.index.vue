<template>
    <section>
        <div class="container">

            <!-- Authors List -->
            <ul class=" flex flex-cols-4 gap-2">

                <li @click="setAnimation()" v-for="author in authors" :key="author.id" :class="animation ? 'blow_up' : '' " class="card rounded-md group hover:scale-110 hover:bg-blue-700 hover:text-white transition-all shadow-lg w-full h-36 flex gap-8 overflow-hidden">
                    <figure v-if="author.profile_pic">
                        <img :src="author.profile_pic_path" alt="" class="h-full">
                    </figure>

                    <!-- author infos -->
                    <div class="flex flex-col justify-center p-2 gap-2">

                        <p class="font-bold text-gray-500 group-hover:text-white transition-all ">
                            {{ author.name }}
                        </p>

                        <p>
                            Posts: <span class="font-md font-bold"> {{author.posts.length}} </span>
                        </p>

                        <!-- author icons -->
                        
                    </div>
                    <div  :class="['ml-auto justify-center itams-center flex flex-col p-2 group-hover:fill-white fill-slate-500 gap-4']">
                        <svg class="h-4 group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M287.9 0C297.1 0 305.5 5.25 309.5 13.52L378.1 154.8L531.4 177.5C540.4 178.8 547.8 185.1 550.7 193.7C553.5 202.4 551.2 211.9 544.8 218.2L433.6 328.4L459.9 483.9C461.4 492.9 457.7 502.1 450.2 507.4C442.8 512.7 432.1 513.4 424.9 509.1L287.9 435.9L150.1 509.1C142.9 513.4 133.1 512.7 125.6 507.4C118.2 502.1 114.5 492.9 115.1 483.9L142.2 328.4L31.11 218.2C24.65 211.9 22.36 202.4 25.2 193.7C28.03 185.1 35.5 178.8 44.49 177.5L197.7 154.8L266.3 13.52C270.4 5.249 278.7 0 287.9 0L287.9 0zM287.9 78.95L235.4 187.2C231.9 194.3 225.1 199.3 217.3 200.5L98.98 217.9L184.9 303C190.4 308.5 192.9 316.4 191.6 324.1L171.4 443.7L276.6 387.5C283.7 383.7 292.2 383.7 299.2 387.5L404.4 443.7L384.2 324.1C382.9 316.4 385.5 308.5 391 303L476.9 217.9L358.6 200.5C350.7 199.3 343.9 194.3 340.5 187.2L287.9 78.95z"/></svg>
                        <svg class="h4 submit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 24c0-9.6 5.7-18.2 14.5-22s19-2 26 4.6l144 136c4.8 4.5 7.5 10.8 7.5 17.4s-2.7 12.9-7.5 17.4l-144 136c-7 6.6-17.2 8.4-26 4.6s-14.5-12.5-14.5-22V224H352 337.5c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8h-2.5c-2.4 0-4.8-.4-7.1-1.4C242.8 374.8 160 333.4 160 240c0-79.5 64.5-144 144-144h80V24zM0 144C0 99.8 35.8 64 80 64H96c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V416c0-17.7 14.3-32 32-32s32 14.3 32 32v16c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V144z"/></svg>
                        <svg class="h-4 heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z"/></svg>
                    </div>
                </li>

            </ul>

        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                authors: {},
                animation: false
            }
        },

        methods: {
            fetchAuthors(){
                axios.get('api/users')
                    .then(res => {
                        const { results } = res.data
                        this.authors = results

                        this.authors.forEach(el => {
                            console.log(el.posts.length)
                            
                        });
                    })
                    .catch(err => console.log(err))
            },

            setAnimation(){
                return this.animation = true
            }
        },

        beforeMount(){
            this.fetchAuthors()
        }
    }
</script>

<style lang="scss" scoped>
    .card{
        svg{
            transition: all 500ms;
            transform: translateX(200%);
        }
        .submit{

            transition-delay: 100ms;
        }

        .heart{
            transition-delay: 200ms;
        }

        &:hover svg{
            transform: translate(0);
        }

        &.blow_up{
        animation-name: blow_up;
        animation-timing-function: ease-in-out;
        animation-fill-mode: forwards;
        animation-duration: 700ms;
    }

    @keyframes blow_up{
        from{
            height: 144px
        }

        to{
            height: 100vh;
            width: 100vw
        }
    }
    }



</style>
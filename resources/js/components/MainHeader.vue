<template>
    <header class="flex items-center justify-between h-16 mb-8 mx-6 border-b-2 border-slait-700">
                <h1 class="text-2xl text-blue-700 font-bold">           
                    {{ title }} 
                </h1>
                
            <div class="nav hidden md:flex flex gap-4 items-center">
                <a 
                    class=" order-3 px-4 py-2 border border-solid border-blue-700 text-blue-700 transition-all rounded 
                    hover:bg-blue-700 hover:text-slate-50"  
                    href="/admin">
                    Authors Area
                </a>
                <a v-for="(btn, i) in nav" :key="i" class="leading-10 text-slate-700 after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:rounded-full after:block after:bg-blue-700"
                :href="btn.href">
                    {{ btn.name }}
                </a>
            </div>
            <div class="dropdown_wrapper flex gap-2 items-end flex-col md:hidden">
                    <div v-for="(i) in 3" :key="i" @click="showDropDown()" :class="[ i === 2 ? 'w-6' : 'w-8' ,'h-0.5 bg-slate-500']"></div>
                    <div :class="[dropdown ? 'block' : 'hidden' ,'dropdown absolute flex justify-end inset-0 bg-white/30 backdrop-blur-sm']">
                        <div :class="[dropdown ? 'animate__animated animate__slideInRight' : 'animate__animated animate_slideOutRight' ,'dropdown flex flex-col transition-all translate-x-full duration-1000 h-full relative w-3/4 bg-blue-700']">
                            <div class="dropdown_body grow">

                                <i @click="hideDropDown()"  class="fa-solid fa-x absolute top-0 left-0 p-8 text-white"></i>
                                
                                <ul class="dropbox_menu flex flex-col pt-24 pl-8 gap-6 mb-6">
                                    <li v-for="(btn, i) in nav" :key="i" class="text-white" >
                                        <a :href="btn.href">
                                            {{ btn.name }}
                                        </a>
                                    </li>  
                                </ul>
                                
                            <a 
                            class=" inline order-3 ml-8 px-4 py-2 border border-solid border-white text-white transition-all rounded "  
                            href="/admin">
                                Authors Area
                            </a>

                        </div>
                            <div class="logo_dropdown mb-4">
                                <hr class="m-8 mb-2 text-white">
                                <h3 class="text-white font-bold text-2xl text-center">
                                    BoolPress
                                </h3>
                            </div>

                        </div>
                    </div>
            </div>
    </header>
</template>

<script>
import { brotliCompress } from 'zlib';

    export default {
        data() {
            return {
                title: 'BoolPress',
                nav: [
                    {
                        name: 'Authors',
                        href: '#'
                    },
                    {
                        name: 'Categories',
                        href: '#'
                    },
                    {
                        name: 'Tags',
                        href: '#'
                    }
                ],
                dropdown: false,    
            }
        },

        methods: {
            showDropDown(){
                return this.dropdown = true
            },

            hideDropDown(){
                this.dropdown = false
                return this.setHidden()
            },
            setHidden(){
                return setTimeout(function(){
                    return 'hidden'
                },1000)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
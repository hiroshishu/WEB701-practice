<template>
    <div class="container">
        <div class="berry-market mt-5" id="marketplace">
            <div>
                <div class="dropdown float-right">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{categories[0]&&currCat?categories[currCat-1].name:'Category'}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <router-link class="dropdown-item text-center" :to="{name: 'marketplace', query: {cat: cat.id}}" v-bind:key="cat.id" v-for="cat in categories">{{cat.name}}</router-link>
                    </div>
                </div>
                <h4 class="">Marketplace | <small class="text-secondary">There are currently active bids here</small></h4>
            </div>

            <ul class="mt-4 overflow-hidden">
                <item-thumb v-for="item in itemList.data" v-bind:key="item.id" v-bind:item="item" v-bind:categories="categories"></item-thumb>
            </ul>

            <div>
                <div class="dropup float-right">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{categories[0]&&currCat?categories[currCat-1].name:'Category'}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <router-link class="dropdown-item text-center" :to="{name: 'marketplace', query: {cat: cat.id}}" v-bind:key="cat.id" v-for="cat in categories">{{cat.name}}</router-link>
                    </div>
                </div>

                <Pagination :item-list="itemList" :curr-cat="currCat"></Pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import ItemThumb  from './ItemThumb.vue';
    import Pagination from './Pagination.vue';

    export default {
        data: function(){
            return {
                categories:[],
                itemList: [],
                currCat:    this.$route.query.cat,
                currPage:   this.$route.query.page
            }
        },
        components: {
            ItemThumb, Pagination
        },
        watch: {
            $route(nVal){
                this.currCat = nVal.query.cat
                this.currPage = nVal.query.page
                this.fetchItems(this.currPage, this.currCat)
                $("html, body").stop().animate({scrollTop: 0});
            }
        },
        created() {
            this.fetchCategories().then(()=>{
                this.fetchItems(this.currPage, this.currCat)
            }) 
        },
        methods: {
            fetchCategories(){
                return this.$http.get('/api/categories')
                    .then( res => {
                        this.categories = res.data
                    })
            },
            fetchItems(page, cat){
                this.$http.get('/api/items?page=' + (page||1) + (cat ? '&cat='+cat : ''))
                    .then(res => {
                        this.itemList = res.data
                })
            },

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
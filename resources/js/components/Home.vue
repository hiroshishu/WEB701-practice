<template>
    <div class="container">
        <div class="berry-banner " style="background-image:url(./images/index-bg.jpg)">
            <div class="content w-50">
                <h1>Nelson branch of Independent Berry Growers New Zealand</h1>
                <p>Curabitur pulvinar odio consequat, sollicitudin velit in, eleifend nulla. Phasellus fringilla mi sit amet diam porta hendrerit. Phasellus porttitor ultricies porta. Etiam vitae hendrerit diam. Nunc malesuada enim sapien, nec volutpat lectus ullamcorper quis. </p>
            </div>
        </div>

        <div class="berry-market" id="marketplace">
            <div>
                <div class="float-right">
                    <router-link class="badge badge-dark" to="/marketplace">View More</router-link>
                </div>
                    
                <h4 class="">Marketplace | <small class="text-secondary">There are currently active bids here</small></h4>
            </div>

            <ul class="mt-4 overflow-hidden">
                <item-thumb v-for="item in itemList" v-bind:key="item.id" v-bind:item="item" v-bind:categories="categories"></item-thumb>
            </ul>
        </div>
    </div>
</template>

<script>
    import ItemThumb from './ItemThumb.vue';

    export default {
        data: function(){
            return {
                categories: [],
                itemList: []
            }
        },
        created() {
            this.fetchCategories().then(this.fetchItems)
        },
        components: {
            ItemThumb
        },
        methods: {
            fetchItems(cat, page){
                this.$http.get('items?page=1')
                    .then(res => {
                        this.itemList = res.data.data
                })
            },
            fetchCategories(){
                return this.$http.get('categories')
                    .then(res => {
                        this.categories = res.data
                    })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss">
.berry-banner 
{
    padding: 7.5rem 0;
    background: url() center right no-repeat;
    background-size: 40%;
    h1  {
        font-family: 'Work Sans', sans-serif;
    }
}

</style>

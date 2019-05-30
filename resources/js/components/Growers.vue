<template>
    <div class="growers container">
        <h3 class="my-4">Gegistered Growers</h3>
        <div class="card-columns">
            <div class="card" v-for="grower in growers.data" v-bind:key="grower.id">
                <!-- <img :src="'https://api.adorable.io/avatars/285/' + grower.email + '.png'" class="card-img-top" alt="..."> -->
                <img :src="'https://ui-avatars.com/api/?name='+grower.name" alt="" >
                <div class="card-body">
                    <h5 class="card-title">{{grower.name}}</h5>
                    <p class="card-text">{{grower.email}}</p>
                    <p class="card-text">{{grower.phone}}</p>
                    <p class="card-text">{{grower.address}}</p>
                    <p class="card-text">{{grower.intro}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Registerd at {{grower.created_at|dateOffset}}</small>
                </div>
            </div>
        </div>
        <Pagination :item-list="growers" v-if="growers.last_page>1" class="justify-content-center mt-5"></Pagination>
    </div>
</template>

<script>
import Pagination from './Pagination.vue';

export default {
    data: function(){
        return {
            growers: [],
            currPage: 1
        }
    },
    components: {
        Pagination
    },
    watch: {
        $route(nVal){
            this.currPage = nVal.query.page
            this.fetchUsers(this.currPage)
            $("html, body").stop().animate({scrollTop: 0})
        }
    },
    created() {
        this.fetchUsers(this.currPage)
    },
    methods: {
        fetchUsers(page=1){
            this.$http.get('growers?page=' + page)
                .then(res => {
                    this.growers = res.data
            })
        }
    }
}
</script>

<style lang="scss">
    
</style>

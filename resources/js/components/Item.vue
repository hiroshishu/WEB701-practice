<template>
    <div class="container berry-item-detail">
        <div class="row my-4">
            <div class="col info pr-5">
                <p class="text-secondary">{{itemInfo.category_id&&categories[itemInfo.category_id-1].name}}</p>
                <h4>{{itemInfo.title.replace('.','')}}</h4>
                <h5 class="my-3">Quantiti: <span class="text-secondary">{{itemInfo.quantiti}} KG</span></h5>

                <h5>Start Price: <span class="text-secondary">${{itemInfo.price}}</span></h5>
                <form class="form-inline my-3">
                    <div class="form-group mr-3 mb-2">
                        <input class="form-control" type="text" placeholder="Place your bid">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Bid</button>
                </form>
                <p class="text-secondary">Close at: {{itemInfo.end_time}}</p>

                <h5 class="mt-5">Description:</h5>
                <p class="text-secondary">{{itemInfo.description}}</p>

                <dl class="quality my-5 clearfix">
                    <dt class="pb-2"><h5>Quality</h5></dt>
                    <dd class="text-secondary"><b>Color: </b> {{itemInfo.color}}</dd>
                    <dd class="text-secondary"><b>Size: </b> {{itemInfo.size}}</dd>
                    <dd class="text-secondary"><b>Flavor: </b> {{itemInfo.flavor}}</dd>
                </dl>

                <dl class="grower my-5">
                    <dt class="pb-2"><h5>Grower</h5></dt>
                    <dd class="text-secondary"><b>Name: </b> {{itemInfo.color}}</dd>
                    <dd class="text-secondary"><b>Phone: </b> {{itemInfo.phone}}</dd>
                    <dd class="text-secondary"><b>Address: </b> {{itemInfo.address}}</dd>
                </dl>
            </div>
            <div class="col img overflow-hidden">
                <div class="img-box">
                    <span :style="itemInfo.category_id&&'background-image:url(/images/cat_'+ itemInfo.category_id +'.png)'"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    .berry-item-detail{
        .quality {
            dd {
                float: left;
                margin-right: 10%;
            }
        }
        .grower {
            dd b {
                display: inline-block;
                width: 15%;
            }
        }
    }
</style>


<script>
    export default {
        data: function(){
            return {
                categories:[],
                itemInfo: {title:'',},
                itemId: this.$route.params.id
            }
        },
        watch: {
            
        },
        created() {
            this.fetchCategories().then(()=>{
                this.fetchItemOne(this.itemId)
            }) 
        },
        methods: {
            fetchCategories(){
                return this.$http.get('/api/categories')
                    .then( res => {
                        this.categories = res.data
                    })
            },
            fetchItemOne(id){
                this.$http.get('/api/items/' + id)
                    .then(res => {
                        this.itemInfo = res.data
                })
            },

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
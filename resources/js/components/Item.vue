<template>
    <div class="container berry-item-detail">
        <div class="row my-4">
            <div class="col info pr-5">
                <p class="text-secondary">{{itemInfo.category_id&&categories[itemInfo.category_id-1].name}}</p>
                <h4>{{itemInfo.title}}</h4>
                <h5 class="my-3">Quantiti: <span class="text-secondary">{{itemInfo.quantiti}} KG</span></h5>

                <h5 v-if="itemInfo.currentBid" class="item-price"><span v-if="!hasExpired">Current</span><span v-else>Highest</span> Bid: <span class="text-secondary">${{itemInfo.currentBid}}</span></h5>
                <h5 v-else class="item-price">Start Price: <span class="text-secondary">${{itemInfo.price}}</span></h5>

                <div v-if="!hasExpired">
                    <p class="mb-1 mt-3" v-if="itemInfo.currentBid">Next minimum bid</p>
                    <form class="form-inline mb-2" :class="{'mt-3': !itemInfo.currentBid}">
                        <div class="input-group mr-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input class="form-control" type="text" placeholder="Place your bid" v-model="nextBid">
                        </div>
                        <button type="submit" class="btn btn-primary" @click="makeBid">Bid</button>
                    </form>
                    <p class="text-danger" v-if="bidError">{{bidError}}</p>
                    <p class="text-secondary">Closes at: {{itemInfo.end_time||''|dateOffset}}</p>
                </div>

                <div v-else>
                    <p class="text-danger">The auction has expired</p>
                </div>
               
                <h5 class="mt-5">Description</h5>
                <p class="text-secondary">{{itemInfo.description}}</p>

                <dl class="quality my-5 clearfix">
                    <dt class="pb-2"><h5>Quality</h5></dt>
                    <dd class="text-secondary"><b>Color: </b> {{itemInfo.color}}</dd>
                    <dd class="text-secondary"><b>Size: </b> {{itemInfo.size}}</dd>
                    <dd class="text-secondary"><b>Flavor: </b> {{itemInfo.flavor}}</dd>
                </dl>

                <dl class="grower my-5">
                    <dt class="pb-2"><h5>Grower</h5></dt>
                    <dd class="text-secondary"><b>Name: </b> {{itemInfo.user_name}}</dd>
                    <dd class="text-secondary"><b>Phone: </b> {{itemInfo.user_phone}}</dd>
                    <dd class="text-secondary"><b>Address: </b> {{itemInfo.user_address}}</dd>
                    <dd class="text-secondary"><b>Email: </b> {{itemInfo.user_email}}</dd>
                </dl>
            </div>
            <div class="col img overflow-hidden">
                <div class="img-box">
                    <span :style="itemInfo.category_id&&'background-image:url(./images/cat_'+ itemInfo.category_id +'.png)'"></span>
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
                itemInfo: {title:''},
                nextBid: 0,
                bidError: '',
                itemId: this.$route.params.id,
                hasExpired: false
            }
        },
        created() {
            this.fetchCategories().then(()=>{
                this.fetchItemOne(this.itemId)
            }) 
        },
        computed:{
            minimumBid(){
                return  +this.itemInfo.currentBid ? +this.itemInfo.currentBid + 10 : +this.itemInfo.price;
            }
        },
        methods: {
            fetchCategories(){
                return this.$http.get('categories')
                    .then( res => {
                        this.categories = res.data
                    })
            },
            dateOffset(val) {
                var time = new Date(val.replace(/-/g, '/')), _time = time.getTime(),
                offset = time.getTimezoneOffset();
                return new Date(_time - offset * 60 * 1000);
            },
            fetchItemOne(id){
                this.$http.get('items/' + id)
                    .then(res => {
                        this.itemInfo = res.data
                        this.nextBid = this.minimumBid;

                        var now = (new Date()).getTime();
                        var endTime = this.dateOffset(this.itemInfo.end_time).getTime();
                        this.hasExpired = (now > endTime);
                })
            },
            makeBid(evt){
                evt.preventDefault()
                if(this.itemInfo.user_id == USER_ID){
                    this.bidError = 'You cannot make a bid for your items';
                    return;
                }
                if(!+this.nextBid || (this.minimumBid > +this.nextBid)){
                    this.bidError = 'You need to bid at least the minimum next bid of $' + this.minimumBid;
                    return;
                }
                this.$http.post('bid/'+this.itemId, {
                    user_id: USER_ID,
                    amount: this.nextBid
                }).then(res => {
                    this.bidError = '';
                }).catch(err => {
                    console.log(err.message)
                })
            }
        },
        mounted() {
            $("html, body").stop().animate({scrollTop: 0});

            socket.on(`NewBid${this.itemId}`, data => {
                this.itemInfo.currentBid = data.currentTotal;
                this.nextBid = this.minimumBid;
                $('.item-price').fadeOut(400).fadeIn(400);
            });

            console.log('Component mounted.');
        }
    }
</script>
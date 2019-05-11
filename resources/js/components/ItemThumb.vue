<template>
    <li class="float-left mb-1 item-info">
        <figure class="figure">
            <div class="img-box">
                <router-link :to="'/item/'+item.id" :style="'background-image:url(/images/cat_'+ item.category_id +'.png)'">
                </router-link>
            </div>
            <figcaption class="figure-caption mt-2 text-truncate"><b>{{categories[item.category_id-1].name+': '+item.title}}</b></figcaption>
            <figcaption class="figure-caption mt-1 text-truncate "><span class="float-right text-danger">${{item.price}}</span><span class="text-info">{{item.quantiti}} KG</span></figcaption>
        </figure>
    </li>
</template>

<script>
export default {
    props: ['item', 'categories']
}
</script>


<style lang='scss'>
    li.item-info {
        list-style: none;
        width: 18%;
        margin-right: 2.5%;
        &:nth-child(5n) {
            margin-right: 0;
        }
        figure {
            width: 100%;
        }
    }
</style>

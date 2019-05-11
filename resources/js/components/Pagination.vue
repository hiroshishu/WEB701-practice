<template>
    <ul class="pagination mt-3">
        <li class="page-item" :class="{'disabled': itemList.current_page == 1}">
            <router-link class="page-link" :to="{query: {cat: currCat, page: itemList.current_page-1}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </router-link>
        </li>

        <li class="page-item" v-for="i in itemList.last_page" :class="{'disabled': i==itemList.current_page}">
            <router-link class="page-link" :to="{query: {cat: currCat, page: i}}" v-text="i"></router-link>
        </li>
        
        <li class="page-item" :class="{'disabled': itemList.current_page == itemList.last_page}">
            <router-link class="page-link" :to="{query: {cat: currCat, page: itemList.current_page+1}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['itemList', 'currCat', 'dest']
}
</script>

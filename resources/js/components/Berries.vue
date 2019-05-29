<template>
    <div class="berries container">
       <h3 class="mt-3 mb-5">Learn more about berries</h3>
        <div class="row mb-5">
            <div class="col">
                <figure class="figure float-left">
                    <div class="img-box">
                        <router-link :to="'/marketplace?cat=1'" :style="'background-image:url(./images/cat_1.png)'">
                        </router-link>
                    </div>
                </figure>
                <div class="intro">
                    <h4>Strawberry</h4>
                    <dl>
                        <dt>Characteristics</dt>
                        <dd>It is cultivated worldwide for its fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness.</dd>
                        <dt>Usage</dt>
                        <dd>This can help improve digestion, especially for those with constipation or irregular stools. 5. </dd>
                        <dt>Benefit</dt>
                        <dd>As a great source of fiber, vitamin C, and antioxidants, strawberries can benefit your health in the following ways.</dd>
                    </dl>
                </div>
                <div class="float-right">
                    <router-link class="badge badge-dark" to="/marketplace?cat=1">Go to market</router-link>
                </div>
            </div>
            <div class="col">
                <figure class="figure float-left">
                    <div class="img-box">
                        <router-link :to="'/marketplace?cat=2'" :style="'background-image:url(./images/cat_2.png)'">
                        </router-link>
                    </div>
                </figure>
                <div class="intro">
                    <h4>Raspberry</h4>
                    <dl>
                        <dt>Characteristics</dt>
                        <dd>They may be eaten raw or cooked and commonly are used in pies, jams and jellies. Luckily, raspberry plants are self-fruitful.</dd>
                        <dt>Usage</dt>
                        <dd>Raspberries decrease oxidative damage from free radicals and have shown potential in animal and human studies for preventing or reducing risk of chronic diseases including cancer and heart disease.</dd>
                        <dt>Benefit</dt>
                        <dd>Raspberries contain strong antioxidants such as Vitamin C, quercetin and gallic acid that fight against cancer, heart and circulatory disease and age-related decline. </dd>
                    </dl>
                </div>
                <div class="float-right">
                    <router-link class="badge badge-dark" to="/marketplace?cat=2">Go to market</router-link>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <figure class="figure float-left">
                    <div class="img-box">
                        <router-link :to="'/marketplace?cat=3'" :style="'background-image:url(./images/cat_3.png)'">
                        </router-link>
                    </div>
                </figure>
                <div class="intro">
                    <h4>Cranberry</h4>
                    <dl>
                        <dt>Characteristics</dt>
                        <dd>As one of its common names states this particular species of cranberry is very small. It is a creeping plant with tiny (1/4"), alternating, white bottoms, rolled edges, egg shaped, somewhat pointed leaves on delicate stalks which branch upwards.</dd>
                        <dt>Usage</dt>
                        <dd>The cranberry is perhaps best known for its role in preventing urinary tract infections (UTIs), especially for those with recurrent infections.</dd>
                        <dt>Benefit</dt>
                        <dd>The nutrients in cranberries have been linked to a lower risk of urinary tract infections, prevention of certain types of cancer, improved immune function, and decreased blood pressure. </dd>
                    </dl>
                </div>
                <div class="float-right">
                    <router-link class="badge badge-dark" to="/marketplace?cat=3">Go to market</router-link>
                </div>
            </div>
            <div class="col">
                <figure class="figure float-left">
                    <div class="img-box">
                        <router-link :to="'/marketplace?cat=4'" :style="'background-image:url(./images/cat_4.png)'">
                        </router-link>
                    </div>
                </figure>
                <div class="intro">
                    <h4>Blueberry</h4>
                    <dl>
                        <dt>Characteristics</dt>
                        <dd>The common blueberry (Vaccinium myrtillus) is a deciduous plant which is between 20 and 60 cm in height. Stems light green, hairless, with four marked angles. </dd>
                        <dt>Usage</dt>
                        <dd>One cup of blueberries provides 24 percent of a person recommended daily allowance of vitamin C.</dd>
                        <dt>Benefit</dt>
                        <dd> Blueberries are the King of Antioxidant Foods. Blueberries Reduce DNA Damage, Which May Help Protect Against Aging and Cancer. Blueberries Protect Cholesterol in Your Blood From Becoming Damaged. </dd>
                    </dl>
                </div>
                <div class="float-right">
                    <router-link class="badge badge-dark" to="/marketplace?cat=4">Go to market</router-link>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <figure class="figure float-left">
                    <div class="img-box">
                        <router-link :to="'/marketplace?cat=5'" :style="'background-image:url(./images/cat_5.png)'">
                        </router-link>
                    </div>
                </figure>
                <div class="intro">
                    <h4>Blackberry</h4>
                    <dl>
                        <dt>Characteristics</dt>
                        <dd>Most domesticated varieties grow on tall, stiff canes, and their shiny reddish-black fruits ripen in late summer.</dd>
                        <dt>Usage</dt>
                        <dd>They're packed with vitamin C. Just one cup of raw blackberries has 30.2 milligrams of vitamin C. That's half the daily recommended value. </dd>
                        <dt>Benefit</dt>
                        <dd>Blackberries contain a wide array of important nutrients including potassium, magnesium and calcium, as well as vitamins A, C, E and most of our B vitamins. </dd>
                    </dl>
                </div>
                <div class="float-right">
                    <router-link class="badge badge-dark" to="/marketplace?cat=5">Go to market</router-link>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</template>

<style lang="scss">
.berries {
    
    figure {
        width: 40%;
    }
    .intro {
        margin-left: 45%;
        dt { font-size: 1rem }
        dd { color: #666 }
    }
    
}
</style>


<script>
export default {
    
}
</script>

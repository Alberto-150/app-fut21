<template>
    <div>    
        <header class="content-header">
            <div>
                <img src="/assets/img/balon.png" alt="" title="">
                <a href="/"></a>
            </div>
        </header>

        <router-view></router-view>

        <!-- <List></List> -->

        <footer>
            <div class="content-footer">
                <img class="content-footer--logo" src="/assets/img/copa.png">
                <div class="content-footer--name">
                    <p>2022 - Alberto Garcia</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import List from './pages/List.vue';

    export default {
        components: {
            'List': List,
        },
    }
</script>

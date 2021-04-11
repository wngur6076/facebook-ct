<template>
    <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
        <p v-if="authUserStatus">Loading AuthUser...</p>
        <Nav v-else/>

        <div class="flex overflow-y-hidden flex-1">
            <Sidebar />

            <div class="overflow-x-hidden w-2/3">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import Nav from './Nav';
    import Sidebar from './Sidebar';
    import { mapGetters } from 'vuex';

    export default {
        name: "App",

        components: {
            Nav,
            Sidebar
        },

        computed: {
            ...mapGetters({
                authUserStatus: 'authUserStatus'
            })
        },

        mounted() {
            this.$store.dispatch('fetchAuthUser');
        },

        created() {
            this.$store.dispatch('setPageTitle', this.$route.meta.title);
        },

        watch: {
            $route(to, from) {
                this.$store.dispatch('setPageTitle', to.meta.title);
            }
        }
    }
</script>

<style scoped>

</style>

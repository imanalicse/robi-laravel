<template>
    <el-container>
        <admin-aside-menu></admin-aside-menu>
        <el-container>
            <el-header>
                <admin-top-menu></admin-top-menu>
            </el-header>
            <el-main>
                <user-list v-if="view.list === true"></user-list>
                <add-user v-if="view.add === true"></add-user>
                <edit-user v-if="view.edit === true"></edit-user>
            </el-main>
            <admin-footer></admin-footer>
        </el-container>
    </el-container>
    
</template>

<script>
export default {
    props: ['token'],
    data() {
        return {
            
        }
    },
    
    created() {
        this.update_token(this.token);
    },

    computed: {
        view() {
            return this.$store.state.users.view;
        }
    },

    methods: {
        update_token(token) {
            this.$store.commit( 'UPDATE_TOKEN', token );
        }
    }
}
</script>

<style scoped>

</style>

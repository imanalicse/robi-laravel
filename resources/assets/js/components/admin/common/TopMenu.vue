<template>
    <el-menu class="app-top-menu" mode="horizontal" @select="handleSelect">
        <el-submenu index="1">
            <template slot="title">
                <i class="icofont-alarm icofont-2x"></i>
            </template>
            <el-menu-item index="1-1"><i class="icofont-alarm"></i> 
                John Doe subscribed!
            </el-menu-item>
            <el-menu-item index="1-2"><i class="icofont-alarm"></i> 
                You Have a new message
            </el-menu-item>
        </el-submenu>
        <el-submenu index="2">
            <template slot="title">
                <i class="icofont-folder-open icofont-2x"></i>
            </template>
            <el-menu-item index="2-1"><i class="icofont-folder-open"></i> 
                English
            </el-menu-item>
            <el-menu-item index="2-2"><i class="icofont-folder-open"></i> 
                German
            </el-menu-item>
        </el-submenu>

        <el-submenu index="3">
            <template slot="title">
                <i class="icofont-funky-man icofont-2x"></i>
                <span class="loggedin-user">John Doe</span>
            </template>
            <el-menu-item index="3-1"><i class="icofont-paper"></i> Profile</el-menu-item>
            <el-menu-item index="3-2" @click="logout"><i class="icofont-ui-power"></i>Logout</el-menu-item>
        </el-submenu>
    </el-menu>
</template>

<script>
export default {
    methods: {
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        },

        logout() {
            location.href = '/logout';
        }
    }
}
</script>

<style scoped>

</style>


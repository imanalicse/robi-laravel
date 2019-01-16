<template>

    <el-aside width="230px">
        <el-row class="tac">
            <div class="app-logo-container">
                <span class="brand-name">69 Movie Station</span>
            </div>
            <el-col>
                <el-menu
                    default-active="1"
                    class="app-aside-menu"
                    @open="handleOpen"
                    @close="handleClose"
                    background-color="#545c64"
                    text-color="#fff"
                    active-text-color="#ffd04b">

                    <el-menu-item index="1">
                        <i class="icofont-dashboard icofont-2x"></i>
                        <a href="/home">Dashboard</a>
                    </el-menu-item>

                    <el-menu-item index="2">
                        <i class="icofont-video-cam icofont-2x"></i>
                        <a href="/movies">Movies</a>
                    </el-menu-item>

                    <el-menu-item index="3">
                        <i class="icofont-video-clapper icofont-2x"></i>
                        <a href="tv-shows">TV Shows</a>
                    </el-menu-item>
                    
                    <el-menu-item index="4">
                        <i class="icofont-music icofont-2x"></i>
                        <a href="/music">Music</a>
                    </el-menu-item>

                    <el-menu-item index="5">
                        <i class="icofont-funky-man icofont-2x"></i>
                        <a href="/actors">Actors</a>
                    </el-menu-item>

                    <el-menu-item index="6">
                        <i class="icofont-business-man-alt-1 icofont-2x"></i>
                        <a href="/directors">Directors</a>
                    </el-menu-item>
                    
                    <el-menu-item index="7">
                        <i class="icofont-weed icofont-2x"></i>
                        <a href="/genres">Genres</a>
                    </el-menu-item>

                    <el-menu-item index="7">
                        <i class="icofont-ui-user icofont-2x"></i>
                        <a href="/users">Users</a>
                    </el-menu-item>

                    <el-menu-item index="7">
                        <i class="icofont-cart-alt icofont-2x"></i>
                        <a href="/subscribers">Subscribers</a>
                    </el-menu-item>

                    <el-submenu index="8">
                        <template slot="title">
                            <i class="icofont-gear icofont-2x"></i>
                            <span>Appearance</span>
                        </template>
                        <el-menu-item-group>
                            <el-menu-item index="8-1">General</el-menu-item>
                            <el-menu-item index="8-2">Menu</el-menu-item>
                        </el-menu-item-group>
                    </el-submenu>

                </el-menu>
            </el-col>
        </el-row>
    </el-aside>
</template>

<script>
export default {
    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
    }
}
</script>

<style scoped>

</style>



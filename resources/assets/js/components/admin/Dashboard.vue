<template>
    <el-container>
        <admin-aside-menu></admin-aside-menu>
        <el-container>
            <el-header>
                <admin-top-menu></admin-top-menu>
            </el-header>
            <el-main>
                <el-row :gutter="20">
                    <el-col :span="6">
                        <el-card shadow="hover" class="dashbox">
                            <el-row>
                                <el-col :span="12">
                                    <span class="dashbox-icon movie-icon">
                                        <i class="icofont-video-clapper icofont-4x"></i>
                                    </span>
                                </el-col>
                                <el-col :span="12">
                                    <span class="dashbox-counter">69</span>
                                    <span class="dashbox-title">Movies</span>
                                </el-col>
                            </el-row>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card shadow="hover" class="dashbox">
                            <el-row>
                                <el-col :span="12">
                                    <span class="dashbox-icon music-icon">
                                        <i class="icofont-music-disk icofont-4x"></i>
                                    </span>
                                </el-col>
                                <el-col :span="12">
                                    <span class="dashbox-counter">45</span>
                                    <span class="dashbox-title">Albums</span>
                                </el-col>
                            </el-row>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card shadow="hover" class="dashbox">
                            <el-row>
                                <el-col :span="12">
                                    <span class="dashbox-icon tv-shows-icon">
                                        <i class="icofont-video-alt icofont-4x"></i>
                                    </span>
                                </el-col>
                                <el-col :span="12">
                                    <span class="dashbox-counter">87</span>
                                    <span class="dashbox-title">TV Shows</span>
                                </el-col>
                            </el-row>
                        </el-card>
                    </el-col>
                    <el-col :span="6">
                        <el-card shadow="hover" class="dashbox">
                            <el-row>
                                <el-col :span="12">
                                    <span class="dashbox-icon subscribe-icon">
                                        <i class="icofont-users-social icofont-4x"></i>
                                    </span>
                                </el-col>
                                <el-col :span="12">
                                    <span class="dashbox-counter">200</span>
                                    <span class="dashbox-title">Subscribers</span>
                                </el-col>
                            </el-row>
                        </el-card>
                    </el-col>
                </el-row>
            </el-main>
            <admin-footer></admin-footer>
        </el-container>
    </el-container>
    
</template>


<script>
export default {
    
}
</script>

<style>

</style>


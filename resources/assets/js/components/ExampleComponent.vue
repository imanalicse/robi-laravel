<template>
    <el-container>
    <el-header>Header</el-header>
    <el-container>
        <el-aside width="200px">Aside</el-aside>
        <el-container>
        <el-main>
            
            <el-button type="primary">Primary</el-button>
        </el-main>
        <el-footer>Footer</el-footer>
        </el-container>
    </el-container>
    </el-container>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

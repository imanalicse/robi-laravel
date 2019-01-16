<template>
    <el-container>
        <admin-aside-menu></admin-aside-menu>
        <el-container>
            <el-header>
                <admin-top-menu></admin-top-menu>
            </el-header>
            <el-main>
                <!-- Header -->
                <el-row class="page-header">
                    <el-col :span="12" class="page-header-content">
                        <h2 class="page-title">{{ pageTitle }}  <small>(69)</small></h2>
                        <el-button type="primary" plain><i class="icofont-plus-square"></i> Add New</el-button>
                    </el-col>
                    <el-col :span="12" class="page-header-actions">
                        <el-button type="danger" plain><i class="icofont-download-alt"></i> Export</el-button>
                    </el-col>
                </el-row>
                <!-- Table Actions -->
                <el-row type="flex" class="table-actions" justify="space-between">
                    <el-col :span="12" class="table-action-first">
                        <el-row type="flex">
                            <el-button type="primary" plain><i class="icofont-gear"></i></el-button>
                            <el-select v-model="value" placeholder="Actors">
                                <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                                </el-option>
                            </el-select>
                            <el-select v-model="value" placeholder="Directors">
                                <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                                </el-option>
                            </el-select>
                            <el-select v-model="value" placeholder="Genres">
                                <el-option
                                    v-for="item in options"
                                    :key="item.value"
                                    :label="item.label"
                                    :value="item.value">
                                </el-option>
                            </el-select>
                            <el-button type="primary" plain>Filter</el-button>
                        </el-row>
                    </el-col>
                    <el-col :span="4" class="table-action-last">
                        <el-row type="flex">
                            <el-input placeholder="Search"></el-input>
                            <el-button type="primary" plain><i class="icofont-gear"></i></el-button>
                        </el-row>
                    </el-col>
                </el-row>
                <!-- Data Table -->
                <el-table
                    ref="multipleTable"
                    :data="tableData3"
                    style="width: 100%"
                    @selection-change="handleSelectionChange">
                    <el-table-column
                    type="selection"
                    width="55">
                    </el-table-column>
                    <el-table-column
                    label="Date"
                    width="120">
                    <template slot-scope="scope">{{ scope.row.date }}</template>
                    </el-table-column>
                    <el-table-column
                    property="name"
                    label="Name"
                    width="120">
                    </el-table-column>
                    <el-table-column
                    property="address"
                    label="Address"
                    show-overflow-tooltip>
                    </el-table-column>
                </el-table>
                <!-- Pagination -->
                <el-row class="table-pagination" type="flex" justify="space-between">
                    <el-col :span="2" class="per-page">
                        <el-select v-model="value" placeholder="Per Page">
                            <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </el-col>
                    <el-col :span="12" class="pagination-links">
                        <el-pagination
                        background
                        layout="prev, pager, next"
                        :total="1000">
                        </el-pagination>
                    </el-col>
                </el-row>
            </el-main>
            <admin-footer></admin-footer>
        </el-container>
    </el-container>
    
</template>

<script>
export default {
    data() {
        return {
            pageTitle: 'Movies',
            tableData3: [
                {
                    date: '2016-05-03',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, 
                {
                    date: '2016-05-02',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, 
                {
                    date: '2016-05-04',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, 
                {
                    date: '2016-05-01',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, 
                {
                    date: '2016-05-08',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, 
                {
                    date: '2016-05-06',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }, 
                {
                    date: '2016-05-07',
                    name: 'Tom',
                    address: 'No. 189, Grove St, Los Angeles'
                }
            ],
            multipleSelection: [],
            options: [{
            value: 'Option1',
            label: 'Option1'
            }, {
            value: 'Option2',
            label: 'Option2'
            }, {
            value: 'Option3',
            label: 'Option3'
            }, {
            value: 'Option4',
            label: 'Option4'
            }, {
            value: 'Option5',
            label: 'Option5'
            }],
            value: ''
        }
    },
    methods: {
      toggleSelection(rows) {
        if (rows) {
            rows.forEach(row => {
            this.$refs.multipleTable.toggleRowSelection(row);
            });
        } else {
            this.$refs.multipleTable.clearSelection();
        }
        },
        handleSelectionChange(val) {
        this.multipleSelection = val;
        }
    }
}
</script>

<style scoped>

</style>

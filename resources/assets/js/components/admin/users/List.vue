<template>
    <div class="user-list">
        <!-- Header -->
        <el-row class="page-header">
            <el-col :span="12" class="page-header-content">
                <h2 class="page-title">{{ pageTitle }}  <small>({{meta.total}})</small></h2>
                <el-button type="primary" @click="alterToAddTemplate" plain><i class="icofont-plus-square"></i> Add New</el-button>
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
                    <el-select v-model="query.filter.role" placeholder="Select Role">
                        <el-option
                            v-for="item in roles"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value">
                        </el-option>
                    </el-select>
                    <el-button type="primary" @click="fetchUsers(token, page, query)" plain>Filter</el-button>
                </el-row>
            </el-col>
            <el-col :span="4" class="table-action-last">
                <el-row type="flex">
                    <el-input v-model="query.search" @keyup.enter.native="fetchUsers(token, page, query)" placeholder="Search"></el-input>
                    <el-button @click="fetchUsers(token, page, query)" type="primary" plain><i class="icofont-gear"></i></el-button>
                </el-row>
            </el-col>
        </el-row>
        <!-- Data Table -->
        <el-table 
            ref="multipleTable"
            :data="users"
            style="width: 100%"
            @selection-change="handleSelectionChange">

            <el-table-column
                type="selection"
                width="55">
            </el-table-column>

            <el-table-column
                prop="name"
                label="Name"
                width="180">
            </el-table-column>

            <el-table-column
                prop="email"
                label="Email"
                width="">
            </el-table-column>

            <el-table-column
                prop="role"
                label="Role"
                width="">
            </el-table-column>

            <el-table-column
                prop="created_at.date"
                label="Created At"
                width="">
            </el-table-column>

            <el-table-column
                prop="id"
                label="Action"
                width="220">
                <template slot-scope="scope">
                    <el-button @click.prevent="alterToEditTemplate(scope.row)" type="primary" icon="el-icon-edit" circle plain></el-button>
                    <el-button @click.prevent="deleteUser(scope.$index, scope.row)" type="danger" icon="el-icon-delete" circle plain></el-button>
                </template>
            </el-table-column>
        </el-table>
        <!-- Pagination -->
        <el-row class="table-pagination" type="flex" justify="space-between">
            <el-col :span="2" class="per-page">
                <el-select v-model="query.perPage" @change="fetchUsers(token, page, query)" placeholder="Per Page">
                    <el-option
                        v-for="item in perPages"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>
            </el-col>
            <el-col :span="12" class="pagination-links">
                <el-pagination
                background
                :page-size="meta.per_page"
                layout="prev, pager, next"
                :total="meta.total"
                @current-change="activatePagination">
                </el-pagination>
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pageTitle: 'Users',
            query: {
                search: '',
                perPage: 10,
                filter: {
                    role: ''
                }
            },
            page: '1',
            roles: [
                { value: '', label: 'Select Role' },
                { value: 'adminstrator', label: 'Adminstrator' },
                { value: 'editor', label: 'Editor' },
                { value: 'author', label: 'Author' },
            ],
            perPages: [
                { value: 2, label: 2 }, 
                { value: 5, label: 5 }, 
                { value: 10, label: 10 }, 
                { value: 20, label: 20 }, 
                { value: 50, label: 50 }, 
                { value: 100, label: 100 }
            ]
        }
    },

    created() {
        this.fetchUsers(this.$store.state.users.token, this.page, this.query);
    },

    computed: {
        token() {
            return this.$store.state.users.token;
        },

        users() {
            return Object.values(this.$store.state.users.items.data);
        },

        meta() {
            return this.$store.state.users.items.meta;
        },

        links() {
            return this.$store.state.users.items.links;
        }

    },

    methods: {

        activatePagination(currentPage) {
            this.fetchUsers(this.$store.state.users.token, currentPage, this.query);
        },

        fetchUsers(token, page, query) {
            if( this.$store.state.users.view.list === true ) {
                this.$store.dispatch( 'fetchUsers', [token, page, query] );
                this.page = page; // Reset the page number
            }
            
        },

        alterToAddTemplate() {
            this.$store.commit( 'ALTER_TO_USER_ADD_TEMPLATE' );
        },

        alterToEditTemplate(user) {
            this.$store.commit( 'ALTER_TO_USER_EDIT_TEMPLATE', {
                id: user.id,
                name: user.name,
                email: user.email,
                role: user.role
            });
        },

        deleteUser( index, row ) {
            let token = this.$store.state.users.token;

            if( confirm( 'Ae your sure want to delete this?' ) ) {
                axios({
                    method: 'delete',
                    url: 'api/user/' + row.id,
                    params: {
                        api_token: token
                    }
                })
                .then((response) => {
                    this.$store.dispatch( 'fetchUsers', [ token, this.page, this.query ] )
                })
                .then((response) => {
                    this.$message({
                        message: '1 user deleted!',
                        type: 'error'
                    });
                })
                .catch((error) => {
                    console.log(error);
                })
            }
        },

        onSubmit() {
            console.log('submit!');
        },

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

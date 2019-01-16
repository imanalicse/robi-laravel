<template>
    <div class="add-user">
        <el-row class="page-header">
            <el-col class="page-header-content">
                <h2 class="page-title">{{ pageTitle }}</h2>
            </el-col>
        </el-row>
        <el-row>
            <el-col :span="12">
                <el-form :model="form" status-icon :rules="formRules" ref="form">
                    <el-form-item label="Name" prop="name">
                        <el-input type="text" v-model="form.name" auto-complete="off"></el-input>
                    </el-form-item>

                    <el-form-item label="Email" prop="email">
                        <el-input v-model="form.email" auto-complete="off"></el-input>
                    </el-form-item>

                    <el-form-item label="Role" prop="role">
                        <el-select v-model="form.role" placeholder="Select Role">
                            <el-option label="Adminstrator" value="adminstrator"></el-option>
                            <el-option label="Editor" value="editor"></el-option>
                            <el-option label="Author" value="author"></el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="submitForm('form')">Update</el-button>
                        <el-button type="danger" @click="cancelForm">Cancel</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    
    data() {

        return {
            pageTitle: 'Edit User',
            form: {
                userId: '',
                name: '',
                email: '',
                role: ''
            },
            formRules: {
                name: [
                    { required: true, message: 'Please input name', trigger: 'blur' }
                ],
                email: [
                    { required: true, message: 'Please input email', trigger: 'blur' },
                    { type: 'email', message: 'Please input a valid email', trigger: [ 'blue', 'change' ] }
                ],
                role: [
                    { required: true, message: 'Please select a role', trigger: 'blur' }
                ]
            },
            // This obejct is using because after add a new one we need to recall the fetchUsers function
            query: {
                search: '',
                perPage: 10,
                filter: {
                    role: ''
                }
            },
            page: '1',
        }
    },

    created() {
        this.retriveUser();
    },

    methods: {

        retriveUser() {
            this.form = {
                userId: this.$store.state.users.user.id,
                name: this.$store.state.users.user.name,
                email: this.$store.state.users.user.email,
                role: this.$store.state.users.user.role
            };
        },

        submitForm(form) {
            this.$refs[form].validate((valid) => {
                if(valid) {
                    let token = this.$store.state.users.token;
                    let self = this;
                    axios({
                        method: 'put',
                        url: 'api/user',
                        data: self.form,
                        params: {
                            api_token: token,
                        }
                    })
                    .then((response) => {
                        this.$store.commit( 'ALTER_TO_USER_LIST_TEMPLATE' );
                        this.$store.dispatch( 'fetchUsers', [token, this.page, this.query] );
                    })
                    .then((response) => {
                        this.$message({
                            message: '1 new user updated!',
                            type: 'success'
                        });
                    })
                    .catch((error) => {
                        console.log(error);
                    })
                    
                }else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        
        cancelForm() {
            this.$store.commit( 'ALTER_TO_USER_LIST_TEMPLATE' );
        },

    }

}
</script>

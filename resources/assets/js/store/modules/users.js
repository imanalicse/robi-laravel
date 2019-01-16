export default {
    state: {
        token: '',
        view: {
            list: true,
            add: false,
            edit: false
        },

        items: {
            data: {},
            links: {},
            meta: {}
        },

        user: {
            id: '',
            name: '',
            email: '',
            role: ''
        }
    },

    getters: {

    },

    actions: {
        fetchUsers({commit}, [token, page, query]) {
            let url = 'api/users?page='+page+'&search='+query.search+'&per_page='+query.perPage+'&role='+query.filter.role || 'api/users?page=1&search='+query.search+'&per_page='+query.perPage;
            axios.get(url, {
                params: {
                    api_token: token
                }
            })
            .then( res => {
                return res.data
            })
            .then( (users) => {
                commit('FETCH_USERS', {users})
            })
        },
    },

    mutations: {
        FETCH_USERS( state, {users} ) {
            state.items = users;
        },

        ALTER_TO_USER_ADD_TEMPLATE( state ) {
            state.view.list = false;
            state.view.add = true;
            state.view.edit = false;
        },

        ALTER_TO_USER_LIST_TEMPLATE( state ) {
            state.view.list = true;
            state.view.add = false;
            state.view.edit = false;
        },

        ALTER_TO_USER_EDIT_TEMPLATE( state, user ) {
            state.view.list = false;
            state.view.add = false;
            state.view.edit = true;

            state.user = {
                id: user.id,
                name: user.name,
                email: user.email,
                role: user.role
            };
        },
        
        UPDATE_TOKEN( state, token ) {
            state.token = token
        }
    }
}
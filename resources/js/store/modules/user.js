const state = {
    user: null,
    userStatus: true,
};

const getters = {
    authUser: state => {
        return state.user;
    },

    authUserStatus: state => {
        return state.userStatus;
    }
};

const actions = {
    fetchAuthUser({commit, state}) {
        axios.get('/api/auth-user')
            .then(res => {
                commit('setAuthUser', res.data);
            })
            .catch(error => {
                console.log('Unable to fetch auth user');
            })
            .finally(() => {
                commit('setAuthUserStatus', false);
            });
    }
};

const mutations = {
    setAuthUser(state, user) {
        state.user = user;
    },

    setAuthUserStatus(state, userStatus) {
        state.userStatus = userStatus;
    }
};

export default {
    state, getters, actions, mutations,
}


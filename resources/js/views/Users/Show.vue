<template>
    <div>
        <div class="w-100 h-64 overflow-hidden">
            <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyMTAxMjZfMTgy%2FMDAxNjExNjU1NjM5Mzkz.uee4orVZJ36mO39lNFv1CXXf5RLS5BlNVQA-hoKgpcgg.WaLAO9f4OH97Opu-LDlS34pN2fvDgt5UZJJw7rL5mpkg.JPEG.hey_ordinary%2FIMG_1381.jpg&type=sc960_832"
                alt="user background image" class="object-cover w-full">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
            loading: true,
        }
    },

    mounted() {
        axios.get('/api/users/' + this.$route.params.userId)
            .then(res => {
                this.user = res.data;
            })
            .catch(error => {
                console.log('Unable to fetch the user from the server.');
            })
            .finally(() => {
                this.loading = false;
            });

        axios.get('/api/posts/' + this.$route.params.userId)
                .then(res => {
                    this.posts = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log('Unable to fetch posts');
                    this.loading = false;
                });
    }
}
</script>

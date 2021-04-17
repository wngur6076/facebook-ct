<template>
    <div>
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyMTAxMjZfMTgy%2FMDAxNjExNjU1NjM5Mzkz.uee4orVZJ36mO39lNFv1CXXf5RLS5BlNVQA-hoKgpcgg.WaLAO9f4OH97Opu-LDlS34pN2fvDgt5UZJJw7rL5mpkg.JPEG.hey_ordinary%2FIMG_1381.jpg&type=sc960_832"
            alt="user background image"
            ref="userImage"
            class="object-cover w-full">
    </div>
</template>

<script>
import Dropzone from 'dropzone';
export default {
    name: "UploadableImage",

    props: [
        'imageWidth',
        'imageHeight',
        'location',
    ],

    data() {
        return {
            dropzone: null,
        }
    },

    mounted() {
        this.dropzone = new Dropzone(this.$refs.userImage, this.settings);
    },

    computed: {
        settings() {
            return {
                paramName: 'image',
                url: '/api/user-images',
                acceptedFiles: 'image/*',
                params: {
                    'width': this.imageWidth,
                    'height': this.imageHeight,
                    'location': this.location,
                },
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
                },
                success: (e, res) => {
                    alert('uploaded!')
                }
            }
        }
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="px-4">
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
                console.log('Component mounted.')
            },

        data: function () {
            return {
                status:this.follows
            }
        },
        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                    .then(res => {
                        this.status = !this.status;
                        console.log(res.data);
                    })
                    .catch(err=>{
                        if(err.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },
        computed: {
            buttonText(){
                return (this.status) ? "Unfollow" : "Follow"
            }
        }
    }
</script>

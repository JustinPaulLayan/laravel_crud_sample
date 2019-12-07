<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: {}
            }
        },

        methods: {
            getPosts() {
                axios.get('/api/getPosts')
                .then(data => {
                    console.log(data.data);
                })
            }
        },

        created() {
            this.getPosts();
        }
    }
</script>

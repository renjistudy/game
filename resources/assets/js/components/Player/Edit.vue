<template lang="html">
    <div class="container">

        <!-- Heading -->
        <div class="text-center header">
            <h1>Edit player</h1>
            <p>You can edit the player from here</p>
            <router-link class="btn btn-warning" to="/">Show players</router-link>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <!-- Notify -->
                <div class="alert alert-danger text-center" v-if="error">
                    <p>{{ error }}</p>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" v-model="player.name">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" v-model="player.email">
                </div>

                <div class="form-group">
                    <input type="tel" class="form-control" placeholder="Phone" v-model="player.phone">
                </div>

                <div class="form-group">
                    <textarea rows="4" class="form-control" placeholder="About" v-model="player.about"></textarea>
                </div>

                <button class="btn btn-primary btn-block" @click.prevent="patch">Update</button>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ['id'],

    data: function() {
        return {
            player: {
                name: '',
                email: '',
                phone: '',
                about: '',
            },
            error: '',
        }
    },

    methods: {
        get: function() {
            var self = this;

            axios.get('/api/' + this.id + '/get')
                .then( function(response) {
                    self.player = response.data;
                })
                .catch( function(error) {
                    console.log(error);
                });
        },

        patch: function() {
            var self = this;

            axios.patch('/api/' + this.id + '/patch', this.player)
                .then( function(response) {
                    return self.$router.push('/');
                })
                .catch( function(error) {
                    self.error = Object.values(error.response.data.errors)[0][0];
                });

        }
    },

    mounted: function() {
        this.get();
    }
}
</script>

<style lang="css">
</style>

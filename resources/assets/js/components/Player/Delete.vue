<template lang="html">

    <!-- Heading -->
    <div class="text-center header">
        <h1>Delete player</h1>

        <div v-if="player.id">
            <p>Are you sure to delete the player, {{ player.name }}?</p>
            <router-link to="/" class="btn btn-default">No</router-link>
            <button class="btn btn-danger" @click.prevent="remove">Yes, please</button>
        </div>

    </div>

</template>

<script>
export default {
    props: ['id'],

    data: function() {
        return {
            player: [],
        }
    },

    methods: {
        remove: function() {
            var self = this;

            axios.delete('/api/' + this.id + '/delete')
                .then( function(response) {
                    return self.$router.push('/');
                })
                .catch( function(error) {
                    console.log(error);
                })
        },

        get: function() {
            var self = this;

            axios.get('/api/' + this.id + '/get')
                .then( function(response) {
                    self.player = response.data;
                })
                .catch( function(error) {
                    console.log(error);
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

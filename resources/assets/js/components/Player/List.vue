<template lang="html">
    <div class="container">

        <!-- Heading -->
        <div class="text-center header">
            <h1>Players</h1>
            <p>Manager players from here</p>
            <router-link to="/add" class="btn btn-success">Add</router-link>
        </div>

        <!-- Listing -->
        <div class="row" v-if="players.length">
            <div class="col-md-3" v-for="player in players" :key="player.id">
                <div class="well">
                    <h4>{{ player.name }}</h4>
                    <p><em>{{ player.email }}</em></p>
                    <p><em>{{ player.phone }}</em></p>
                    <p>{{ player.about }}</p>

                    <router-link :to="'/' + player.id + '/edit'" class="btn btn-primary">Edit</router-link>
                    <router-link :to="'/' + player.id + '/delete'" class="btn btn-danger">Delete</router-link>
                </div>
            </div>
        </div>

        <!-- No results -->
        <div v-else="players.length" class="alert alert-success text-center">
            <p>Loading...</p>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            players: [],
        }
    },

    methods: {
        collect: function() {
            var self = this;

            axios.get('/api/')
                .then( function(response) {
                    self.players = response.data;
                })
                .catch( function(error) {
                    console.log(error);
                });
        }
    },

    mounted: function() {
        this.collect();
    }
}
</script>

<style lang="css">
    .well {
        background-color: #fff;
        min-height: 375px !important;
    }
</style>

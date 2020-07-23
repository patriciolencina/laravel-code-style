<template>
    <h1 v-if="!areShopsLoadedUp">Loading...</h1>
    <h1 v-else-if="!isThereAnyShopInList">There is no any shop in the database!</h1>
    <table v-else class="m-auto table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Distance (km)</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="shop in savedListOfShops">
            <td>{{ shop.name }}</td>
            <td>{{ shop.address }}</td>
            <td>{{ shop.distance }}</td>
            <td>{{ shop.latitude }}</td>
            <td>{{ shop.longitude }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: 'ShopsList',
        data: function () {
            return {
                areShopsLoadedUp: false,
                savedListOfShops: []
            };
        },
        computed: {
            isThereAnyShopInList: function () {
                return this.areShopsLoadedUp
                    && this.savedListOfShops.length > 0;
            }
        },
        mounted: function () {
            this.getShopsList();
        },
        methods: {
            getShopsList: function () {
                this.areShopsLoadedUp = false;
                $.get('/api/get-shops', (data, status) => {
                    this.areShopsLoadedUp = true;
                    this.savedListOfShops = data;
                });
            }
        }
    };
</script>

<style scoped>

</style>
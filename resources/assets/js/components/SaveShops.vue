<template>
    <div class="text-center">
        <button class="btn btn-danger my-3"
                :disabled="!isSavingEnabled"
                @click="saveShopsToBackend">
            Save shops
        </button>
    </div>
</template>

<script>
    export default {
        name: 'SaveShops',
        props: {
            myPosition: google.maps.LatLng,
            listOfShops: Array,
            isSavingEnabled: Boolean
        },
        methods: {
            saveShopsToBackend: function () {
                const listOfShops = this.listOfShops.map((shopObject) => {
                    const shopPosition = shopObject.geometry.location;
                    return {
                        name: shopObject.name,
                        address: 'test',
                        distance: google.maps.geometry.spherical
                            .computeDistanceBetween(this.myPosition, shopPosition)
                            / 100, // to convert into kilometers
                        latitude: shopPosition.lat(),
                        longitude: shopPosition.lng()
                    }
                });

                $.post('/api/save-shops', {
                    listOfShops
                }, (data, textStatus) => {
                    console.log(data, textStatus);
                });
            }
        }
    };
</script>

<style scoped>

</style>
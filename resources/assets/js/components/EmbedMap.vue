<template>
    <div id="embedMap" class="m-auto"></div>
</template>

<script>
    export default {
        name: 'EmbedMap',
        props: {
            myPosition: google.maps.LatLng
        },
        data: function () {
            return {
                map: null,
                service: null,

            };
        },
        mounted: function () {
            this.map = new google.maps.Map(document.getElementById('embedMap'), {
                center: this.myPosition,
                zoom: 13
            });

            const request = {
                keyword: 'Bingo',
                location: this.myPosition,
                radius: 5000
            };

            this.service = new google.maps.places.PlacesService(this.map);
            this.service.nearbySearch(request, this.mapsServiceCallback);
        },
        methods: {
            mapsServiceCallback: function (results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    this.$emit('list-of-places-changed', results);
                    results.forEach((place) => {
                        this.createMarker(place.geometry.location);
                    });
                }
            },
            createMarker: function (location) {
                new google.maps.Marker({
                    map: this.map,
                    position: location
                });
            }
        }
    };
</script>

<style scoped>

</style>
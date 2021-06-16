var app = new Vue({
    el: '#root',
    data: {
        restaurants: []
    },
    methods: {
        searchRestaurant() {
            axios
                .get('http://localhost:8000/api/restaurants')
                .then(response => {
                    console.log(response);
                });
        }
    }
});
var app = new Vue ({
    el: '#root',
    data: {
        query: "",
        typologies: [],
        restaurants: [],
        filteredRest: [],
    },
    
    methods: {
            searchType() {
                axios
                .get('http://localhost:8000/api/typologies')
                .then((response) => {
                    this.typologies = response.data.results;
                    this.typologies.forEach((typology) => {
                        if (typology.name.toLowerCase().includes(this.query.toLowerCase())) {
                            this.restaurants.push(typology.users);
                            console.log(typology.users);
                        }
                    });
/*                     console.log(this.restaurants); */
                });
            },

            searchRestaurant() {
                axios
                .get('http://localhost:8000/api/restaurants')
                .then((response) => {
                    this.filteredRest = [];
                    this.restaurants = response.data.results;
                    this.restaurants.forEach((restaurant) => {
                        if (restaurant.name.toLowerCase().includes(this.query.toLowerCase())) {
                            this.filteredRest.push(restaurant);
                            console.log(restaurant.name);
                        }
                    });
                });
            },

    }
})
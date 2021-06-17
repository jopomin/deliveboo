var app = new Vue ({
    el: '#root',
    data: {
        query: "",
        typologies: [],
        restaurants: [],
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
                    this.restaurants = response.data.results;
                    console.log(this.restaurants);
                });
            },

    }
})
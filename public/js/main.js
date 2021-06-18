var app = new Vue ({
    el: '#root',
    data: {
        query: "",
        typologies: [],
        restaurants: [],
        categories: [],
        products: [],
        filteredRest: [],
        restIds: [],
        selType: "",
        selCat: "",
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

            showSel() {
                console.log(this.selected);
            },

            selectType() {
                axios
                .get('http://localhost:8000/api/restaurants')
                .then((response) => {
                    this.filteredRest = [];
                    this.restaurants = response.data.results;
                    this.restaurants.forEach((restaurant) => {
                        restaurant.typologies.forEach((type) => {, v
                            if (type.id == this.selType) {
                                this.filteredRest.push(restaurant);
                            }
                        }) 
                    });
                });
            },

            selectCat() {
                axios
                .get('http://localhost:8000/api/products')
                .then((response) => {
                    this.filteredRest = [];
                    this.restIds = [];
                    this.products = response.data.results;
                    this.products.forEach((product) => {
                        if (product.category_id == this.selCat) {
                            if (!this.restIds.includes(product.user_id)) {
                                this.restIds.push(product.user_id)
                            }
                        }
                    });
                    this.connectId(this.restIds);
                });
            },

            connectId(restIds) {
                axios
                .get('http://localhost:8000/api/restaurants')
                .then((response) => {
                    this.filteredRest = [];
                    this.restaurants = response.data.results;
                    this.restaurants.forEach((restaurant) => {
                        restIds.forEach((rId) => {
                            if (rId == restaurant.id) {
                                this.filteredRest.push(restaurant);
                            }
                        }) 
                    });
                });
            },

    }
})
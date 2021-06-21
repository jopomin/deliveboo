Vue.config.devtools = true;
var app = new Vue ({
    el: '#root',
    data: {
        query: "",
        selType: "",
        selCat: "",
        nameFil: [],
        typeFil: [],
        filteredRest: [],
    },
    
    methods: {
        searchName() {
            this.nameFil = [];
            this.typeFil = [];
            this.filteredRest = [];
            axios
            .get('http://localhost:8000/api/restaurants')
            .then ((response) => {
                restaurants = response.data.results;
                
                if (this.query == "") {
                    this.filteredRest = restaurants;
                }

                else {
                    this.filteredRest = restaurants.filter((restaurant) => {
                        return restaurant.name.toLowerCase().includes(this.query.toLowerCase());
                    });
                };
                console.log(this.filteredRest);
            });
        },

        totalSrc() {
            this.nameFil = [];
            this.typeFil = [];
            this.filteredRest = [];
            axios
            .get('http://localhost:8000/api/restaurants')
            .then ((response) => {
                restaurants = response.data.results;
                
                if (this.query == "") {
                    this.nameFil = restaurants;
                }

                else {
                    this.nameFil = restaurants.filter((restaurant) => {
                        return restaurant.name.toLowerCase().includes(this.query.toLowerCase());
                    });
                };
                console.log(this.nameFil);

                if (this.selType == "") {
                    this.typeFil = this.nameFil 
                } 

                else {
                    this.nameFil.forEach((restaurant) => {
                        restaurant.typologies.forEach((restType) => {
                            if (restType.id == this.selType) {
                                this.typeFil.push(restaurant)
                            }
                        })
                    });
                }
                console.log(this.selType);
                console.log(this.typeFil);

                if (this.selCat == "") {
                    this.filteredRest = this.typeFil;
                }

                else {
                    this.typeFil.forEach((restaurant) => {
                        restaurant.products.forEach((restProd) => {
                            if (restProd.category_id == this.selCat) {
                                this.filteredRest.push(restaurant)
                            }
                        })
                    });
                }
                console.log(this.filteredRest);
                
            });

        },

    }
    
});
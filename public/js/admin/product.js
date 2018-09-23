new Vue({
    el: '#app',
    data: {
        products: [],
        selectedProducts: [],
        selectedProductIds: [],
        types: [],
        selectCategory: '',
        type: null,
        resource_url: '/banner/products',
        categories: [],
        category: null,
        stores:[],
        store: null
    },
    components: {
        VPaginator: VuePaginator,
        VSelect: VueSelect.VueSelect
    },
    methods: {
        getProducts: function () {
            this.$http
                .get('/banner/products', {
                    params: {
                        selectedProductIds: this.selectedProducts
                            .map(function (product) {
                                return product.id;
                            }),
                        category: this.category,
                        store: this.store
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function (response) {
                    console.log(response);
                    this.products = response.body.data;
                });
        },
        setCategory: function (category) {
            if(category) {
                this.category = category.value;
                this.getProducts();
            }
        },
        setStore: function (store) {
            if(store) {
                this.store = store.value;
                this.getProducts();
            }
        },
        getTypes: function () {
            this.$http.get('/banner/types', {}).then(function (response) {
                this.types = response.body.data.map(function (type) {
                    return {
                        label: type.name,
                        value: type.id
                    }
                });
            }).catch(function (error) {
                console.log(error);
            });
        },
        getStores:function () {
            this.$http.get('/banner/stores',{})
                .then(function(response){
                    this.stores = response.body.map(function (store){
                        return {
                            label:store.name,
                            value:store.id
                        }
                    });
                }).catch(function (error) {

            });
        },
        changeCategory: function (type) {
            if(this.types.length) {
                this.$http.get('/banner/categories', {
                    params: {
                        type: type.value
                    }
                }).then(function (response) {
                    this.categories = response.data.map(function (category) {
                        return {
                            label: category.name,
                            value: category.id
                        }
                    });
                }).catch(function (error) {
                    console.log(error);
                })
            }
        },
        selectProduct: function (product) {
            this.selectedProducts.push(product);
            this.selectedProductIds.push(product.id);
            this.products.splice(this.products.indexOf(product), 1);
        },
        unSelectProduct: function (product) {
            this.selectedProducts.splice(this.selectedProducts.indexOf(product), 1);
            this.selectedProductIds.splice(this.selectedProductIds.indexOf(product.id), 1);
            this.getProducts()
        },
        updateResource: function (data) {
            this.products = data;
        }
    },
    created: function () {
        this.getProducts();
        this.getTypes();
        this.getStores();
    }
});
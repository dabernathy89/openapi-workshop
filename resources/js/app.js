/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',

    data() {
        return {
            contests: [],
            contest: {},
            prizes: [],
            contestants: [],
            errors: [],
        }
    },

    methods: {
        selectWinner(prizeId) {
            console.log({prizeId});
        },

        deletePrize(prizeId) {
            console.log({prizeId});
        },

        deleteContestant(contestantId) {
            console.log({contestantId});
        },

        sampleGetRequest() {
            axios.get('/path')
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        samplePostRequest() {
            axios.post('/path', {
                    foo: 'bar',
                })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
});

<template>
    <form action="/purchases" method="POST">

        <input type="hidden" name="stripeToken" v-model="stripeToken">
        <input type="hidden" name="stripeEmail" v-model="stripeEmail">

        <select name="product" v-model="product">

            <option v-for="product in products" :value="product.id">
                {{ product.name }}
            </option>

        </select>
        
        <button type="submit" @click.prevent="buy">Buy this book</button>
    </form>
</template>

<script>
    export default {
        props: ['products'],

        data() {
            return {
                stripeEmail: '',
                stripeToken: '',
                product: 1
            };
        },
        created() {
            this.stripe = StripeCheckout.configure({
                key: Laracasts.stripeKey,
                image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                locale: 'auto',
                token: (token) => {
                    this.stripeToken = token.id;
                    this.stripeEmail = token.email;

                    axios.post('/purchases', this.$data)
                        .then(response => alert('Complete, thank you'));
                }
            });
        },
        methods: {
            buy() {
                this.stripe.open({
                    name: 'My book',
                    description: 'some info about the book',
                    zipCode: true,
                    amount: 5000
                });
            }
        }
    }
</script>

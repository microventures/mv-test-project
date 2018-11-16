<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 25rem;">
                  <img class="card-img-top" :src="company.logo" :alt="company.name">
                  <div class="card-body">
                    <h3 class="card-title">{{ company.name }}</h3>
                    <div class="card-text">
                        <h4>Investments</h4>

                        <p>
                            <button @click.prevent="setFilter(1000)" type="button" class="btn btn-secondary">Show &ge; $1000</button>
                            <button @click.prevent="setFilter(0)" type="button" class="btn btn-secondary">Show all</button>
                        </p>

                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Investor</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-right">Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="investment in filteredInvestments">
                                    <tr>
                                        <td>{{ investment.investor.first_name }} {{ investment.investor.last_name }}</td>
                                        <td class="text-right">${{ investment.amount }}</td>
                                        <td class="text-right">${{ investment.fees }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        companyId: {
            type: Number,
            required: true
        }
    },

    computed: {
        filteredInvestments() {
            // Filter only investments >= the value of this.filter
            return this.company.investments
        }
    },

    methods: {
        setFilter(value) {
            this.filter = value
        }
    },

    mounted() {
        axios.get(`/api/companies/${this.companyId}`).then((response) => {
            this.company = response.data;
        }).catch((error) => {
            console.error('There was an error!');
        });
    },

    data() {
        return {
            company: {
                investments: []
            },

            filter: 0
        }
    },
}
</script>

new Vue({
	el: '#app',
	data: {
		current: "initialform",
		tests: []
	},

	created: function () {
		this.fetchTests();
	},

	methods: {
		fetchTests: function () {
			var that = this;
			axios.get('../api/test/list')
				.then(function (response) {
					for (idx in response.data) {
						var test = response.data[idx];
						that.tests.push({value: test.tid, name: test.name}); 
					}
				})
				.catch(function (error) {
					console.log(error);
				});
		},
		beginTest: function () {
			this.current = 'question'
		},
	}
});
var initialform = Vue.component('initial-form',{
	template : '#initial-form',
	data: function() {
		return {
			tests: []
		}
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
		}
	}
});

var testSteps = Vue.component('test-steps',{
	template : '#test-steps',
});

var finalScore = Vue.component('final-score',{
	template : '#final-score',
});

new Vue({
	el: '#app',
	data: {
		currentComponent: "initialform",
	},
	components: {	initialform: initialform,
					testSteps: testSteps,
					finalScore: finalScore
	},
	methods: {
		swapComponent: function (component) {
			this.currentComponent = component;
		},
	}
});

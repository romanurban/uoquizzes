/* initial form */
var initialForm = Vue.component('initial-form', {
	template : '#initial-form',
	data: function() {
		return {
			tests: [{value: 0, name: 'Select test'}]
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
	},
	computed: {
		isDisabled () {
			if (this.uname.length > 0 && this.tid != 0) {
				return false;
			} else {
				return true;
			}
		}
	},
	props: ['uname', 'tid'] // sync this with parent component
});

/* test steps */
var testSteps = Vue.component('test-steps', {
	template : '#test-steps',
	data: function() {
		return {
			answers: [],
			questionID: 0,
			questionText: ''
		}
	},
	created: function () {
		this.init();
	},
	methods: {
		init: function () {
			var that = this;
			axios.get('../api/test/begin', {
				params: {
					uname: this.uname,
					tid: this.tid
				}
			})
			.then(function (response) {
				that.questionID = response.data['qid'];
				that.questionText = response.data['txt'];
				for (idx in response.data.answers) {
					that.answers.push({aid: idx, txt: response.data.answers[idx], active: false}); 
				}
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		proceed: function () {
			var solution = this.getSolution();
			solution = solution.join(',');
			var that = this;
			axios.get('../api/test/proceed', {
				params: {
					qid: this.questionID,
					solution: solution
				}
			})
			.then(function (response) {
				console.log(response.data);
				if (response.data['qid'] < 0) { // end. time to diplay score
					
				}
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		toggleActive: function (answer) {
			answer.active = !answer.active;
		},
		getSolution: function () {
			var solutionArray = this.answers.filter(function( answer ) {
				return answer.active == true;
			})
			var solution = solutionArray.map(a => a.aid);
			return solution;
		}
	},
	computed: {
		isDisabled () {
			var solution = this.getSolution();
			if (solution.length > 0 ) {
				return false;
			} else {
				return true;
			}
		}
	},
	props: ['uname', 'tid']
});

/* test results */
var finalScore = Vue.component('final-score', {
	template : '#final-score',
});


/* main app */
new Vue({
	el: '#app',
	data: {
		currentComponent: 'initialForm', // always start from initial form
		tid: 0,
		uname: ''
	},
	components: {	initialForm: initialForm,
					testSteps: testSteps,
					finalScore: finalScore
	},
	methods: {
		beginTest: function () {
			this.currentComponent = 'testSteps';
		}
	}
});

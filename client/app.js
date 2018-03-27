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

/* control test steps flow */
var testSteps = Vue.component('test-steps', {
	template : '#test-steps',
	data: function() {
		return {
			buttonTxt: 'Next',
			answers: [],
			questionID: 0,
			questionText: '',
			progress: 0
		}
	},
	created: function () {
		this.init();
	},
	methods: {
		// begin chosen test
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
				if (response.data['nextqid'] < 0) {
					that.buttonTxt = 'Finish';
				}
				for (idx in response.data.answers) {
					that.answers.push({aid: idx, txt: response.data.answers[idx], active: false}); 
				}
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		// navigate to the next step
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
				if (response.data['score']) { // end. time to diplay score
					that.$parent.endTest(response.data['score'], response.data['total']);
				} else {
					that.answers = []; // wipe previous question answers
					that.questionID = response.data['qid'];
					that.questionText = response.data['txt'];
					that.progress = response.data['progress'];
					if (response.data['nextqid'] < 0) {
						that.buttonTxt = 'Finish';
					}
					for (idx in response.data.answers) {
						that.answers.push({aid: idx, txt: response.data.answers[idx], active: false}); 
					}
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
	props: ['uname', 'tid'] // sync this with parent component
});

/* display results */
var finalScore = Vue.component('final-score', {
	template : '#final-score',
	data: function() {
		return {
			score: false,
			total: false
		}
	},
	created: function () {
		this.score = this.$parent.score;
		this.total = this.$parent.total;
	},
	props: ['uname'] // sync this with parent component
});


/* main app */
new Vue({
	el: '#app',
	data: {
		currentComponent: 'initialForm', // always start from initial form
		tid: 0,
		uname: '',
		score: '',
		total: ''
	},
	components: {	initialForm: initialForm,
					testSteps: testSteps,
					finalScore: finalScore
	},
	methods: {
		beginTest: function () {
			this.currentComponent = 'testSteps';
		},
		endTest: function (score, total) {
			this.score = score;
			this.total = total;
			this.currentComponent = 'finalScore';
		}
	}
});

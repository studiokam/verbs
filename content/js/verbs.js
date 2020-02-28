var app = new Vue({
    el: '#app',
    data: {
        verbPL: '',
        verbInf: '',
        verbPastSimple1: '',
        verbPastSimple2: '',
        verbPastParticiple1: '',
        verbPastParticiple2: '',
        verbPLAdditional: '',
		verbPronunciation: '',
        emptyFieldsError: false,
        verbExistsError: false,
        insertOK: false,
        baseUrl: '',
		allVerbs: ''
    },
    methods: {

        dataToSend() {
			return {
				'verbPL': this.verbPL,
				'verbInf': this.verbInf,
				'verbPastSimple1': this.verbPastSimple1,
				'verbPastSimple2': this.verbPastSimple2,
				'verbPastParticiple1': this.verbPastParticiple1,
				'verbPastParticiple2': this.verbPastParticiple2,
				'verbPLAdditional': this.verbPLAdditional,
				'verbPronunciation': this.verbPronunciation
			};
        },
        addVerbs() {
            let data = this.dataToSend();
			axios({
				method: 'post',
				url: 'Verbs/addNew',
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allVerbs = resp.allVerbs;
					this.clearForm();
				} else {
					if (resp.validationErrors === 1) {
						alert('błąd walidacji')
					} else {
						alert('błąd zapisu. ' + resp.error)
					}
				}
				console.log(response.data);
			}, (error) => {
				console.log(error);
			});
        },
		deleteVerb(id) {
			axios({
				method: 'post',
				url: 'verbs/deleteVerb',
				data: id,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allVerbs = resp.allVerbs;
				}
			}, (error) => {
				console.log(error);
			});
		},
		clearForm() {
			this.verbPL = '';
			this.verbInf = '';
			this.verbPastSimple1 = '';
			this.verbPastSimple2 = '';
			this.verbPastParticiple1 = '';
			this.verbPastParticiple2 = '';
			this.verbPLAdditional = '';
		}
    },
    mounted() {
		axios.get('Verbs/startData')
		.then((response) => {
			let resp = response.data;
            console.log(resp);
            this.baseUrl = resp.baseUrl;
            this.allVerbs = resp.allVerbs;
		});

    },

})

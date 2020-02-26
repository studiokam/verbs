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
        baseUrl: ''
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
				url: 'addVerb/addNew',
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					alert('dodano. ' + resp.message);
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
        }
    },
    mounted() {
		axios.get('addVerb/startData')
		.then((response) => {
			let resp = response.data;
            console.log(resp);
            this.baseUrl = resp.baseUrl;
		});

    },

})

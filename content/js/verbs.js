var app = new Vue({
    el: '#app',
    data: {
    	id: '',
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
		searchQuery: null,

		allVerbs: '',
		allGroups: '',
		verbGroups: '',

		verbsListSelect: '',

		showAllVerbs: true,
		showEditVerb: false
    },
	computed: {
		filteredVerbs() {
			if (this.searchQuery) {
				return this.allVerbs.filter((verb) => {
					return this.searchQuery.toLowerCase().split(' ').every(v => verb.inf.toLowerCase().includes(v))
				})
			} else {
				return this.allVerbs;
			}
		}
	},
    methods: {

        dataToSend() {
			return {
				'id': this.id,
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
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allVerbs = resp.data;
					this.clearForm();
				} else {
					if (resp.validationErrors === 1) {
						alert('błąd walidacji')
					} else {
						alert('błąd zapisu. ' + resp.error)
					}
				}
			}, (error) => {
				console.log(error);
			});
        },
		deleteVerb(id) {
			axios({
				method: 'post',
				url: 'verbs/deleteVerb',
				data: id,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allVerbs = resp.data;
				}
			}, (error) => {
				console.log(error);
			});
		},
		editVerb(id) {
			for (let i = 0; i < this.allVerbs.length; i++) {
				if (this.allVerbs[i].id == id) {
					this.id = this.allVerbs[i].id;
					this.verbPL = this.allVerbs[i].pl;
					this.verbInf = this.allVerbs[i].inf;
					this.verbPastSimple1 = this.allVerbs[i].pastSimp1;
					this.verbPastSimple2 = this.allVerbs[i].pastSimp2;
					this.verbPastParticiple1 = this.allVerbs[i].pastPrac1;
					this.verbPastParticiple2 = this.allVerbs[i].pastPrac2;
					this.verbPLAdditional = this.allVerbs[i].plAdditional;
					this.verbPronunciation = this.allVerbs[i].pronunciation;
					this.showAllVerbs = false;
					this.showEditVerb = true;
				}
			}
			console.log(this.id);
			axios({
				method: 'post',
				url: 'verbs/getVerbGroups',
				data: this.id,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				console.log(resp);
				if (resp.status === 1) {
					this.verbGroups = resp.data;
				}
			}, (error) => {
				console.log(error);
			});
		},

		editVerbSend() {
			let data = this.dataToSend();

			axios({
				method: 'post',
				url: 'verbs/editVerb',
				data: data,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allVerbs = resp.allVerbs;
					this.endVerbEdit();
				}
			}, (error) => {
				console.log(error);
			});
		},
		addVerbToGroup() {
			axios({
				method: 'post',
				url: 'verbs/addVerbToGroup',
				data: {verbId: this.id, groupId: this.verbsListSelect},
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.verbGroups = resp.data;
					// this.endVerbEdit();
					console.log('ok');
					console.log(resp.data);
				}
			}, (error) => {
				console.log(error);
			});
		},
		deleteVerbFromGroup(id) {
			axios({
				method: 'post',
				url: 'verbs/deleteVerbFromGroup',
				data: {verbId: this.id, relationId: id},
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.verbGroups = resp.data;
					// this.endVerbEdit();
					console.log('ok');
					console.log(resp.data);
				}
			}, (error) => {
				console.log(error);
			});
		},

		endVerbEdit() {
			this.showAllVerbs = true;
			this.showEditVerb = false;
			this.verbsListSelect = '';
			this.verbGroups = '';
			this.clearForm();
		},
		clearForm() {
        	this.id = '';
			this.verbPL = '';
			this.verbInf = '';
			this.verbPastSimple1 = '';
			this.verbPastSimple2 = '';
			this.verbPastParticiple1 = '';
			this.verbPastParticiple2 = '';
			this.verbPLAdditional = '';
			this.verbPronunciation = '';
		}
    },
    mounted() {
		axios.get('Verbs/startData')
		.then((response) => {
			let resp = response.data;
            this.baseUrl = resp.baseUrl;
            this.allVerbs = resp.allVerbs;
            this.allGroups = resp.allGroups;
		});

    },

})

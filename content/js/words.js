var app = new Vue({
    el: '#app',
    data: {
			id: '',
			wordPL: '',
			wordEN: '',
			wordPLAdditional: '',
			wordPronunciation: '',
        emptyFieldsError: false,
		wordExistsError: false,
        insertOK: false,
        baseUrl: '',
		searchQuery: null,

			allWords: '',
		allGroups: '',
			wordGroups: '',

		verbsListSelect: '',

			showAllWords: true,
			showEditWord: false
    },
	computed: {
		filteredWords() {
			if (this.searchQuery) {
				return this.allWords.filter((word) => {
					return this.searchQuery.toLowerCase().split(' ').every(v => word.wordPL.toLowerCase().includes(v))
				})
			} else {
				return this.allWords;
			}
		}
	},
    methods: {

        dataToSend() {
			return {
				'id': this.id,
				'wordPL': this.wordPL,
				'wordEN': this.wordEN,
				'wordPLAdditional': this.wordPLAdditional,
				'wordPronunciation': this.wordPronunciation
			};
        },
        addWord() {
            let data = this.dataToSend();
			axios({
				method: 'post',
				url: 'words/addNew',
				data: data,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allWords = resp.data;
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
		deleteWord(id) {
			axios({
				method: 'post',
				url: 'words/deleteWord',
				data: id,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allWords = resp.data;
				}
			}, (error) => {
				console.log(error);
			});
		},
		editWord(id) {
			for (let i = 0; i < this.allWords.length; i++) {
				if (this.allWords[i].id == id) {
					this.id = this.allWords[i].id;
					this.wordPL = this.allWords[i].wordPL;
					this.wordEN = this.allWords[i].wordEN;
					this.wordPLAdditional = this.allWords[i].wordPLAdditional;
					this.wordPronunciation = this.allWords[i].wordPronunciation;
					this.showAllWords = false;
					this.showEditWord = true;
				}
			}
			axios({
				method: 'post',
				url: 'words/getWordGroups',
				data: this.id,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				console.log(resp);
				if (resp.status === 1) {
					this.wordGroups = resp.data;
				}
			}, (error) => {
				console.log(error);
			});
		},

		editWordSend() {
			let data = this.dataToSend();

			axios({
				method: 'post',
				url: 'words/editWord',
				data: data,
				headers: {'Content-Type': 'application/json'}
			})
			.then((response) => {
				let resp = response.data;
				if (resp.status === 1) {
					this.allWords = resp.data;
					this.endWordEdit();
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
					// this.endWordEdit();
					console.log('ok');
					console.log(resp.data);
				}
			}, (error) => {
				console.log(error);
			});
		},

		endWordEdit() {
			this.showAllWords = true;
			this.showEditWord = false;
			this.verbsListSelect = '';
			this.verbGroups = '';
			this.clearForm();
		},
		clearForm() {
			this.id = '';
			this.wordPL = '';
			this.wordEN = '';
			this.wordPLAdditional = '';
			this.wordPronunciation = '';
		}
    },
    mounted() {
		axios.get('Words/startData')
		.then((response) => {
			let resp = response.data;
            this.baseUrl = resp.baseUrl;
            this.allWords = resp.allWords;
            // this.allGroups = resp.allGroups;
		});

    },

})

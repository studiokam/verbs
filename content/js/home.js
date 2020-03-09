var app = new Vue({
    el: '#app',
    data: {
		verbs: [],
		group: {},
		random: 0,
        presentVerb: {},
        allGroups: null,

		verbShowTypeSetting: null,
		verbQuestionSetting: 1,
        verbsListSelected: '',
		verbsListKnown: [],
        useFullVerbsList: true,
        settingsShow: false,
        pickAnyGroupError: false,
		verbsInGroup: '',
		verbInf: '',
		verbPastSimple: '',
        verbPastParticiple: '',
		repeatVerbs: false,
		numberOfRepeatVerbs: 1,
		countKnownVerbsIfMoreRepeats: [],
		addToGroupShow: false,
		addVerbToGroupGroupChosen: '',
		groupsInWitchVerbIs: [],


		data: '',
		active: false,
		correctAnswers: false,
		emptyFieldsError: false,
		allVerbsCorrect: false,
		isSomeError: false,
        chechBtnDisabled: false,
        knownAllVerbs: false,
        allBtnDisabled: false,
        linkShow: false,
        shareLink: '',
        linkCopyOk2: false,
        numberOfmistakes: 0,
    },
	computed: {
	},
    methods: {
        test() {
        },
        verbQuestionChange() {
            this.newVerb();
        },
        verbQuestion() {

            switch (parseInt(this.verbQuestionSetting)) {
                case 1:
                    return this.presentVerb.pl;
                    break;

                case 2:
                    return this.presentVerb.inf;
                    break;

                case 3:
                    return this.presentVerb.pastSimp1;
                    break;

                case 4:
                    return this.presentVerb.pastPrac1;
                    break;

                case 5:
                    return this.randomVerbQuestion();
                    break;
            }
        },
        randomVerbQuestion() {
            var myArray = [this.presentVerb.pl, this.presentVerb.inf, this.presentVerb.pastSimp1, this.presentVerb.pastPrac1];
            var rand = myArray[Math.floor(Math.random() * myArray.length)];
            return rand;
        },
        goTo(set) {

            let getUrl = window.location;
            let baseUrl = getUrl .protocol + "//" + getUrl.host + getUrl.pathname;
            let url = '/';

            if (set == 'refresh') {
                url = baseUrl + location.search;
            } else if (set.length > 0) {
                url = baseUrl + set;
            } else {
                url = baseUrl;
            }
            window.location.href = url;

        },
		addVerbToGroup() {
			axios({
				method: 'post',
				url: 'verbs/getVerbGroups',
				data: this.presentVerb.id,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				console.log(resp);
				if (resp.status === 1) {
					this.groupsInWitchVerbIs = resp.data;
				}
			}, (error) => {
				console.log(error);
			});
        	this.addToGroupShow = true;
		},
		addVerbToGroupSave() {
			console.log(this.addVerbToGroupGroupChosen);
		},
		addToGroupClose() {
        	this.addToGroupShow = false;
        	this.addVerbToGroupGroupChosen = '';
		},
        checkIfIsChecked(name) {

            for (let i = 0; i < this.verbs.length; i++) {
                const element = this.verbs[i];
                if (element.inf == name) {
                    return true;
                }
            }

        },
        saveSettings() {

            if (!this.useFullVerbsList && this.verbsListSelected == '') {
                this.pickAnyGroupError = true;
                return;
            }
            this.newVerb();
            this.settingsShow = false;
            this.verbsListKnown = [];
			this.countKnownVerbsIfMoreRepeats = [];
		},
		setVerbsListChange() {
			// Get verbs for chosen group
			axios({
				method: 'post',
				url: 'groups/allVerbsForGroup',
				data: this.verbsListSelected,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.then((response) => {
				let resp = response.data;
				console.log(response);
				this.verbs = resp.data;
				this.setGroup(this.verbsListSelected);
			}, (error) => {
				console.log(error);
			});

        },
        randomNumber() {
            let random = Math.floor(Math.random() * this.verbs.length );

            if (this.random == random) {
				this.randomNumber();
				return;
			}
			this.random = random;
        },
        newVerb() {
			this.cleanForm();
			this.chechBtnDisabled = false;
			this.correctAnswers = false;
            // this.knownAllVerbs = false;
            this.randomNumber();
            this.presentVerb = this.verbs[this.random];
            this.verbShowTypeSetting = this.verbQuestion();
            this.$refs.fieldInfVerb.select();
        },
		settingsSetAllVerbsUse() {
			if (!this.useFullVerbsList) {
				this.setGroupToAllVerbs();
				this.verbsListSelected = '';
				this.getAllVerbs();
			}
		},
		setGroup(id) {
        	for (let i = 0; this.allGroups.length; i++) {
        		if (id == this.allGroups[i].id) {
        			this.group = this.allGroups[i];
        			return;
				}
			}
		},
        choosenVerbsList() {
            this.verbs = this.verbsList.slice();
        },
        showHints() {
            this.$refs.fieldInfVerb.select();
            this.correctAnswers = true;
        },
        checkVerbs() {
            this.cleanAlertsInfo();
            this.$refs.fieldInfVerb.select();

            if (this.verbInf === '' || this.verbPastSimple === '' || this.verbPastParticiple === '') {
                this.emptyFieldsError = true;
                return;
            }

            if (this.verbInf.toLowerCase() === this.verbs[this.random].inf &&
                this.verbPastSimple.toLowerCase() === this.verbs[this.random].pastSimp1 &&
                this.verbPastParticiple.toLowerCase() === this.verbs[this.random].pastPrac1) {
                this.allVerbsCorrect = true;
                this.chechBtnDisabled = true;
                this.$refs.newVerbBtn.focus();

                if (this.repeatVerbs) {

                	for (let i = 0; i < this.verbs.length; i++) {
                		if (this.verbs[i].id == this.presentVerb.id) {
                			if (this.verbs[i].count == null && parseInt(this.numberOfRepeatVerbs) !== 1) {
								this.verbs[i].count = 1;
								return;
							} else if (this.verbs[i].count >= parseInt(this.numberOfRepeatVerbs) - 1
										|| parseInt(this.numberOfRepeatVerbs) === 1) {
								//delete from list and add to known list
								this.verbsListKnown.push(this.verbs[this.random]);
								this.verbs.splice(this.random, 1);
								if (this.verbs.length < 1) {
									this.knownAllVerbs = true;
									this.allBtnDisabled = true;
								}
								return;
							}

							this.verbs[i].count++;
							return;
						}
					}


				}



                return;
            }

            if (this.verbInf.toLowerCase() !== this.verbs[this.random].inf ||
                this.verbPastSimple.toLowerCase() !== this.verbs[this.random].pastSimp ||
                this.verbPastParticiple.toLowerCase() !== this.verbs[this.random].pastPrac) {
                this.isSomeError = true;
                this.numberOfmistakes++;
            }
        },
        cleanForm() {
            this.verbInf = '';
            this.verbPastSimple = '';
            this.verbPastParticiple = '';
            this.cleanAlertsInfo();
        },
        cleanAlertsInfo() {
            this.emptyFieldsError = false;
            this.allVerbsCorrect = false;
            this.isSomeError = false;
        },
		homeLearnChooseMouseOver() {
			this.active = !this.active;
		},
		setGroupToAllVerbs() {
			this.group = {
				'id': 0,
				'groupName': 'Wszystkie czasowniki',
				'groupAdditional': 'Lista wszystkich czasowników'
			};
        },
        getAllGroups() {
            axios.get('groups/getAllGroups')
			.then((response) => {
                this.allGroups = response.data.allGroups;
			}, (error) => {
				console.log(error);
			});
        },
		getAllVerbs() {
			axios.get('home/start_data')
			.then((response) => {
				let resp = response.data;
				this.verbs = resp.allVerbs;
			}, (error) => {
				console.log(error);
			});
		}

    },
    mounted() {

		axios.get('home/start_data')
		.then((response) => {
			let resp = response.data;
			this.verbs = resp.allVerbs;
			this.setGroupToAllVerbs();
			this.newVerb();
        });
        this.getAllGroups();
    }

});

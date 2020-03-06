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

		verbInf: '',
		verbPastSimple: '',
        verbPastParticiple: '',
        

		data: '',
		active: false,
        correctAnswers: false,
        emptyFieldsError: false,
        allVerbsCorrect: false,
        isSomeError: false,
        repeatVerbs: false,
        numberOfRepeatVerbs: 1,
        countKnownVerbsIfMoreRepeats: [],
        chechBtnDisabled: false,
        knownAllVerbs: false,
        allBtnDisabled: false,
        linkShow: false,
        shareLink: '',
        linkCopyOk2: false,
        numberOfmistakes: 0,
    },
    methods: {
        test() {
			this.getAllGroups();
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
                    return this.presentVerb.pastSimp;
                    break;

                case 4:
                    return this.presentVerb.pastPrac;
                    break;

                case 5:
                    return this.randomVerbQuestion();
                    break;
            }
        },
        randomVerbQuestion() {
            var myArray = [this.presentVerb.pl, this.presentVerb.inf, this.presentVerb.pastSimp, this.presentVerb.pastPrac];
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

        },
        setVerbsListChange() {
            this.pickAnyVerbError = false;
            this.verbs = [];
            let listOfVerbs = [];

            for (let i = 0; i < this.verbsGroups.length; i++) {
                const element = this.verbsGroups[i].number;
                if (element == this.verbsListSelect) {
                    listOfVerbs = this.verbsGroups[i].list.replace(/\s+/g, '').split(',');
                }
            }

            for (let i = 0; i < listOfVerbs.length; i++) {
                const verbFromSelect = listOfVerbs[i];

                for (let index = 0; index < this.verbsList.length; index++) {
                    const verbFromFullList = this.verbsList[index].inf;
                    if (verbFromSelect == verbFromFullList) {
                        this.verbs.push(this.verbsList[index]);
                    }
                }
            }
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

                // delete from list and add to known list
				this.verbsListKnown.push(this.verbs[this.random]);
				this.verbs.splice(this.random, 1);
				if (this.verbs.length < 1) {
					this.knownAllVerbs = true;
					this.allBtnDisabled = true;
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
        repeatVerbsClick() {

            if (this.repeatVerbs) {
                this.verbs = [];
                this.verbs = this.verbsList.slice();
            }
            this.verbsListKnown = [];
        },
		homeLearnChooseMouseOver() {
			this.active = !this.active;
		},

		setGroupToAllVerbs() {
			this.group = {
				'groupId': 0,
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
        // getVerbsListFromDB(listId) {
        //     axios({
		// 		method: 'post',
		// 		url: 'home/getVerbsListFromDB',
		// 		data: data,
		// 		headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		// 	})
        //     .then((response) => {
        //         let resp = response.data;
        //         console.log(resp);
        //         this.verbs = resp.allVerbs;
        //         this.setGroupToAllVerbs();
        //         this.newVerb();
        //     });
        // }

    },
    mounted() {

		axios.get('home/start_data')
		.then((response) => {
			let resp = response.data;
			console.log(resp);
			this.verbs = resp.allVerbs;
			this.setGroupToAllVerbs();
			this.newVerb();
        });
        this.getAllGroups();
    },

});

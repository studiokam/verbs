var app = new Vue({
    el: '#app',
    data: {
		verbs: [],
		group: {},
		random: 0,
		presentVerb: {},

		verbShowTypeSetting: null,
		verbQuestionSetting: 1,

		verbsListKnown: [],
		verbInf: '',
		verbPastSimple: '',
		verbPastParticiple: '',
		data: '',
		active: false,

        correctAnswers: false,
        emptyFieldsError: false,
        allVerbsCorrect: false,
        isSomeError: false,
        settingsShow: false,
        repeatVerbs: false,
        numberOfRepeatVerbs: 1,
        countKnownVerbsIfMoreRepeats: [],
        useFullVerbsList: true,
        chechBtnDisabled: false,
        knownAllVerbs: false,
        allBtnDisabled: false,
        verbsListSelect: 1,
        pickAnyVerbError: false,
        noMistakes: false,
        noMistakesError: false,
        linkShow: false,
        shareLink: '',
        linkCopyOk2: false,



        numberOfmistakes: 0,
    },
    methods: {
        test() {
			this.randomNumber();
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
        copyLink() {

            node = document.getElementById('sharedlink');

            if (document.body.createTextRange) {
                const range = document.body.createTextRange();
                range.moveToElementText(node);
                range.select();
            } else if (window.getSelection) {
                const selection = window.getSelection();
                const range = document.createRange();
                range.selectNodeContents(node);
                selection.removeAllRanges();
                selection.addRange(range);
            } else {
                console.warn("Could not select text in node: Unsupported browser.");
            }

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                let v = this;

                // pokazanie potwierdzenia
                setTimeout(function() {
                    v.linkCopyOk2 = true;
                }, 100);
                setTimeout(function() {
                    v.linkCopyOk2 = false;
                }, 2000);

                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
                console.log(err);
            }
        },
        shareLinkUrl() {
            let share = window.location.protocol + "//" + window.location.host + window.location.pathname;
            if (location.search.length > 0) {
                share = share + location.search;
            }
            this.shareLink = share;
        },
        getFromUrl() {
            if (location.search.substring(1).length < 1 ) {
                return;
            }

            var urlSearch = JSON.parse('{"' + decodeURI(location.search.substring(1)).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');

            if (Object.keys(urlSearch).length > 0 ) {
                if ("group" in urlSearch) {
                    let set = 1;
                    if (urlSearch.group > 0 && urlSearch.group < 11) {
                        set = urlSearch.group;
                    }
                    this.verbsListSelect = set;
                    this.useFullVerbsList = false;
                }
                if ("repeat" in urlSearch) {
                    this.repeatVerbs = true;
                    this.numberOfRepeatVerbs = urlSearch.repeat;
                }
                if ("noMistakes" in urlSearch) {
                    this.noMistakes = true;
                }
                if ("verbShowType" in urlSearch) {
                    this.verbQuestionSetting = urlSearch.verbShowType;
                }
                this.setVerbsListChange();
            }
        },
        setToUrl() {

            let getUrl = window.location;
            let baseUrl = getUrl .protocol + "//" + getUrl.host + getUrl.pathname;
            let url = '?verbShowType=' + this.verbQuestionSetting;

            if (!this.useFullVerbsList) {
                url += '&group=' + this.verbsListSelect;
            }
            if (this.repeatVerbs) {
                url += '&repeat=' + this.numberOfRepeatVerbs;
            }
            if (this.noMistakes) {
                url += '&noMistakes=1';
            }

            let state = {};
            let title = '';
            history.pushState(state, title, baseUrl + url);
            this.shareLink = baseUrl + url;

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

            for (let i = 0; i < this.verbsListTemp.length; i++) {
                const element = this.verbsListTemp[i];
                if (element.inf == name) {
                    return true;
                }
            }

        },
        closeSettings() {

            if (this.verbsListTemp.length < 1) {
                this.pickAnyVerbError = true;
                return;
            }
            this.newVerb();
            this.settingsShow = false;
            this.setToUrl();

        },
        pickAnyVerbs(name, id) {
            this.pickAnyVerbError = false;
            let isVerbChecked = document.getElementById(name).checked;
            // usunięcie z listy
            for (let i = 0; i < this.verbsListTemp.length; i++) {
                const element = this.verbsListTemp[i];
                if (element.inf == name) {
                    this.verbsListTemp.splice(i, 1);
                }
            }

            // sprawdzenie indexu czasownika do operacji
            let operationIndex = 0;
            for (let index = 0; index < this.verbsList.length; index++) {
                const elementVerbsList = this.verbsList[index];
                if (Object.values(elementVerbsList).indexOf(name) > -1) {
                    operationIndex = index;
                }
            }

            if (isVerbChecked) {
                this.verbsListTemp.push(this.verbsList[operationIndex]);
            }

        },
        setUseFullListChange() {
            if (!this.useFullVerbsList) {
                this.verbsListTemp = this.verbsList;
                this.pickAnyVerbError = false;
            } else {
                this.setVerbsListChange();
            }
        },
        setVerbsListChange() {
            this.pickAnyVerbError = false;
            this.verbsListTemp = [];
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
                        this.verbsListTemp.push(this.verbsList[index]);
                    }
                }
            }
        },
        randomNumber() {
            // this.correctAnswers = false;
            // this.cleanForm();
            // this.cleanAlertsInfo();
            // this.$refs.fieldInfVerb.select();
            let random = Math.floor(Math.random() * this.verbs.length );

            if (this.random == random) {
				this.randomNumber();
				return;
			}
			this.random = random;
        },
        newVerb() {
            // this.chechBtnDisabled = false;
            // this.knownAllVerbs = false;
            this.randomNumber();
            this.presentVerb = this.verbs[this.random];
            this.verbShowTypeSetting = this.verbQuestion();
            this.$refs.fieldInfVerb.select();
        },
        choosenVerbsList() {
            this.verbsListTemp = this.verbsList.slice();
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

            if (this.verbInf.toLowerCase() == this.verbs[this.random].inf &&
                this.verbPastSimple.toLowerCase() == this.verbs[this.random].pastSimp1 &&
                this.verbPastParticiple.toLowerCase() == this.verbs[this.random].pastPrac1) {
                this.allVerbsCorrect = true;
                this.chechBtnDisabled = true;
                this.$refs.newVerbBtn.focus();
				console.log('poprawnie');
                // delete from list and add to known list

				this.verbsListKnown.push(this.verbs[this.random]);
				this.verbs.splice(this.random, 1);
				if (this.verbs.length < 1) {
					this.knownAllVerbs = true;
					this.allBtnDisabled = true;
				}

                return;
            }

            if (this.verbInf.toLowerCase() != this.verbsListTemp[this.random].inf ||
                this.verbPastSimple.toLowerCase() != this.verbsListTemp[this.random].pastSimp ||
                this.verbPastParticiple.toLowerCase() != this.verbsListTemp[this.random].pastPrac) {
                this.isSomeError = true;
                this.numberOfmistakes++;
                if (this.noMistakes) {
                    this.noMistakesError = true;
                }
                return;
            }
        },
        cleanForm() {
            this.verbInf = '';
            this.verbPastSimple = '';
            this.verbPastParticiple = '';
        },
        cleanAlertsInfo() {
            this.emptyFieldsError = false;
            this.allVerbsCorrect = false;
            this.isSomeError = false;
        },
        repeatVerbsClick() {

            if (this.repeatVerbs) {
                this.verbsListTemp = [];
                this.verbsListTemp = this.verbsList.slice();
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
		}

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

        // this.verbsListTemp = this.verbsList.slice();
        // this.getFromUrl();
        // // this.random = this.randomNumber();
        // this.shareLinkUrl();
    },

})

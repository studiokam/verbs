var app = new Vue({
    el: '#app',
    data: {
        verbPL: '',
        verbInf: '',
        verbPastSimple1: '',
        verbPastSimple2: '',
        verbPastParticiple1: '',
        verbPastParticiple2: '',
        newVerbPLAdditional: '',
        emptyFieldsError: false,
        verbExistsError: false,
        insertOK: false,
        baseUrl: ''
    },
    methods: {

        dataToSend() {
            let data = {
                'verbPL': this.verbPL,
                'verbInf': this.verbInf,
                'verbPastSimple1': this.verbPastSimple1,
                'verbPastSimple2': this.verbPastSimple2,
                'verbPastParticiple1': this.verbPastParticiple1,
                'verbPastParticiple2': this.verbPastParticiple2,
                'newVerbPLAdditional': this.newVerbPLAdditional
            }

            return data;
        },
        addVerbs() {
            let data2 = this.dataToSend();
            console.log(data2);
            // axios.post('add/addNew', data2)
            // .then((response) => {
            // 	let resp = response.data;
            // 	console.log(resp);
            // 	this.data = resp.data;
            // })
            // .catch(error => {
            //     console.log(error);
            //   });
            // axios.post('add/addNew', {
            //     firstName: 'Finn',
            //     lastName: 'Williams'
            //   })
            //   .then((response) => {
            //     console.log(response.data);
            //   }, (error) => {
            //     console.log(error);
            //   });

              axios({
                method: 'post',
                url: 'add/addNew',
                data: data2,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              })
              .then((response) => {
                    console.log(response.data);
                  }, (error) => {
                    console.log(error);
                  });  
            
        }
    },
    mounted() {
		axios.get('add/startData')
		.then((response) => {
			let resp = response.data;
            console.log(resp);
            this.baseUrl = resp.baseUrl;
		});

    },

})

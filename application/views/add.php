<div id="app">

	<div class="add-new-verb">
		<a class="add-menu" :href="baseUrl">Home</a>
		<form>
			<div class="form-row">
				<div class="col verb-pl-name">Nowy czasownik</div>
			</div>
			<hr class="mb-0">
			<div class="form-row verbs-form">
				<div class="col-md-12 pb-1">
					<label class="my-label-in-form">PL *</label>
					<input type="text" class="form-control" v-model="verbPL">
				</div>
				<div class="col-md-12 pb-1">
					<label class="my-label-in-form">infinitive *</label>
					<input type="text" class="form-control" v-model="verbInf">
				</div>
				<div class="col-md-6 pb-1">
					<label class="my-label-in-form">past simple *</label>
					<input type="text" class="form-control" v-model="verbPastSimple1">
				</div>
				<div class="col-md-6 pb-1">
					<label class="my-label-in-form">past simple</label>
					<input type="text" class="form-control" v-model="verbPastSimple2">
				</div>
				<div class="col-md-6 pb-1">
					<label class="my-label-in-form">past practiciple *</label>
					<input type="text" class="form-control" v-model="verbPastParticiple1">
				</div>
				<div class="col-md-6 pb-1">
					<label class="my-label-in-form">past practiciple</label>
					<input type="text" class="form-control" v-model="verbPastParticiple2">
				</div>
				<div class="col-md-12 pb-1">
					<label class="my-label-in-form">PL dodatkowy opis</label>
					<textarea name="newVerbPLAdditional" rows="3" class="form-control" v-model="newVerbPLAdditional"></textarea>
				</div>
			</div>
		</form>
		<hr>
		<button type="button" class="btn btn-success btn-block mt-20" @click="addVerbs">Dodaj</button>

		<div class="alert alert-warning field-info" role="alert" v-if="emptyFieldsError">Wypełnij wszytkie pola</div>
		<div class="alert alert-danger field-info"  role="alert" v-if="verbExistsError">Nope - jest już czasownik gdzie PL i Infinitive jest dokładnie taka sama :/</div>
		<div class="alert alert-success field-info" role="alert" v-if="insertOK">OK! Dodano do listy</div>
	</div>

</div>
</body>
	<script type="text/javascript" src="content/js/add.js"></script>
</html>

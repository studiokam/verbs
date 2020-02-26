<div id="app" xmlns:v-on="http://www.w3.org/1999/xhtml">

	<div v-if="settingsShow">
		<div class="modal-dark-bg">
		</div>
		<div class="my-modal-content mb-50">
			<div class="my-modal-group">
				<div class="my-modal-title custom-checkbox mb-0 float-left">Pytanie o czasownik</div>
				<div class="custom-control custom-switch float-right">
					<div class="">
						<select class="custom-select" @change="verbQuestionChange()" v-model="verbQuestionSetting">
							<option value="1" selected>PL</option>
							<option value="2">EN Infinitive</option>
							<option value="3">EN Past simple</option>
							<option value="4">EN Past participle</option>
							<option value="5">Losowo</option>
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<hr>
			<div class="my-modal-group">
				<div class="my-modal-title float-left">Nie wyświetlaj tych które już umiem</div>
				<div class="custom-control custom-switch float-right">
					<input type="checkbox" class="custom-control-input" id="repeatVerbs" v-model="repeatVerbs">
					<label class="custom-control-label" for="repeatVerbs" v-on:click="repeatVerbsClick"></label>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="my-modal-group" v-if="repeatVerbs">
				<div class="form-group">
					<small class="form-text text-muted mt-10 mb-1">Po ilu poprawnych odpowiedziach przestać powtarzać
						dany czasownik na liście do nauki?</small>
					<input type="text" class="form-control max-100" id="numberOfRepeatVerbs" v-model="numberOfRepeatVerbs">
				</div>
			</div>
			<hr>
			<div class="my-modal-group">
				<div class="my-modal-title custom-checkbox mb-0 float-left">Zaliczy tylko bez pomyłki</div>
				<div class="custom-control custom-switch float-right">
					<input type="checkbox" class="custom-control-input" id="noMistakes" v-model="noMistakes">
					<label class="custom-control-label" for="noMistakes" v-on:click="repeatVerbs = true"></label>
				</div>
				<div class="clearfix"></div>
				<small class="form-text text-muted mt-0 mb-1">- jeśli popełnisz bąd podczas podawania odpowiedzi, proces
					zostanie zrestartowany - dodatkowa motywacja</small>
			</div>
			<hr>
			<div class="my-modal-group">
				<div class="my-modal-title float-left">Używać pełnej listy czasowników?</div>
				<div class="custom-control custom-switch float-right">
					<input type="checkbox" class="custom-control-input" id="useFullVerbsList" v-model="useFullVerbsList">
					<label class="custom-control-label" for="useFullVerbsList" @click="setUseFullListChange()"></label>
				</div>
				<div class="clearfix"></div>
			</div>
			<div v-if="!useFullVerbsList">
				<div class="mt-20 mb-20" style="max-width: 300px;">
					<select class="custom-select" @change="setVerbsListChange()" v-model="verbsListSelect">
						<option value="1" selected>1 grupa czasowników</option>
						<option value="2">2 grupa czasowników</option>
						<option value="3">3 grupa czasowników</option>
						<option value="4">4 grupa czasowników</option>
						<option value="5">5 grupa czasowników</option>
						<option value="6">6 grupa czasowników</option>
						<option value="7">7 grupa czasowników</option>
						<option value="8">8 grupa czasowników</option>
						<option value="9">9 grupa czasowników</option>
						<option value="11">trudne</option>
						<option value="10">Wybierz dowolne z całej listy</option>
					</select>
				</div>
				<div v-if="pickAnyVerbError" class="pick-any-verb-error">
					Wybierz przynajmniej jeden czasownik!
				</div>
				<div v-if="verbsListSelect == 10" class="full-verbs-list-select">
					<div v-for="(verb, index) in verbsList">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" :id="verb.inf"
								   v-on:click="pickAnyVerbs(verb.inf, index)" :checked="checkIfIsChecked(verb.inf)">
							<label class="custom-control-label" :for="verb.inf">{{verb.inf}} - {{verb.pastSimp}} - {{verb.pastPrac}} &rarr; {{verb.pl}}</label>
						</div>
					</div>
				</div>
				<div v-if="verbsListSelect < 10" class="full-verbs-list-select">
					<div v-for="verb in verbsListTemp">
						{{verb.inf}} - {{verb.pastSimp}} - {{verb.pastPrac}} &rarr; {{verb.pl}}
					</div>
				</div>
			</div>
			<hr>
			<button type="button" class="btn btn-sm btn-danger float-right" v-on:click="closeSettings()">Zamknij</button>
		</div>
	</div>

	<div v-if="noMistakesError">
		<div class="modal-dark-bg">
		</div>
		<div class="my-modal-content mb-50">

			<div class="my-modal-group">
				<div class="my-modal-title">Niestety, nie udało się tym razem <i class="fa fa-frown-o"></i></div>
				<hr>
				<div>Popełniony został błąd a jesteś w trybie gdzie każdy błąd przerywa ćwiczenie</div>
			</div>

			<hr>
			<button type="button" class="btn btn-sm btn-danger float-right ml-1" v-on:click="goTo('')">Wyjdź</button>
			<button type="button" class="btn btn-sm btn-success float-right" v-on:click="goTo('refresh')">Rozpocznij od nowa</button>
		</div>
	</div>

	<div class="container mt-50 mb-50">
		<form>
			<div class="form-row">
				<div class="col verb-pl-name">{{verbShowTypeSetting}}</div>
				<div v-if="correctAnswers" class="correct-answers-top">
					<div class="correct-answers">
						{{presentVerb.inf}} - {{presentVerb.pastSimp}} - {{presentVerb.pastPrac}}
					</div>
				</div>
				<div id="settings" class="ml-20" v-on:click="goTo('addVerb')">+ czasownik</div>
				<div id="settings" class="ml-20" v-on:click="goTo('addWord')">+ słowo</div>
				<div id="settings" class="ml-20"><i class="fa fa-home fa-lg" v-on:click="goTo('')"></i></div>
				<div id="settings" class="ml-20"><i class="fa fa-paperclip" v-on:click="goTo('?verbShowType=5&group=9&repeat=2')"></i></div>
				<div id="settings" class="ml-20"><i class="fa fa-link" v-on:click="linkShow = true"></i></div>
				<div id="settings" class="ml-20"><i class="fa fa-cogs" v-on:click="settingsShow = true"></i></div>
			</div>
			<hr class="mb-0">
			<div class="form-row verbs-form">
				<div class="col-md-4 col-sm-12 pb-1">
					<label class="my-label-in-form">infinitive</label>
					<input type="text" class="form-control" ref="fieldInfVerb" v-model="verbInf">
				</div>
				<div class="col-md-4 col-sm-12 pb-1">
					<label class="my-label-in-form">past simple</label>
					<input type="text" class="form-control" v-model="verbPastSimple">
				</div>
				<div class="col-md-4 col-sm-12 pb-1">
					<label class="my-label-in-form">past practiciple</label>
					<input type="text" class="form-control" v-model="verbPastParticiple">
				</div>
			</div>
		</form>
		<hr>
		<div v-if="!allBtnDisabled">
			<button type="button" class="btn btn-sm btn-success small-right" @click="checkVerbs" :disabled="chechBtnDisabled">Sprawdź</button>
			<button type="button" class="btn btn-sm btn-info small-right" @click="showHints">Nauka</button>
			<button type="button" class="btn btn-sm btn-secondary small-right" @click="newVerb" ref="newVerbBtn">Nowy</button>
		</div>
		<button type="button" class="btn btn-sm btn-success small-right" @click="goTo('refresh')" v-if="allBtnDisabled">Rozpocznij od nowa</button>
		<!-- <button type="button" class="btn btn-sm btn-success small-right" @click="test()">test</button> -->
		<div class="clearfix"></div>

		<div v-if="correctAnswers">
			<hr>
			Poprawne odpowiedzi: <br>
			<strong>{{presentVerb.pl}}</strong>
			<div class="correct-answers">
				{{presentVerb.inf}} - {{presentVerb.pastSimp}} - {{presentVerb.pastPrac}}
			</div>
		</div>

		<div class="alert alert-warning field-info" role="alert" v-if="emptyFieldsError">Wypełnij wszytkie pola</div>
		<div class="alert alert-success field-info" role="alert" v-if="allVerbsCorrect && !allBtnDisabled">Brawo Ty!</div>
		<div class="alert alert-success field-info" role="alert" v-if="allBtnDisabled">Brawo! Poprawnie podano wszytkie czasowniki z listy!</div>
		<div class="alert alert-danger field-info" role="alert" v-if="isSomeError">Nope - mamy błędy :/</div>
	</div>
	<!-- verbsListTemp: {{verbsListTemp}} <br> -->

	<div class="container mt-50 mb-50" v-if="repeatVerbs">
		<div class="already-known">
			<div class="row">
				<div class="col-md-2 col-sm-6">
					<div class="already-known-discription">Pozostało</div>
					<div class="big-number">{{numberOfVerbssss()}}</div>
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="already-known-discription">Umiesz już</div>
					<div class="big-number">{{verbsListKnown.length}}</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<div class="already-known-discription">Lista poznanych czasowników</div>
					<hr>
					<div class="alerady-known-list">
						<div v-for="verb in verbsListKnown">
							<strong>{{verb.inf}} - {{verb.pastSimp}} - {{verb.pastPrac}} &rarr; {{verb.pl}}</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="float-right mt-2">
			Ilość pomyłek: {{numberOfmistakes}} <br>
		</div>
	</div>

	<transition name="fade">
		<div class="modal-dark-bg" v-if="linkShow"></div>
	</transition>
	<transition name="fade2">
		<div class="my-modal-content mb-50" v-if="linkShow">

			<div class="my-modal-group">
				<div class="my-modal-title">Link do obecnych ustawień</div>
				<small class="form-text text-muted mt-0 mb-1">- możesz użyć tego linku aby podać go komuś innemu lub
					za jakiś czas przejść do ćwiczeń z takim ustawieniem
				</small>
			</div>

			<hr>
			<div id="sharedlink">
				{{shareLink}}
			</div>
			<hr>
			<transition name="fade">
				<div class="float-left" v-if="linkCopyOk2">link został skopiowany</div>
			</transition>
			<button type="button" class="btn btn-sm btn-danger float-right ml-1" v-on:click="linkShow = false">Zamknij</button>
			<button type="button" class="btn btn-sm btn-secondary float-right ml-1" v-on:click="copyLink()">Kopiuj link</button>
		</div>
	</transition>
	<div class="container mt-50 mb-50">
		Lista czasowników: <br>
		<div v-for="verb in data">
			{{verb.id}} / {{verb.pl}} / {{verb.inf}} / {{verb.pastSimp1}} / {{verb.pastPrac1}} <br>
		</div>
	</div>
</div>
</body>
	<script type="text/javascript" src="content/js/home.js"></script>
</html>
